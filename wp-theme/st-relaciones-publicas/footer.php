<?php
/**
 * Footer — ST Relaciones Públicas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="site-footer">
	<div class="container footer-grid">
		<div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="color:#fff;">ST <span>Relaciones Públicas</span></a>
			<p style="opacity:.7;margin-top:12px;max-width:280px;font-size:14px;">
				<?php esc_html_e( 'Consultoría y capacitación en Relaciones Públicas, Marketing Estratégico y Comunicación.', 'st-rrpp' ); ?>
			</p>
		</div>

		<div>
			<h4><?php esc_html_e( 'Navegación', 'st-rrpp' ); ?></h4>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-nav',
				'container'      => false,
				'items_wrap'     => '<ul>%3$s</ul>',
				'fallback_cb'    => false,
			) );
			?>
		</div>

		<div>
			<h4><?php esc_html_e( 'Blog', 'st-rrpp' ); ?></h4>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-blog',
				'container'      => false,
				'items_wrap'     => '<ul>%3$s</ul>',
				'fallback_cb'    => false,
			) );
			?>
		</div>

		<div>
			<h4><?php esc_html_e( 'Recursos', 'st-rrpp' ); ?></h4>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-recursos',
				'container'      => false,
				'items_wrap'     => '<ul>%3$s</ul>',
				'fallback_cb'    => false,
			) );
			?>
		</div>
	</div>

	<div class="container footer-bottom">
		<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> ST Relaciones Públicas. <?php esc_html_e( 'Todos los derechos reservados.', 'st-rrpp' ); ?></span>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'footer-legal',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'menu_class'      => '',
			'fallback_cb'    => false,
		) );
		?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
