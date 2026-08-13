<?php
/**
 * Ficha de curso individual — override de WooCommerce.
 *
 * Reemplaza woocommerce/templates/content-single-product.php. Los 9
 * bloques definidos en la maqueta /maqueta-ficha-curso.html: hero + tarjeta
 * de compra, checklist, para quién es, programa en acordeón, docente,
 * beneficios, FAQ, CTA final, cross-sell + barra fija mobile.
 *
 * Contenido editable vía custom fields del producto — ver
 * inc/course-meta.php para las claves y el formato de cada bloque.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id  = $product->get_id();
$hero_eyebrow = strrpp_course_meta( $product_id, '_st_hero_eyebrow', __( 'Curso online · Certificado', 'st-rrpp' ) );
$hero_meta    = strrpp_course_hero_meta( $product_id );
$checklist    = strrpp_course_checklist( $product_id );
$perfiles     = strrpp_course_perfiles( $product_id );
$programa     = strrpp_course_programa( $product_id );
$docente_bio  = strrpp_course_meta( $product_id, '_st_docente_bio', __( 'Consultora en Relaciones Públicas y speaker especializada en comunicación estratégica, con trayectoria acompañando marcas y organizaciones en Argentina y LatAm.', 'st-rrpp' ) );
$faq          = strrpp_course_faq( $product_id );
$related_ids  = wc_get_related_products( $product_id, 3 );

body_class( 'has-mobile-buybar' );
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'Cursos', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<?php do_action( 'woocommerce_before_single_product' ); ?>
<?php wc_print_notices(); ?>

<!-- 1. HERO + tarjeta de compra -->
<section class="curso-hero">
	<div class="container curso-hero-inner">
		<div>
			<div class="curso-hero-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></div>
			<h1><?php the_title(); ?></h1>
			<div class="lead"><?php echo wp_kses_post( $product->get_short_description() ); ?></div>
			<?php if ( ! empty( $hero_meta ) ) : ?>
				<div class="curso-hero-meta data">
					<?php foreach ( $hero_meta as $dato ) : ?>
						<span><?php echo esc_html( $dato ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<a href="#programa" class="btn btn-outline-light"><?php esc_html_e( 'Ver programa completo', 'st-rrpp' ); ?></a>
		</div>

		<div class="buy-card">
			<div class="price-row">
				<div class="price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
			</div>
			<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn btn-coral btn-block">
				<?php echo esc_html( $product->is_purchasable() ? __( 'Comprar curso', 'st-rrpp' ) : __( 'Consultar', 'st-rrpp' ) ); ?>
			</a>
			<a href="#programa" class="btn btn-outline-navy btn-block"><?php esc_html_e( 'Ver programa', 'st-rrpp' ); ?></a>
			<p class="fine-print"><?php esc_html_e( 'Acceso inmediato · Pago único o en cuotas', 'st-rrpp' ); ?></p>
		</div>
	</div>
</section>

<!-- 2. Qué vas a aprender -->
<?php if ( ! empty( $checklist ) ) : ?>
<section class="checklist-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'Qué vas a aprender', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Al terminar este curso vas a poder', 'st-rrpp' ); ?></h2>
		<div class="check-grid">
			<?php foreach ( $checklist as $item ) : ?>
				<div class="check-item"><span class="tick">✓</span> <?php echo esc_html( $item ); ?></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 3. Para quién es -->
<?php if ( ! empty( $perfiles ) ) : ?>
<section class="perfiles-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( '¿Para quién es este curso?', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Elegí el perfil que más se parece al tuyo', 'st-rrpp' ); ?></h2>
		<div class="perfiles-grid">
			<?php foreach ( $perfiles as $perfil ) : ?>
				<div class="perfil-card">
					<h3><?php echo esc_html( $perfil['titulo'] ); ?></h3>
					<p><?php echo esc_html( $perfil['texto'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 4. Programa -->
<?php if ( ! empty( $programa ) ) : ?>
<section class="programa-section" id="programa">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Programa', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Temario del curso', 'st-rrpp' ); ?></h2>
		<div class="programa-list">
			<?php foreach ( $programa as $i => $modulo ) : ?>
				<details class="modulo" <?php echo 0 === $i ? 'open' : ''; ?>>
					<summary>
						<span><span class="mod-num data"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><?php echo esc_html( $modulo['titulo'] ); ?></span>
						<?php if ( ! empty( $modulo['duracion'] ) ) : ?>
							<span class="mod-meta"><?php echo esc_html( $modulo['duracion'] ); ?></span>
						<?php endif; ?>
						<span class="caret">▾</span>
					</summary>
					<?php if ( ! empty( $modulo['clases'] ) ) : ?>
						<div class="modulo-body">
							<ul>
								<?php foreach ( $modulo['clases'] as $clase ) : ?>
									<li><?php echo esc_html( $clase ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 5. Docente -->
<section class="docente-section">
	<div class="container">
		<div class="docente-inner">
			<div class="docente-photo">[ <?php esc_html_e( 'foto Stella Torres', 'st-rrpp' ); ?> ]</div>
			<div>
				<div class="docente-eyebrow"><?php esc_html_e( 'Tu docente', 'st-rrpp' ); ?></div>
				<h2>Stella Torres</h2>
				<p><?php echo esc_html( $docente_bio ); ?></p>
				<a href="<?php echo esc_url( home_url( '/stella-torres' ) ); ?>" class="btn btn-outline-navy btn-sm"><?php esc_html_e( 'Conocer más sobre Stella', 'st-rrpp' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- 6. Beneficios -->
<section class="beneficios-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Qué incluye', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Beneficios del curso', 'st-rrpp' ); ?></h2>
		<div class="beneficios-grid">
			<div class="beneficio-item">
				<div class="icon">🎓</div>
				<h4><?php esc_html_e( 'Certificado', 'st-rrpp' ); ?></h4>
				<p><?php esc_html_e( 'Emitido al completar el 100% y aprobar la evaluación final', 'st-rrpp' ); ?></p>
			</div>
			<div class="beneficio-item">
				<div class="icon">♾️</div>
				<h4><?php esc_html_e( 'Acceso ilimitado', 'st-rrpp' ); ?></h4>
				<p><?php esc_html_e( 'Mirá las clases las veces que quieras, sin vencimiento', 'st-rrpp' ); ?></p>
			</div>
			<div class="beneficio-item">
				<div class="icon">📄</div>
				<h4><?php esc_html_e( 'Material descargable', 'st-rrpp' ); ?></h4>
				<p><?php esc_html_e( 'Plantillas y guías listas para usar en tu trabajo', 'st-rrpp' ); ?></p>
			</div>
			<div class="beneficio-item">
				<div class="icon">💬</div>
				<h4><?php esc_html_e( 'Soporte de consultas', 'st-rrpp' ); ?></h4>
				<p><?php esc_html_e( 'Acompañamiento durante todo el curso', 'st-rrpp' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 7. FAQ -->
<?php if ( ! empty( $faq ) ) : ?>
<section class="faq-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Preguntas frecuentes', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;">FAQ</h2>
		<div class="faq-list">
			<?php foreach ( $faq as $i => $item ) : ?>
				<details class="faq-item" <?php echo 0 === $i ? 'open' : ''; ?>>
					<summary><?php echo esc_html( $item['pregunta'] ); ?> <span class="caret">▾</span></summary>
					<p><?php echo esc_html( $item['respuesta'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 8. CTA final -->
<section class="cta-final">
	<div class="container">
		<h2><?php esc_html_e( '¿Lista o listo para empezar?', 'st-rrpp' ); ?></h2>
		<p><?php echo esc_html( sprintf( /* translators: %s: nombre del curso */ __( 'Sumate a %s y llevate resultados concretos.', 'st-rrpp' ), get_the_title() ) ); ?></p>
		<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn btn-coral">
			<?php echo esc_html( __( 'Comprar curso', 'st-rrpp' ) . ' — ' . wp_strip_all_tags( $product->get_price_html() ) ); ?>
		</a>
	</div>
</section>

<!-- 9. Cross-sell -->
<?php if ( ! empty( $related_ids ) ) : ?>
<section class="crosssell-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'También te puede interesar', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Cursos relacionados', 'st-rrpp' ); ?></h2>
		<div class="crosssell-grid">
			<?php foreach ( $related_ids as $related_id ) :
				$related = wc_get_product( $related_id );
				if ( ! $related ) {
					continue;
				}
				?>
				<article class="curso-card">
					<a href="<?php echo esc_url( $related->get_permalink() ); ?>" class="curso-thumb">
						<?php echo $related->get_image( 'medium' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					</a>
					<div class="curso-body">
						<h3><a href="<?php echo esc_url( $related->get_permalink() ); ?>"><?php echo esc_html( $related->get_name() ); ?></a></h3>
						<?php $related_meta = strrpp_course_card_meta( $related_id ); ?>
						<?php if ( ! empty( $related_meta ) ) : ?>
							<div class="curso-meta data">
								<?php foreach ( $related_meta as $dato ) : ?>
									<span><?php echo esc_html( $dato ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="curso-footer">
							<div class="curso-price data"><?php echo wp_kses_post( $related->get_price_html() ); ?></div>
							<div class="curso-cta-row">
								<a href="<?php echo esc_url( $related->add_to_cart_url() ); ?>" class="btn btn-coral btn-sm"><?php esc_html_e( 'Comprar curso', 'st-rrpp' ); ?></a>
								<a href="<?php echo esc_url( $related->get_permalink() ); ?>" class="btn-detalles"><span class="plus-icon">+</span> <?php esc_html_e( 'Detalles', 'st-rrpp' ); ?></a>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<div class="mobile-buybar">
	<div class="price data"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
	<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn btn-coral btn-sm">
		<?php esc_html_e( 'Comprar curso', 'st-rrpp' ); ?>
	</a>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
