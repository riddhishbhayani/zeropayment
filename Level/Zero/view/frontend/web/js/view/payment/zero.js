/* @api */
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'zero',
                component: 'Level_Zero/js/view/payment/method-renderer/zero-method'
            }
        );
        return Component.extend({});
    }
);
