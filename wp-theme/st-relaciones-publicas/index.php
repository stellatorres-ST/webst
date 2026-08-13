<?php
/**
 * Fallback template — lista de posts (blog).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section>
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="blog-list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article class="blog-item">
						<a href="<?php the_permalink(); ?>" class="thumb">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium' ); ?>
						</a>
						<div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
						</div>
					</article>
					<?php
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No se encontraron contenidos.', 'st-rrpp' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
