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
			type: 'paylater',
			component: 'Rusch_Paylater/js/view/payment/method-renderer/paylater'
		});
		return Component.extend({});
	}
);
