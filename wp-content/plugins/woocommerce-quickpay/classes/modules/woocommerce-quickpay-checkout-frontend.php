<?php

/**
 * Class WC_QuickPay_Checkout_Frontend
 * @since 5.2.0
 */
class WC_QuickPay_Checkout_Frontend extends WC_QuickPay_Module {

	/**
	 * Adds hooks and filters
	 *
	 * @return mixed
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'static_files' ] );
		add_filter( 'woocommerce_update_order_review_fragments', [ $this, 'update_order_review_fragments' ], 10, 1 );
	}

	private static function is_payment_related_page() {
		$is_checkout_pay_page  = is_checkout_pay_page();
		$is_checkout_form_page = is_checkout() && wc()->cart->needs_payment();

		return $is_checkout_pay_page || $is_checkout_form_page;
	}

	/**
	 * Enqueue static files
	 */
	public function static_files() {
		wp_register_script( 'quickpay-embedded-v2', 'https://payment.quickpay.net/embedded/v2/quickpay.js', [ 'jquery' ], '2.0', true );
		wp_register_script( 'wcqp-overlay', WC_QP()->plugin_url( '/assets/javascript/overlay.min.js' ), [ 'quickpay-embedded-v2' ], WCQP_VERSION, true );

		wp_localize_script( 'wcqp-overlay', 'wcqp', [
			'settings' => [
				'autojump' => WC_QuickPay_Helper::option_is_enabled( WC_QP()->s( 'quickpay_embedded_autojump' ) ) === 1,
			],
		] );
	}

	/**
	 * @return bool
	 */
	public static function is_embedded_payment_enabled() {
		return WC_QuickPay_Helper::option_is_enabled( WC_QP()->s( 'quickpay_embedded_payments_enabled' ) ) === 1;
	}

	/**
	 * Add custom data to the frontend through the update_order_review action.
	 *
	 * @param $fragments
	 *
	 * @return mixed
	 */
	public function update_order_review_fragments( $fragments ) {
		$fragments['.wcqp-modal-header__amount > *'] = wc()->cart->get_total();

		return $fragments;
	}

	/**
	 * Inserts an overlay payment form based on order data
	 *
	 * @param $order_id
	 *
	 * @param array $args
	 *
	 * @throws QuickPay_API_Exception
	 * @throws WC_Data_Exception
	 */
	public static function generate_overlay_form_for_order( $order_id, $args = [] ) {
		$order        = new WC_Quickpay_Order( $order_id );
		$payment_link = null;

		// Set the payment method temporarily to 'quickpay' to make sure the payment method supports links
		$order->set_payment_method( 'quickpay' );

		$args = array_merge( [
			'order'                   => $order,
			'payment_link'            => WC_QuickPay_Checkout::create_overlay_payment_link_for_order( $order ),
			'auto_open'               => 'yes',
			'payment_total'           => preg_replace( '/\s+|&nbsp;|' . $order->get_currency() . '/', '', strip_tags( wc_price( $order->get_total() ) ) ),
			'payment_total_formatted' => wc_price( $order->get_total() ),
			'payment_currency'        => $order->get_currency(),
			'redirect'                => $order->get_checkout_order_received_url(),
			'close_redirect'          => apply_filters( 'woocommerce_quickpay_overlay_close_redirect', wp_get_referer(), $order )
		], $args );

		WC_QuickPay_Views::get_view( 'checkout/payment-overlay.php', apply_filters( 'woocommerce_quickpay_overlay_form_for_order_arguments', $args, $order_id ) );
	}
}