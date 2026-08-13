<?php
/**
 * Template Name: Stella Torres
 *
 * Fuente de referencia: /maqueta-stella-torres.html
 * Marca personal dentro del mismo sitio, diferenciada visualmente con
 * la franja teal superior (.personal-bar), sin salir del sistema de marca.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="personal-bar"><?php esc_html_e( 'Marca personal de Stella Torres — dentro de ST Relaciones Públicas', 'st-rrpp' ); ?></div>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<section class="stella-hero">
	<div class="container stella-hero-inner">
		<div class="stella-hero-photo">[ <?php esc_html_e( 'foto Stella Torres', 'st-rrpp' ); ?> ]</div>
		<div>
			<div class="stella-hero-eyebrow"><?php esc_html_e( 'Consultora · Speaker', 'st-rrpp' ); ?></div>
			<h1>Stella Torres</h1>
			<p class="lead"><?php esc_html_e( 'Comunicación estratégica y Relaciones Públicas para marcas, organizaciones y equipos de liderazgo en Argentina y LatAm.', 'st-rrpp' ); ?></p>
			<div class="stella-hero-ctas">
				<a href="#contratar" class="btn btn-coral"><?php esc_html_e( 'Contratar para tu evento', 'st-rrpp' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/cursos' ) ); ?>" class="btn btn-outline-light"><?php esc_html_e( 'Ver cursos que dicta', 'st-rrpp' ); ?></a>
			</div>
		</div>
	</div>
</section>

<section class="bio-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'Sobre mí', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Trayectoria', 'st-rrpp' ); ?></h2>
		<?php if ( get_the_content() ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<p><?php
				printf(
					/* translators: %s: frase resaltada */
					esc_html__( 'Soy consultora en Relaciones Públicas y comunicación estratégica, con %s en el diseño de sus estrategias de comunicación.', 'st-rrpp' ),
					'<span class="highlight">' . esc_html__( 'más de 15 años acompañando marcas y organizaciones', 'st-rrpp' ) . '</span>'
				);
			?></p>
			<p><?php
				printf(
					/* translators: %s: frase resaltada */
					esc_html__( 'Dirijo %s, mi marca de formación, donde llevo ese mismo estándar profesional a comunicadores de toda LatAm a través de cursos y capacitaciones in company.', 'st-rrpp' ),
					'<span class="highlight">ST Relaciones Públicas</span>'
				);
			?></p>
			<p><?php esc_html_e( 'Como speaker, doy charlas y talleres sobre comunicación estratégica, gestión de prensa y comunicación de crisis para empresas y organizaciones.', 'st-rrpp' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="stats-section">
	<div class="container stats-grid">
		<div class="stat-item"><div class="num">15+</div><div class="label"><?php esc_html_e( 'Años de trayectoria', 'st-rrpp' ); ?></div></div>
		<div class="stat-item"><div class="num">80+</div><div class="label"><?php esc_html_e( 'Empresas asesoradas', 'st-rrpp' ); ?></div></div>
		<div class="stat-item"><div class="num">1200+</div><div class="label"><?php esc_html_e( 'Alumnos formados', 'st-rrpp' ); ?></div></div>
		<div class="stat-item"><div class="num">30+</div><div class="label"><?php esc_html_e( 'Charlas dictadas', 'st-rrpp' ); ?></div></div>
	</div>
</section>

<section>
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'Speaking', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Temas de charlas y talleres', 'st-rrpp' ); ?></h2>
		<div class="charlas-grid">
			<div class="charla-card">
				<h3><?php esc_html_e( 'Comunicación estratégica para líderes', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Cómo comunicar decisiones con claridad e impacto.', 'st-rrpp' ); ?></p>
			</div>
			<div class="charla-card">
				<h3><?php esc_html_e( 'Gestión de prensa en la era digital', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'RRPP tradicionales combinadas con estrategias digitales.', 'st-rrpp' ); ?></p>
			</div>
			<div class="charla-card">
				<h3><?php esc_html_e( 'Comunicación de crisis', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Cómo prepararse antes de que la crisis llegue.', 'st-rrpp' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="prensa-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Prensa', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Medios donde participé', 'st-rrpp' ); ?></h2>
		<div class="prensa-logos">
			<span>[ <?php esc_html_e( 'Medio 1', 'st-rrpp' ); ?> ]</span>
			<span>[ <?php esc_html_e( 'Medio 2', 'st-rrpp' ); ?> ]</span>
			<span>[ <?php esc_html_e( 'Medio 3', 'st-rrpp' ); ?> ]</span>
			<span>[ <?php esc_html_e( 'Medio 4', 'st-rrpp' ); ?> ]</span>
		</div>
	</div>
</section>

<section class="cta-final" id="contratar">
	<div class="container">
		<h2><?php esc_html_e( '¿Buscás una speaker para tu próximo evento?', 'st-rrpp' ); ?></h2>
		<div class="ctas">
			<a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn btn-coral"><?php esc_html_e( 'Contactar a Stella', 'st-rrpp' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
