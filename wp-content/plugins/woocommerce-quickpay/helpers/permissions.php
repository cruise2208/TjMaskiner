<?php

if ( ! function_exists( 'woocommerce_quickpay_can_user_empty_logs' ) ) {
	/**
	 * @return mixed|void
	 */
	function woocommerce_quickpay_can_user_empty_logs() {
		return apply_filters( 'woocommerce_quickpay_can_user_empty_logs', current_user_can( 'administrator' ) );
	}
}

if ( ! function_exists( 'woocommerce_quickpay_can_user_flush_cache' ) ) {
	/**
	 * @return mixed|void
	 */
	function woocommerce_quickpay_can_user_flush_cache() {
		return apply_filters( 'woocommerce_quickpay_can_user_flush_cache', current_user_can( 'administrator' ) );
	}
}