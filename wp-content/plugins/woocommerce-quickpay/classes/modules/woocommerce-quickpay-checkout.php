<?php

/**
 * Class WC_QuickPay_Checkout_Frontend
 * @since 5.2.0
 */
class WC_QuickPay_Checkout extends WC_QuickPay_Module {

	/**
	 * Adds hooks and filters
	 *
	 * @return mixed
	 */
	public function hooks() {
	}

	/**
	 * @param $order
	 *
	 * @return string
	 * @throws QuickPay_API_Exception
	 */
	public static function create_overlay_payment_link_for_order( $order ) {
		add_filter( 'woocommerce_quickpay_transaction_link_params', 'WC_QuickPay_Checkout::set_acquirer_clearhaus', 10, 3 );

		$payment_link = woocommerce_quickpay_create_payment_link( $order,true );

		remove_filter( 'woocommerce_quickpay_transaction_link_params', 'WC_QuickPay_Checkout::set_acquirer_clearhaus', 10, 3 );

		return $payment_link;
	}

	/**
	 * Sets Clearhaus as acquirer on certain payment links.
	 *
	 * @param $merged_params
	 * @param $order
	 * @param $payment_method
	 *
	 * @return mixed
	 */
	public static function set_acquirer_clearhaus( $merged_params, $order, $payment_method ) {
		$merged_params['acquirer'] = 'clearhaus';

		return $merged_params;
	}
}