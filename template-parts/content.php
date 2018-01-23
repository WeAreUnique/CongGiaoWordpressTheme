<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CongGiao
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'conggiao' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer" style="display: block; margin-top: 20px;">
		<?php 
		if (is_single()){
			the_tags( '<div class="tags"><span class="tag">', '</span><span class="tag">', '</span></div>' );
		}
		?>
	</footer><!-- .entry-footer -->
</article>
