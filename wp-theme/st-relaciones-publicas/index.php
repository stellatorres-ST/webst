<?php
/**
 * Blog — listado de posts con filtro de categorías.
 *
 * Fuente de referencia: /maqueta-blog.html
 * Sirve como archive general y, por la jerarquía de plantillas de
 * WordPress, también para archivos de categoría (category.php la
 * sobreescribe si se agrega más adelante).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$categories = get_categories( array( 'hide_empty' => false ) );
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php esc_html_e( 'Blog', 'st-rrpp' ); ?>
</div>

<section class="blog-hero">
	<div class="container">
		<h1><?php if ( is_category() ) { single_cat_title(); } else { esc_html_e( 'Blog', 'st-rrpp' ); } ?></h1>
		<p><?php esc_html_e( 'Notas sobre Relaciones Públicas, comunicación estratégica y marketing, escritas para aplicar.', 'st-rrpp' ); ?></p>
	</div>
</section>

<?php if ( ! empty( $categories ) ) : ?>
	<div class="container filtros">
		<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="filtro-pill <?php echo ! is_category() ? 'active' : ''; ?>"><?php esc_html_e( 'Todas', 'st-rrpp' ); ?></a>
		<?php foreach ( $categories as $cat ) : ?>
			<a href="<?php echo esc_url( get_category_link( $cat ) ); ?>" class="filtro-pill <?php echo is_category( $cat->term_id ) ? 'active' : ''; ?>"><?php echo esc_html( $cat->name ); ?></a>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<section style="padding-top:0;">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="blog-archive-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					$cats = get_the_category();
					?>
					<article class="blog-card">
						<a href="<?php the_permalink(); ?>" class="thumb">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium' ); ?>
						</a>
						<div class="body">
							<?php if ( ! empty( $cats ) ) : ?>
								<span class="badge badge-teal"><?php echo esc_html( $cats[0]->name ); ?></span>
							<?php endif; ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
							<span class="meta data"><?php echo esc_html( get_the_date() ); ?></span>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php
				echo paginate_links( array( // phpcs:ignore WordPress.Security.EscapeOutput
					'prev_text' => __( '←', 'st-rrpp' ),
					'next_text' => __( '→', 'st-rrpp' ),
				) );
				?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'No se encontraron contenidos.', 'st-rrpp' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
