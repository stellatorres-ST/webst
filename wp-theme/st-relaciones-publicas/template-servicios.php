<?php
/**
 * Template Name: Servicios
 *
 * Fuente de referencia: /maqueta-servicios.html
 * Los 4 pilares de servicio con su listado interno son contenido real del
 * cliente (no placeholder) — para editarlos hay que tocar este array.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$servicios = array(
	array(
		'num'   => '01',
		'title' => __( 'Estrategia y Consultoría', 'st-rrpp' ),
		'items' => array(
			__( 'Marketing estratégico', 'st-rrpp' ),
			__( 'Estrategia de comunicación', 'st-rrpp' ),
			__( 'Posicionamiento de marca', 'st-rrpp' ),
			__( 'Auditoría y diagnóstico', 'st-rrpp' ),
			__( 'Ecosistema digital', 'st-rrpp' ),
			__( 'Planes de marketing y comunicación', 'st-rrpp' ),
		),
	),
	array(
		'num'   => '02',
		'title' => __( 'Relaciones Públicas y Comunicación', 'st-rrpp' ),
		'items' => array(
			__( 'Relaciones Públicas', 'st-rrpp' ),
			__( 'Comunicación institucional', 'st-rrpp' ),
			__( 'Comunicación interna', 'st-rrpp' ),
			__( 'Gestión de públicos y vínculos', 'st-rrpp' ),
			__( 'Reputación e imagen', 'st-rrpp' ),
			__( 'Relaciones con medios', 'st-rrpp' ),
			__( 'Comunicación de crisis', 'st-rrpp' ),
			__( 'Alianzas estratégicas', 'st-rrpp' ),
			__( 'Organización y comunicación de eventos', 'st-rrpp' ),
			__( 'Protocolo y ceremonial', 'st-rrpp' ),
			__( 'Comunicación turística y territorial', 'st-rrpp' ),
		),
	),
	array(
		'num'   => '03',
		'title' => __( 'Marketing Digital', 'st-rrpp' ),
		'items' => array(
			__( 'Social Media Management', 'st-rrpp' ),
			__( 'Community Management', 'st-rrpp' ),
			__( 'Estrategia de contenidos', 'st-rrpp' ),
			__( 'Gestión de redes sociales', 'st-rrpp' ),
			__( 'Campañas digitales', 'st-rrpp' ),
			__( 'Producción de contenidos', 'st-rrpp' ),
			__( 'Analítica y métricas', 'st-rrpp' ),
			__( 'Automatización e IA', 'st-rrpp' ),
			__( 'Desarrollo de sitios web y landing pages', 'st-rrpp' ),
		),
	),
	array(
		'num'   => '04',
		'title' => __( 'Formación y Mentoría', 'st-rrpp' ),
		'items' => array(
			__( 'Capacitaciones', 'st-rrpp' ),
			__( 'Mentorías', 'st-rrpp' ),
			__( 'Marketing Digital', 'st-rrpp' ),
			__( 'Relaciones Públicas', 'st-rrpp' ),
			__( 'Inteligencia Artificial', 'st-rrpp' ),
			__( 'Social Media', 'st-rrpp' ),
			__( 'Emprendimiento', 'st-rrpp' ),
			__( 'Estrategia y gestión de negocios', 'st-rrpp' ),
		),
	),
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
					<div class="num data"><?php echo esc_html( $s['num'] ); ?></div>
					<h3><?php echo esc_html( $s['title'] ); ?></h3>
					<ul class="servicio-lista">
						<?php foreach ( $s['items'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
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
