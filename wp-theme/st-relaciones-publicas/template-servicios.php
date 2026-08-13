<?php
/**
 * Template Name: Servicios
 *
 * Fuente de referencia: /maqueta-servicios.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$servicios = array(
	array( '🎯', __( 'Consultoría en RRPP', 'st-rrpp' ), __( 'Diagnóstico y plan de comunicación estratégico para marcas y organizaciones.', 'st-rrpp' ), home_url( '/contacto' ), __( 'Consultar', 'st-rrpp' ) ),
	array( '🏢', __( 'Capacitación In Company', 'st-rrpp' ), __( 'Formación a medida para equipos de comunicación, marketing y RRPP.', 'st-rrpp' ), home_url( '/in-company' ), __( 'Ver más', 'st-rrpp' ) ),
	array( '🎓', __( 'Cursos online', 'st-rrpp' ), __( 'Formación certificada, a tu ritmo, para comunicadores en toda LatAm.', 'st-rrpp' ), home_url( '/cursos' ), __( 'Ver cursos', 'st-rrpp' ) ),
	array( '🚨', __( 'Comunicación de crisis', 'st-rrpp' ), __( 'Protocolos y acompañamiento en tiempo real ante situaciones críticas.', 'st-rrpp' ), home_url( '/contacto' ), __( 'Consultar', 'st-rrpp' ) ),
	array( '🎤', __( 'Vocería y media training', 'st-rrpp' ), __( 'Preparación de voceros para entrevistas, prensa y exposición pública.', 'st-rrpp' ), home_url( '/contacto' ), __( 'Consultar', 'st-rrpp' ) ),
	array( '🔍', __( 'Auditoría de comunicación', 'st-rrpp' ), __( 'Relevamiento completo de la comunicación actual de tu empresa, con recomendaciones concretas.', 'st-rrpp' ), home_url( '/contacto' ), __( 'Consultar', 'st-rrpp' ) ),
);
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<section class="serv-hero">
	<div class="container">
		<div class="serv-hero-eyebrow"><?php esc_html_e( 'Servicios', 'st-rrpp' ); ?></div>
		<h1><?php esc_html_e( 'Consultoría, capacitación y comunicación estratégica', 'st-rrpp' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Trabajamos con marcas, empresas y comunicadores independientes en toda la cadena de la comunicación: desde la estrategia hasta la ejecución.', 'st-rrpp' ); ?></p>
	</div>
</section>

<section>
	<div class="container">
		<div class="servicios-grid">
			<?php foreach ( $servicios as $s ) : ?>
				<div class="servicio-card">
					<div class="icon"><?php echo esc_html( $s[0] ); ?></div>
					<h3><?php echo esc_html( $s[1] ); ?></h3>
					<p><?php echo esc_html( $s[2] ); ?></p>
					<a href="<?php echo esc_url( $s[3] ); ?>"><?php echo esc_html( $s[4] ); ?> →</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="metodologia-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Metodología', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Cómo trabajamos en cada servicio', 'st-rrpp' ); ?></h2>
		<div class="metodologia-steps">
			<div class="metodologia-step"><div class="num data">1</div><h4><?php esc_html_e( 'Diagnóstico', 'st-rrpp' ); ?></h4><p><?php esc_html_e( 'Relevamos tu situación actual', 'st-rrpp' ); ?></p></div>
			<div class="metodologia-step"><div class="num data">2</div><h4><?php esc_html_e( 'Estrategia', 'st-rrpp' ); ?></h4><p><?php esc_html_e( 'Definimos objetivos y plan de acción', 'st-rrpp' ); ?></p></div>
			<div class="metodologia-step"><div class="num data">3</div><h4><?php esc_html_e( 'Ejecución', 'st-rrpp' ); ?></h4><p><?php esc_html_e( 'Implementamos con seguimiento cercano', 'st-rrpp' ); ?></p></div>
			<div class="metodologia-step"><div class="num data">4</div><h4><?php esc_html_e( 'Medición', 'st-rrpp' ); ?></h4><p><?php esc_html_e( 'Reportamos resultados concretos', 'st-rrpp' ); ?></p></div>
		</div>
	</div>
</section>

<section class="cta-final">
	<div class="container">
		<h2><?php esc_html_e( '¿Con cuál servicio te podemos ayudar?', 'st-rrpp' ); ?></h2>
		<a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn btn-coral"><?php esc_html_e( 'Contactanos', 'st-rrpp' ); ?></a>
	</div>
</section>

<?php get_footer(); ?>
