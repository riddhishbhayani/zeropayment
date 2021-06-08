<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Level\Zero\Model\Payment;

class Zero extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_CUSTOM_INVOICE_CODE = 'zero';

    protected $_code = self::PAYMENT_METHOD_CUSTOM_INVOICE_CODE;

    protected $_isOffline = true;

    /**
     * @param \Magento\Quote\Api\Data\CartInterface|null $quote
     * @return bool
     */
    public function isAvailable(
        \Magento\Quote\Api\Data\CartInterface $quote = null
    ) {
        /*return parent::isAvailable($quote);*/
        return parent::isAvailable($quote) && !empty($quote) && $quote->getGrandTotal() <= 0;
    }

    /**
     * Check whether method is enabled in config
     *
     * @param \Magento\Quote\Model\Quote|null $quote
     * @return bool
     */
    public function isAvailableInConfig($quote = null)
    {
        return parent::isAvailable($quote);
    }

    /**
     * Get config payment action, do nothing if status is pending
     *
     * @return string|null
     */
    public function getConfigPaymentAction()
    {
        return parent::getConfigPaymentAction();
    }
}

