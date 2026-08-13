<?php
/**
 * Header — ST Relaciones Públicas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="header-inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<span class="logo-mark" aria-hidden="true">ST</span>
				<span class="logo-text"><strong><?php esc_html_e( 'Relaciones', 'st-rrpp' ); ?></strong><small><?php esc_html_e( 'Públicas', 'st-rrpp' ); ?></small></span>
			<?php endif; ?>
		</a>

		<nav aria-label="<?php esc_attr_e( 'Menú principal', 'st-rrpp' ); ?>">
			<?php strrpp_primary_nav(); ?>
		</nav>

		<div class="header-actions">
			<a href="<?php echo esc_url( home_url( '/recursos-gratuitos' ) ); ?>" class="badge badge-free header-free-badge"><?php esc_html_e( 'Recursos gratis', 'st-rrpp' ); ?></a>
			<?php strrpp_currency_switcher(); ?>
			<a href="<?php echo esc_url( home_url( '/cursos' ) ); ?>" class="btn btn-coral btn-sm"><?php esc_html_e( 'Ver cursos', 'st-rrpp' ); ?></a>
			<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Abrir menú', 'st-rrpp' ); ?>" aria-expanded="false">☰</button>
		</div>
	</div>

	<nav class="mobile-nav" aria-label="<?php esc_attr_e( 'Menú mobile', 'st-rrpp' ); ?>">
		<?php strrpp_primary_nav( array( 'menu_class' => '', 'depth' => 0 ) ); ?>
	</nav>
</header>
