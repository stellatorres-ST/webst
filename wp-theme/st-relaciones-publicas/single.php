<?php
/**
 * Vista de post individual del blog.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	$cats = get_the_category();
	?>

	<div class="container breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
		<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'st-rrpp' ); ?></a> /
		<?php the_title(); ?>
	</div>

	<article class="single-post">
		<div class="container" style="max-width:760px;">
			<?php if ( ! empty( $cats ) ) : ?>
				<span class="badge badge-teal"><?php echo esc_html( $cats[0]->name ); ?></span>
			<?php endif; ?>
			<h1 style="margin-top:12px;"><?php the_title(); ?></h1>
			<div class="data" style="opacity:.6;font-size:13px;margin-bottom:var(--space-3);"><?php echo esc_html( get_the_date() ); ?> · <?php the_author(); ?></div>

			<?php if ( has_post_thumbnail() ) : ?>
				<div style="border-radius:var(--radius-lg);overflow:hidden;margin-bottom:var(--space-3);">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			<?php endif; ?>

			<div class="post-content" style="font-size:16px;line-height:1.7;">
				<?php the_content(); ?>
			</div>
		</div>
	</article>

<?php endwhile; ?>

<?php get_footer(); ?>
