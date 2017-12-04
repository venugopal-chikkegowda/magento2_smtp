<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    Codilar_Smtp Extension
 * @package    Codilar\Smtp\Model\Transport
 * @copyright   Copyright (c) 2017 Codilar. (http://www.codilar.com)
 * @purpose      Overriding the Magento Transport to our Smtp Module
 * @author       Codilar Team
 **/
namespace Codilar\Smtp\Model;

class Transport extends \Zend_Mail_Transport_Smtp implements \Magento\Framework\Mail\TransportInterface
{
    /**
     * @var \Magento\Framework\Mail\MessageInterface
     */
    protected $_message;

    /**
     * Transport constructor.
     * @param \Magento\Framework\Mail\MessageInterface $message
     */
    public function __construct(\Magento\Framework\Mail\MessageInterface $message)
    {
        if (!$message instanceof \Zend_Mail) {
            throw new \InvalidArgumentException('The message should be an instance of \Zend_Mail');
        }
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $smtpHelper = $objectManager->get('\Codilar\Smtp\Helper\Data');
        $smtpHost= $smtpHelper->getSmtpData('smtp_host_name');//your smtp host  ';
        $smtpConf = [
            'auth' => $smtpHelper->getSmtpData('smtp_authorisation'),//auth type
            'ssl' => $smtpHelper->getSmtpData('smtp_ssl'),
            'port' => $smtpHelper->getSmtpData('smtp_port'),
            'username' => $smtpHelper->getSmtpData('smtp_username'),//smtm user name
            'password' => $smtpHelper->getSmtpData('smtp_password')//smtppassword
        ];

        parent::__construct($smtpHost, $smtpConf);
        $this->_message = $message;
    }

    /**
     * Send a mail using this transport
     * @return void
     * @throws \Magento\Framework\Exception\MailException
     */
    public function sendMessage()
    {
        try {
            parent::send($this->_message);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }
}