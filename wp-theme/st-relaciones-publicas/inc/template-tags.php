<?php
/**
 * Helpers de template reutilizados por header/footer/front-page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Selector de moneda ARS/USD (header, sticky en todas las páginas con precios).
 */
function strrpp_currency_switcher() {
	$current = strrpp_get_current_currency();
	?>
	<div class="currency-switcher" aria-label="<?php esc_attr_e( 'Selector de moneda', 'st-rrpp' ); ?>" data-nonce="<?php echo esc_attr( strrpp_currency_nonce() ); ?>">
		<button type="button" data-currency="ARS" class="<?php echo 'ARS' === $current ? 'active' : ''; ?>">ARS</button>
		<button type="button" data-currency="USD" class="<?php echo 'USD' === $current ? 'active' : ''; ?>">USD</button>
	</div>
	<?php
}

/**
 * Menú principal con fallback a enlaces placeholder si aún no se cargó
 * el menú "primary" desde Apariencia > Menús.
 */
function strrpp_primary_nav( $args = array() ) {
	$defaults = array(
		'theme_location' => 'primary',
		'container'      => false,
		'menu_class'     => 'main-nav',
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'fallback_cb'    => 'strrpp_primary_nav_fallback',
		'depth'          => 1,
	);
	wp_nav_menu( wp_parse_args( $args, $defaults ) );
}

function strrpp_primary_nav_fallback() {
	$items = array(
		__( 'Inicio', 'st-rrpp' )                 => home_url( '/' ),
		__( 'Sobre ST', 'st-rrpp' )                => '#',
		__( 'Servicios', 'st-rrpp' )               => '#',
		__( 'Cursos', 'st-rrpp' )                  => '#',
		__( 'Capacitaciones In Company', 'st-rrpp' ) => '#',
		__( 'Blog', 'st-rrpp' )                    => '#',
		__( 'Recursos gratuitos', 'st-rrpp' )      => '#',
		__( 'Stella Torres', 'st-rrpp' )           => '#',
		__( 'Contacto', 'st-rrpp' )                => '#',
	);
	echo '<ul class="main-nav">';
	foreach ( $items as $label => $url ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}
