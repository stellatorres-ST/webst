<?php
/**
 * Template Name: Recursos Gratuitos
 *
 * Fuente de referencia: /maqueta-recursos.html
 * Lista todos los posts del custom post type "st_recurso" en tarjetas con
 * CTA propio (patrón Vilma Núñez: cada recurso captura su propia acción,
 * no un botón único genérico).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$recursos = new WP_Query( array(
	'post_type'      => 'st_recurso',
	'posts_per_page' => -1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<section class="recursos-hero">
	<div class="container">
		<h1><?php esc_html_e( 'Recursos gratuitos', 'st-rrpp' ); ?></h1>
		<p><?php esc_html_e( 'Guías, plantillas y checklists listos para usar en tu trabajo de comunicación. Sin costo, descarga inmediata.', 'st-rrpp' ); ?></p>
	</div>
</section>

<section>
	<div class="container">
		<?php if ( $recursos->have_posts() ) : ?>
			<div class="recursos-grid">
				<?php
				while ( $recursos->have_posts() ) :
					$recursos->the_post();
					$file = strrpp_recurso_file( get_the_ID() );
					?>
					<div class="recurso-card">
						<div class="top-row">
							<div class="icon"><?php echo esc_html( strrpp_recurso_icon( get_the_ID() ) ); ?></div>
							<span class="badge-free"><?php esc_html_e( 'Gratis', 'st-rrpp' ); ?></span>
						</div>
						<h3><?php the_title(); ?></h3>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						<?php if ( $file ) : ?>
							<a href="<?php echo esc_url( $file ); ?>" class="btn btn-coral btn-block" target="_blank" rel="noopener"><?php esc_html_e( 'Obtener gratis', 'st-rrpp' ); ?></a>
						<?php else : ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-coral btn-block"><?php esc_html_e( 'Ver más', 'st-rrpp' ); ?></a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Todavía no hay recursos cargados. Agregalos desde el escritorio de WordPress en "Recursos gratuitos".', 'st-rrpp' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
