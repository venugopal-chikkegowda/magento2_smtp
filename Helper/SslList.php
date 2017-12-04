<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    Codilar_Smtp Extension
 * @package    Codilar\Smtp\Helper\SslList
 * @copyright   Copyright (c) 2017 Codilar. (http://www.codilar.com)
 * @purpose      For returning array of SslList for our Smtp Module
 * @author       Codilar Team
 **/
namespace Codilar\Smtp\Helper;

use Magento\Framework\Option\ArrayInterface;

class SslList implements ArrayInterface
{
    const SSL  = "ssl";
    const TLS = "tls";

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            self::SSL => __('SSL'),
            self::TLS => __('TLS')
        ];

        return $options;
    }
}