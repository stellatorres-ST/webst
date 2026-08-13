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
		'depth'          => 0,
	);
	wp_nav_menu( wp_parse_args( $args, $defaults ) );
}

/**
 * Menú de respaldo agrupado (7 ítems visibles, 2 con submenú) mientras no
 * se cargue el menú "Menú principal" real en Apariencia > Menús.
 */
function strrpp_primary_nav_fallback() {
	$items = array(
		array( 'label' => __( 'Inicio', 'st-rrpp' ), 'url' => home_url( '/' ) ),
		array(
			'label' => __( 'Sobre ST', 'st-rrpp' ),
			'url'   => '#',
			'children' => array(
				__( 'Quiénes somos', 'st-rrpp' ) => '#',
				__( 'Servicios', 'st-rrpp' )     => '#',
			),
		),
		array( 'label' => __( 'Cursos', 'st-rrpp' ), 'url' => '#' ),
		array( 'label' => __( 'In Company', 'st-rrpp' ), 'url' => '#' ),
		array(
			'label' => __( 'Recursos', 'st-rrpp' ),
			'url'   => '#',
			'children' => array(
				__( 'Blog', 'st-rrpp' )               => '#',
				__( 'Recursos gratuitos', 'st-rrpp' ) => '#',
			),
		),
		array( 'label' => __( 'Stella Torres', 'st-rrpp' ), 'url' => '#' ),
		array( 'label' => __( 'Contacto', 'st-rrpp' ), 'url' => '#' ),
	);

	echo '<ul class="main-nav">';
	foreach ( $items as $item ) {
		$has_children = ! empty( $item['children'] );
		printf( '<li class="%s">', $has_children ? 'menu-item-has-children' : '' );
		printf( '<a href="%s">%s</a>', esc_url( $item['url'] ), esc_html( $item['label'] ) );
		if ( $has_children ) {
			echo '<ul class="sub-menu">';
			foreach ( $item['children'] as $label => $url ) {
				printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
			}
			echo '</ul>';
		}
		echo '</li>';
	}
	echo '</ul>';
}
