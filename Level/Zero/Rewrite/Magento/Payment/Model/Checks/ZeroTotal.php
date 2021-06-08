<?php

namespace Level\Zero\Rewrite\Magento\Payment\Model\Checks;

use Magento\Payment\Model\MethodInterface;
use Magento\Quote\Model\Quote;

class ZeroTotal extends \Magento\Payment\Model\Checks\ZeroTotal
{
    /**
     * Check whether payment method is applicable to quote
     * Purposed to allow use in controllers some logic that was implemented in blocks only before
     *
     * @param MethodInterface $paymentMethod
     * @param \Magento\Quote\Model\Quote $quote
     * @return bool
     */
    public function isApplicable(MethodInterface $paymentMethod, Quote $quote)
    {
        return !($quote->getBaseGrandTotal() < 0.0001 && $paymentMethod->getCode() != 'free' && $paymentMethod->getCode() != 'zero');
    }
}
