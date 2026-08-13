<?php
/**
 * Formulario de contacto general (página Contacto).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function strrpp_contact_handler() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	if ( ! isset( $_POST['strrpp_contact_nonce'] ) || ! wp_verify_nonce( $_POST['strrpp_contact_nonce'], 'strrpp_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'st_contact', 'error', $redirect ) );
		exit;
	}

	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'st_contact', 'sent', $redirect ) );
		exit;
	}

	$nombre  = isset( $_POST['nombre'] ) ? sanitize_text_field( wp_unslash( $_POST['nombre'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$asunto  = isset( $_POST['asunto'] ) ? sanitize_text_field( wp_unslash( $_POST['asunto'] ) ) : '';
	$mensaje = isset( $_POST['mensaje'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ) ) : '';

	if ( ! $nombre || ! is_email( $email ) || ! $mensaje ) {
		wp_safe_redirect( add_query_arg( 'st_contact', 'error', $redirect ) );
		exit;
	}

	$to      = apply_filters( 'strrpp_contact_to', get_option( 'admin_email' ) );
	$subject = sprintf( '[Contacto] %s — %s', $asunto, $nombre );
	$body    = "Nombre: {$nombre}\nEmail: {$email}\nAsunto: {$asunto}\n\nMensaje:\n{$mensaje}";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$nombre} <{$email}>" );

	$sent = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'st_contact', $sent ? 'sent' : 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_strrpp_contact', 'strrpp_contact_handler' );
add_action( 'admin_post_nopriv_strrpp_contact', 'strrpp_contact_handler' );
