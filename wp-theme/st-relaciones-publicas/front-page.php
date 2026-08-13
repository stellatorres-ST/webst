<?php
/**
 * Homepage — ST Relaciones Públicas
 *
 * Estructura tomada de /maqueta-st-rrpp.html: hero, tres pilares, catálogo
 * de cursos, in company, Stella Torres, blog + recursos, footer.
 * Los bloques de cursos/blog listos para conectar con WooCommerce/LearnDash
 * y con las categorías del blog cuando haya contenido real cargado.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero">
	<div class="container hero-inner">
		<div>
			<div class="hero-eyebrow"><?php esc_html_e( 'Consultoría · Capacitación · Comunicación', 'st-rrpp' ); ?></div>
			<h1><?php esc_html_e( 'Formación en Relaciones Públicas que se traduce en resultados medibles', 'st-rrpp' ); ?></h1>
			<p class="lead"><?php esc_html_e( 'Cursos, capacitaciones in company y consultoría estratégica para comunicadores y empresas de todo el mundo hispanohablante.', 'st-rrpp' ); ?></p>
			<div class="hero-ctas">
				<a href="<?php echo esc_url( home_url( '/cursos' ) ); ?>" class="btn btn-coral"><?php esc_html_e( 'Ver catálogo de cursos', 'st-rrpp' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/in-company' ) ); ?>" class="btn btn-outline-light"><?php esc_html_e( 'Solicitar capacitación in company', 'st-rrpp' ); ?></a>
			</div>
		</div>
		<div class="hero-visual">
			<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); else : ?>
				<span>[ <?php esc_html_e( 'imagen / video institucional', 'st-rrpp' ); ?> ]</span>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="pilares">
	<div class="container">
		<div class="section-head">
			<div class="section-eyebrow"><?php esc_html_e( 'Qué hacemos', 'st-rrpp' ); ?></div>
			<h2><?php esc_html_e( 'Tres pilares, un mismo estándar de calidad', 'st-rrpp' ); ?></h2>
		</div>
		<div class="pilares-grid">
			<div class="pilar-card">
				<div class="num data">01</div>
				<h3><?php esc_html_e( 'Cursos online', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Formación práctica y certificada, a tu ritmo, con acceso desde cualquier país.', 'st-rrpp' ); ?></p>
			</div>
			<div class="pilar-card">
				<div class="num data">02</div>
				<h3><?php esc_html_e( 'In Company', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Capacitaciones a medida para equipos de comunicación, marketing y RRPP.', 'st-rrpp' ); ?></p>
			</div>
			<div class="pilar-card">
				<div class="num data">03</div>
				<h3><?php esc_html_e( 'Consultoría', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Acompañamiento estratégico de la mano de Stella Torres para marcas y organizaciones.', 'st-rrpp' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="cursos">
	<div class="container">
		<div class="section-head">
			<div class="section-eyebrow"><?php esc_html_e( 'Catálogo', 'st-rrpp' ); ?></div>
			<h2><?php esc_html_e( 'Cursos destacados', 'st-rrpp' ); ?></h2>
		</div>

		<div class="cursos-grid">
			<?php
			$featured_courses = null;
			if ( function_exists( 'wc_get_products' ) ) {
				$featured_courses = wc_get_products( array(
					'featured' => true,
					'limit'    => 3,
					'status'   => 'publish',
				) );
			}

			if ( $featured_courses ) :
				foreach ( $featured_courses as $product ) :
					?>
					<article class="curso-card">
						<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="curso-thumb">
							<?php echo $product->get_image( 'medium' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						</a>
						<div class="curso-body">
							<h3><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
							<?php $card_meta = strrpp_course_card_meta( $product->get_id() ); ?>
							<?php if ( ! empty( $card_meta ) ) : ?>
								<div class="curso-meta data">
									<?php foreach ( $card_meta as $dato ) : ?>
										<span><?php echo esc_html( $dato ); ?></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<div class="curso-footer">
								<div class="curso-price data"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
								<div class="curso-cta-row">
									<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn btn-coral btn-sm"><?php esc_html_e( 'Comprar curso', 'st-rrpp' ); ?></a>
									<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="btn-detalles"><span class="plus-icon">+</span> <?php esc_html_e( 'Detalles', 'st-rrpp' ); ?></a>
								</div>
							</div>
						</div>
					</article>
					<?php
				endforeach;
			else :
				// Placeholder mientras se cargan cursos reales en WooCommerce/LearnDash.
				$placeholders = array(
					array( 'title' => __( 'Relaciones Públicas 360°', 'st-rrpp' ), 'badge' => array( __( 'Certificado', 'st-rrpp' ), 'badge-teal' ), 'meta' => array( '🧩 8 módulos', '⏱ 20 hs', '🎓 Certificado' ), 'price' => '$45.000', 'cta' => __( 'Comprar curso', 'st-rrpp' ) ),
					array( 'title' => __( 'Introducción a la Comunicación Estratégica', 'st-rrpp' ), 'badge' => array( __( 'Gratis', 'st-rrpp' ), 'badge-free' ), 'meta' => array( '🧩 3 módulos', '⏱ 4 hs', '🎓 Certificado' ), 'price' => __( 'Gratis', 'st-rrpp' ), 'cta' => __( 'Empezar', 'st-rrpp' ) ),
					array( 'title' => __( 'Marketing Estratégico para RRPP', 'st-rrpp' ), 'badge' => array( __( 'Nuevo', 'st-rrpp' ), 'badge-coral' ), 'meta' => array( '🧩 6 módulos', '⏱ 14 hs', '🎓 Certificado' ), 'price' => '$38.000', 'cta' => __( 'Comprar curso', 'st-rrpp' ) ),
				);
				foreach ( $placeholders as $curso ) :
					?>
					<article class="curso-card">
						<div class="curso-thumb">
							<span class="badge <?php echo esc_attr( $curso['badge'][1] ); ?>"><?php echo esc_html( $curso['badge'][0] ); ?></span>
						</div>
						<div class="curso-body">
							<h3><?php echo esc_html( $curso['title'] ); ?></h3>
							<div class="curso-meta data">
								<?php foreach ( $curso['meta'] as $dato ) : ?>
									<span><?php echo esc_html( $dato ); ?></span>
								<?php endforeach; ?>
							</div>
							<div class="curso-footer">
								<div class="curso-price data"><?php echo esc_html( $curso['price'] ); ?><?php if ( '$' === substr( $curso['price'], 0, 1 ) ) : ?><small> ARS</small><?php endif; ?></div>
								<div class="curso-cta-row">
									<a href="#" class="btn btn-coral btn-sm"><?php echo esc_html( $curso['cta'] ); ?></a>
									<a href="#" class="btn-detalles"><span class="plus-icon">+</span> <?php esc_html_e( 'Detalles', 'st-rrpp' ); ?></a>
								</div>
							</div>
						</div>
					</article>
					<?php
				endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<section class="incompany">
	<div class="container incompany-inner">
		<div>
			<div class="incompany-eyebrow"><?php esc_html_e( 'Para empresas', 'st-rrpp' ); ?></div>
			<h2><?php esc_html_e( 'Capacitaciones In Company', 'st-rrpp' ); ?></h2>
			<p style="opacity:.85"><?php esc_html_e( 'Formamos equipos completos con programas a medida, en modalidad virtual, presencial o híbrida.', 'st-rrpp' ); ?></p>
			<ul class="incompany-list">
				<li><span class="tick">✓</span> <?php esc_html_e( 'Diagnóstico previo sin costo', 'st-rrpp' ); ?></li>
				<li><span class="tick">✓</span> <?php esc_html_e( 'Certificado por participante', 'st-rrpp' ); ?></li>
				<li><span class="tick">✓</span> <?php esc_html_e( 'Material y seguimiento incluidos', 'st-rrpp' ); ?></li>
			</ul>
			<a href="<?php echo esc_url( home_url( '/in-company' ) ); ?>" class="btn btn-coral"><?php esc_html_e( 'Solicitar cotización', 'st-rrpp' ); ?></a>
		</div>
		<div class="incompany-visual">
			<p class="data" style="opacity:.7">[ <?php esc_html_e( 'testimonio / caso destacado', 'st-rrpp' ); ?> ]</p>
		</div>
	</div>
</section>

<section class="stella">
	<div class="container">
		<div class="stella-inner">
			<div class="stella-photo">[ <?php esc_html_e( 'foto Stella Torres', 'st-rrpp' ); ?> ]</div>
			<div>
				<div class="stella-eyebrow"><?php esc_html_e( 'Marca personal', 'st-rrpp' ); ?></div>
				<h2>Stella Torres</h2>
				<p><?php esc_html_e( 'Consultora en Relaciones Públicas y speaker especializada en comunicación estratégica, con trayectoria acompañando marcas y organizaciones en Argentina y LatAm.', 'st-rrpp' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/stella-torres' ) ); ?>" class="btn btn-outline-navy"><?php esc_html_e( 'Conocer más', 'st-rrpp' ); ?></a>
			</div>
		</div>
	</div>
</section>

<section class="blog-recursos">
	<div class="container blog-grid">
		<div>
			<div class="section-eyebrow"><?php esc_html_e( 'Blog', 'st-rrpp' ); ?></div>
			<h2 style="margin-bottom:24px;"><?php esc_html_e( 'Últimas notas', 'st-rrpp' ); ?></h2>
			<div class="blog-list">
				<?php
				$latest_posts = new WP_Query( array( 'posts_per_page' => 2, 'post_status' => 'publish' ) );
				if ( $latest_posts->have_posts() ) :
					while ( $latest_posts->have_posts() ) :
						$latest_posts->the_post();
						?>
						<article class="blog-item">
							<a href="<?php the_permalink(); ?>" class="thumb">
								<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium' ); ?>
							</a>
							<div>
								<?php
								$cats = get_the_category();
								if ( ! empty( $cats ) ) :
									?>
									<span class="badge badge-teal"><?php echo esc_html( $cats[0]->name ); ?></span>
								<?php endif; ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					?>
					<article class="blog-item">
						<div class="thumb"></div>
						<div>
							<span class="badge badge-teal"><?php esc_html_e( 'Tendencias', 'st-rrpp' ); ?></span>
							<h3><?php esc_html_e( 'Cómo construir una estrategia de comunicación', 'st-rrpp' ); ?></h3>
						</div>
					</article>
				<?php endif; ?>
			</div>
		</div>

		<div class="recursos-side">
			<h4><?php esc_html_e( 'Recursos gratuitos', 'st-rrpp' ); ?></h4>
			<div class="recurso-item"><span><?php esc_html_e( 'Guía de comunicación de crisis', 'st-rrpp' ); ?></span> <span class="badge badge-free"><?php esc_html_e( 'Gratis', 'st-rrpp' ); ?></span></div>
			<div class="recurso-item"><span><?php esc_html_e( 'Plantilla de plan de RRPP', 'st-rrpp' ); ?></span> <span class="badge badge-free"><?php esc_html_e( 'Gratis', 'st-rrpp' ); ?></span></div>
			<div class="recurso-item"><span><?php esc_html_e( 'Checklist de prensa', 'st-rrpp' ); ?></span> <span class="badge badge-free"><?php esc_html_e( 'Gratis', 'st-rrpp' ); ?></span></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
