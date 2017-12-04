<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    Codilar_Smtp Extension
 * @package    Codilar\Smtp\Helper\Data
 * @copyright   Copyright (c) 2017 Codilar. (http://www.codilar.com)
 * @purpose      Helper class for our Smtp Module
 * @author       Codilar Team
 **/
namespace Codilar\Smtp\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
class Data extends AbstractHelper
{
    /**
     * @var $_scopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ){
        $this->scopeConfig = $context->getScopeConfig();
        parent::__construct($context);
    }

    /**
     * @param $id
     * @return string
     */
    public function getSmtpData($id)
    {
        return $this->scopeConfig->getValue('smtp/smtp_block/'.$id, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
