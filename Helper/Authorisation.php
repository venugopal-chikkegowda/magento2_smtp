<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    Codilar_Smtp Extension
 * @package    Codilar\Smtp\Helper\Authorization
 * @copyright   Copyright (c) 2017 Codilar. (http://www.codilar.com)
 * @purpose      For returning array of Authorization for our Smtp Module
 * @author       Codilar Team
 **/
namespace Codilar\Smtp\Helper;

use Magento\Framework\Option\ArrayInterface;

class Authorisation implements ArrayInterface
{
    const LOGIN  = "login";
    const PLAIN = "plain";
    const CRAM_MD5 = "cram-md5";

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            self::LOGIN => __('LOGIN'),
            self::PLAIN => __('PLAIN'),
            self::CRAM_MD5 => __('CRAM-MD5')
        ];

        return $options;
    }
}