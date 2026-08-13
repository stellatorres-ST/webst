<?php
/**
 * Selector de moneda ARS/USD.
 *
 * Persiste la elección del visitante en una cookie y expone el helper
 * strrpp_get_current_currency() para usar en templates y en integraciones
 * con WooCommerce (p. ej. un plugin de multi-currency que lea esta cookie,
 * o filtros de precio propios).
 *
 * TODO: conectar con un servicio de tipo de cambio (ej. API del BCRA / open
 * exchange rates) para convertir precios ARS -> USD de forma automática.
 * Por ahora los precios en USD deben cargarse manualmente por producto
 * (custom field _price_usd en WooCommerce).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STRRPP_CURRENCY_COOKIE', 'strrpp_currency' );

function strrpp_get_current_currency() {
	if ( isset( $_COOKIE[ STRRPP_CURRENCY_COOKIE ] ) && in_array( $_COOKIE[ STRRPP_CURRENCY_COOKIE ], array( 'ARS', 'USD' ), true ) ) {
		return sanitize_text_field( wp_unslash( $_COOKIE[ STRRPP_CURRENCY_COOKIE ] ) );
	}
	return 'ARS';
}

/**
 * Endpoint AJAX para cambiar la moneda sin recargar la página.
 */
function strrpp_set_currency_ajax() {
	check_ajax_referer( 'strrpp_currency_nonce', 'nonce' );

	$currency = isset( $_POST['currency'] ) ? sanitize_text_field( wp_unslash( $_POST['currency'] ) ) : 'ARS';
	if ( ! in_array( $currency, array( 'ARS', 'USD' ), true ) ) {
		wp_send_json_error();
	}

	setcookie( STRRPP_CURRENCY_COOKIE, $currency, time() + YEAR_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN );
	wp_send_json_success( array( 'currency' => $currency ) );
}
add_action( 'wp_ajax_strrpp_set_currency', 'strrpp_set_currency_ajax' );
add_action( 'wp_ajax_nopriv_strrpp_set_currency', 'strrpp_set_currency_ajax' );

function strrpp_currency_nonce() {
	return wp_create_nonce( 'strrpp_currency_nonce' );
}
