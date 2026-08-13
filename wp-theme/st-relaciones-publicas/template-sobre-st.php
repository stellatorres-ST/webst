<?php
/**
 * Template Name: Sobre ST
 *
 * Fuente de referencia: /maqueta-sobre-st.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<section class="about-hero">
	<div class="container">
		<div class="about-hero-eyebrow"><?php esc_html_e( 'Quiénes somos', 'st-rrpp' ); ?></div>
		<h1><?php esc_html_e( 'Comunicación con estrategia, no con improvisación', 'st-rrpp' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'ST Relaciones Públicas forma y acompaña a comunicadores y empresas de todo el mundo hispanohablante con un estándar profesional, no genérico.', 'st-rrpp' ); ?></p>
	</div>
</section>

<section>
	<div class="container quienes-inner">
		<div class="quienes-visual">[ <?php esc_html_e( 'imagen institucional', 'st-rrpp' ); ?> ]</div>
		<div class="quienes-text">
			<div class="section-eyebrow"><?php esc_html_e( 'Nuestra historia', 'st-rrpp' ); ?></div>
			<h2><?php esc_html_e( 'De la consultoría individual a una marca de formación', 'st-rrpp' ); ?></h2>
			<?php if ( get_the_content() ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<p><?php
					printf(
						/* translators: %s: frase resaltada */
						esc_html__( 'ST Relaciones Públicas nace de la trayectoria de %s, y se convierte en una marca de formación para llevar ese mismo estándar profesional a comunicadores y empresas de toda LatAm.', 'st-rrpp' ),
						'<span class="highlight">' . esc_html__( 'Stella Torres como consultora en comunicación estratégica', 'st-rrpp' ) . '</span>'
					);
				?></p>
				<p><?php
					printf(
						/* translators: %s: frase resaltada */
						esc_html__( 'Trabajamos con %s: cada curso y cada capacitación in company parte de casos reales, no de teoría aislada.', 'st-rrpp' ),
						'<span class="highlight">' . esc_html__( 'un enfoque práctico, sin fórmulas genéricas', 'st-rrpp' ) . '</span>'
					);
				?></p>
			<?php endif; ?>
			<a href="<?php echo esc_url( home_url( '/cursos' ) ); ?>" class="btn btn-outline-navy"><?php esc_html_e( 'Ver cursos', 'st-rrpp' ); ?></a>
		</div>
	</div>
</section>

<section class="valores-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Cómo trabajamos', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Misión, visión y valores', 'st-rrpp' ); ?></h2>
		<div class="valores-grid">
			<div class="valor-card">
				<h3><?php esc_html_e( 'Misión', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Formar comunicadores y equipos con herramientas de Relaciones Públicas aplicables desde el primer día.', 'st-rrpp' ); ?></p>
			</div>
			<div class="valor-card">
				<h3><?php esc_html_e( 'Visión', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Ser la referencia en formación de RRPP en español, dentro y fuera de Argentina.', 'st-rrpp' ); ?></p>
			</div>
			<div class="valor-card">
				<h3><?php esc_html_e( 'Valores', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Rigor profesional, practicidad y cercanía — sin perder la exclusividad que distingue a ST.', 'st-rrpp' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="equipo-inner">
			<div class="equipo-photo">[ <?php esc_html_e( 'foto Stella Torres', 'st-rrpp' ); ?> ]</div>
			<div>
				<div class="section-eyebrow"><?php esc_html_e( 'Dirección académica', 'st-rrpp' ); ?></div>
				<h2>Stella Torres</h2>
				<p><?php esc_html_e( 'Consultora en Relaciones Públicas y speaker especializada en comunicación estratégica, con trayectoria acompañando marcas y organizaciones en Argentina y LatAm. Dirige el contenido académico de todos los cursos y capacitaciones de ST.', 'st-rrpp' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/stella-torres' ) ); ?>" class="btn btn-outline-navy"><?php esc_html_e( 'Conocer más sobre Stella', 'st-rrpp' ); ?></a>
			</div>
		</div>
	</div>
</section>

<section class="prensa-section">
	<div class="container">
		<div class="section-eyebrow" style="color:var(--color-teal);"><?php esc_html_e( 'Lo que dicen de nosotros', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Prensa y testimonios', 'st-rrpp' ); ?></h2>
		<div class="prensa-grid">
			<div class="prensa-quote">
				<p>&ldquo;<?php esc_html_e( 'Un enfoque de RRPP aplicado, poco común en la formación online en español.', 'st-rrpp' ); ?>&rdquo;</p>
				<span>[ <?php esc_html_e( 'Medio / publicación', 'st-rrpp' ); ?> ]</span>
			</div>
			<div class="prensa-quote">
				<p>&ldquo;<?php esc_html_e( 'El curso me dio un marco que hasta ahora manejaba de forma intuitiva.', 'st-rrpp' ); ?>&rdquo;</p>
				<span>[ <?php esc_html_e( 'Nombre, alumno/a', 'st-rrpp' ); ?> ]</span>
			</div>
			<div class="prensa-quote">
				<p>&ldquo;<?php esc_html_e( 'La capacitación in company fue clave para ordenar la comunicación de nuestro equipo.', 'st-rrpp' ); ?>&rdquo;</p>
				<span>[ <?php esc_html_e( 'Empresa cliente', 'st-rrpp' ); ?> ]</span>
			</div>
		</div>
	</div>
</section>

<section class="cta-final">
	<div class="container">
		<h2><?php esc_html_e( '¿Querés trabajar con nosotros?', 'st-rrpp' ); ?></h2>
		<a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn btn-coral"><?php esc_html_e( 'Contactanos', 'st-rrpp' ); ?></a>
	</div>
</section>

<?php get_footer(); ?>
