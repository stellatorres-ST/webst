<?php
/**
 * Formulario de cotización — Capacitaciones In Company.
 *
 * Recibe el POST del formulario en template-in-company.php, valida,
 * envía el mail a la casilla configurada y redirige de vuelta a la
 * página con un mensaje de éxito o error.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function strrpp_in_company_quote_handler() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	if ( ! isset( $_POST['strrpp_quote_nonce'] ) || ! wp_verify_nonce( $_POST['strrpp_quote_nonce'], 'strrpp_in_company_quote' ) ) {
		wp_safe_redirect( add_query_arg( 'st_quote', 'error', $redirect ) );
		exit;
	}

	// Honeypot: si el campo "website" viene completo, es un bot.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'st_quote', 'sent', $redirect ) );
		exit;
	}

	$nombre        = isset( $_POST['nombre'] ) ? sanitize_text_field( wp_unslash( $_POST['nombre'] ) ) : '';
	$empresa       = isset( $_POST['empresa'] ) ? sanitize_text_field( wp_unslash( $_POST['empresa'] ) ) : '';
	$email         = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$telefono      = isset( $_POST['telefono'] ) ? sanitize_text_field( wp_unslash( $_POST['telefono'] ) ) : '';
	$participantes = isset( $_POST['participantes'] ) ? absint( $_POST['participantes'] ) : 0;
	$modalidad     = isset( $_POST['modalidad'] ) ? sanitize_text_field( wp_unslash( $_POST['modalidad'] ) ) : '';
	$mensaje       = isset( $_POST['mensaje'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ) ) : '';

	if ( ! $nombre || ! $empresa || ! is_email( $email ) || ! $telefono ) {
		wp_safe_redirect( add_query_arg( 'st_quote', 'error', $redirect ) );
		exit;
	}

	$to      = apply_filters( 'strrpp_in_company_quote_to', get_option( 'admin_email' ) );
	$subject = sprintf( '[In Company] Nueva cotización — %s', $empresa );

	$body   = array();
	$body[] = "Nombre: {$nombre}";
	$body[] = "Empresa: {$empresa}";
	$body[] = "Email: {$email}";
	$body[] = "Teléfono: {$telefono}";
	$body[] = 'Participantes: ' . ( $participantes ? $participantes : '—' );
	$body[] = "Modalidad: {$modalidad}";
	$body[] = "Mensaje:\n{$mensaje}";

	$headers = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$nombre} <{$email}>" );

	$sent = wp_mail( $to, $subject, implode( "\n", $body ), $headers );

	wp_safe_redirect( add_query_arg( 'st_quote', $sent ? 'sent' : 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_strrpp_in_company_quote', 'strrpp_in_company_quote_handler' );
add_action( 'admin_post_nopriv_strrpp_in_company_quote', 'strrpp_in_company_quote_handler' );
