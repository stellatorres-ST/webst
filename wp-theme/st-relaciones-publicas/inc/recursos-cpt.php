<?php
/**
 * Custom post type "Recursos gratuitos".
 *
 * Cada recurso (guía, plantilla, checklist) es un post de este tipo.
 * Custom fields del post:
 * - _st_recurso_icon  Un emoji simple para el ícono de la card, se usa
 *                      solo si el post no tiene imagen destacada cargada.
 * - _st_recurso_file  URL del archivo a descargar (o link externo, ej. a
 *                      un formulario de captura si se quiere gatear la
 *                      descarga más adelante).
 * - _st_recurso_cta   Texto del link de descarga sin el "»" final
 *                      (ej. "Descargar gratis la guía"). Si se deja
 *                      vacío usa "Descargar gratis".
 * El extracto del post (excerpt) se usa como descripción corta de la card.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function strrpp_register_recurso_cpt() {
	register_post_type( 'st_recurso', array(
		'labels' => array(
			'name'          => __( 'Recursos gratuitos', 'st-rrpp' ),
			'singular_name' => __( 'Recurso', 'st-rrpp' ),
			'add_new_item'  => __( 'Agregar recurso', 'st-rrpp' ),
			'edit_item'     => __( 'Editar recurso', 'st-rrpp' ),
		),
		'public'       => true,
		'has_archive'  => false,
		'rewrite'      => array( 'slug' => 'recurso' ),
		'menu_icon'    => 'dashicons-media-document',
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'strrpp_register_recurso_cpt' );

function strrpp_recurso_icon( $post_id ) {
	$icon = get_post_meta( $post_id, '_st_recurso_icon', true );
	return $icon ? $icon : '📄';
}

function strrpp_recurso_file( $post_id ) {
	return get_post_meta( $post_id, '_st_recurso_file', true );
}
