<?php
/**
 * ST Relaciones Públicas — funciones del theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STRRPP_VERSION', '0.1.0' );
define( 'STRRPP_DIR', get_template_directory() );
define( 'STRRPP_URI', get_template_directory_uri() );

/**
 * Theme setup: soporte de features, menús, thumbnails.
 */
function strrpp_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );

	set_post_thumbnail_size( 800, 500, true );

	register_nav_menus( array(
		'primary' => __( 'Menú principal', 'st-rrpp' ),
		'footer-nav'      => __( 'Footer — Navegación', 'st-rrpp' ),
		'footer-blog'     => __( 'Footer — Categorías de blog', 'st-rrpp' ),
		'footer-recursos' => __( 'Footer — Recursos destacados', 'st-rrpp' ),
		'footer-legal'    => __( 'Footer — Legales', 'st-rrpp' ),
	) );
}
add_action( 'after_setup_theme', 'strrpp_setup' );

/**
 * Registro de widget areas (footer, sidebar de cursos, escritorio del alumno).
 */
function strrpp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Blog', 'st-rrpp' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'strrpp_widgets_init' );

/**
 * Enqueue de estilos y scripts.
 */
function strrpp_assets() {
	wp_enqueue_style(
		'strrpp-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&family=Roboto+Condensed:wght@400;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'strrpp-main', STRRPP_URI . '/assets/css/main.css', array(), STRRPP_VERSION );

	wp_enqueue_script( 'strrpp-main', STRRPP_URI . '/assets/js/main.js', array(), STRRPP_VERSION, true );

	if ( defined( 'LEARNDASH_VERSION' ) ) {
		wp_enqueue_style( 'strrpp-learndash', STRRPP_URI . '/assets/css/learndash.css', array( 'strrpp-main' ), STRRPP_VERSION );
	}

	wp_localize_script( 'strrpp-main', 'strrppData', array(
		'currency' => strrpp_get_current_currency(),
	) );
}
add_action( 'wp_enqueue_scripts', 'strrpp_assets' );

/** Includes */
require STRRPP_DIR . '/inc/currency-switcher.php';
require STRRPP_DIR . '/inc/template-tags.php';
require STRRPP_DIR . '/inc/course-meta.php';
require STRRPP_DIR . '/inc/in-company-form.php';
require STRRPP_DIR . '/inc/contact-form.php';
require STRRPP_DIR . '/inc/recursos-cpt.php';
require STRRPP_DIR . '/inc/learndash-integration.php';
