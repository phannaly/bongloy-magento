<?php

namespace Omise\Payment\Model\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor as MageLayoutProcessor;

class LayoutProcessor
{
    public function afterProcess(MageLayoutProcessor $subject, $jsLayout)
    {

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['firstname']['value'] = '10012';



         return $jsLayout;
    }
}