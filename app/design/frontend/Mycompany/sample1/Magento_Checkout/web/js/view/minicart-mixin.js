define([
    'jquery'
], function ($) {
    return function (originalComponent) {
        return originalComponent.extend({
            update: function (updatedCart) {
                console.log('text mixin');
                this._super(updatedCart);
            }
        });
    };
})