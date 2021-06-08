define(
    [
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/model/quote'
    ],
    function (
        Component,
        quote
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Level_Zero/payment/zero'
            },

            /**
             * Get payment method data
             */
            getData: function () {
                return {
                    'method': this.item.method,
                    'po_number': null,
                    'additional_data': null
                };
            },

            /**
             * Check if payment is active
             *
             * @returns {Boolean}
             */
            isActive: function () {
                var active = this.getCode() === this.isChecked();
                this.active(active);
                return active;
            },

            /**
             * Prepare data to place order
             * @param {Object} payload
             */
            beforePlaceOrder: function (payload) {
                this.setPaymentPayload(payload);
                this.placeOrder();
            },

            /**
             * Sets payment payload
             *
             * @param {Object} paymentPayload
             * @private
             */
            setPaymentPayload: function (paymentPayload) {
                this.paymentPayload = paymentPayload;
            },

            getMailingAddress: function () {
                return window.checkoutConfig.payment.checkmo.mailingAddress;
            },

            /** Returns is method available */
            isAvailable: function () {
                return quote.totals()['grand_total'] <= 0;
            }
        });
    }
);
