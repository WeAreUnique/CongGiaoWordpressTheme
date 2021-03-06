<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CongGiao
 */
$catRadius = $catDefault['post_radius'] > 0 ? 'border-radius: ' . $catDefault['post_radius'] . 'px; overflow: hidden;' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo ($catRadius != '' ? 'style="' . $catRadius . '"'  : '');  ?> >
	<?php if ( $catDefault['post_thumb'] == 'y' ){ ?>
	<div class="post-thumb">
		<a href="<?php echo esc_url( get_permalink() ) ?>" title="" rel="bookmark">
			<img class="post-thumb-img lazyload" data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title() ?>">
		</a>
	</div>
	<?php } ?>
	<?php 
	if ( $catDefault['post_title'] == 'y' ){ 
		the_title( '<h2 class="posttitle"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}
	?>
	<div class="postmeta">
		<div class="postmetawrap">
			<?php if ( $catDefault['post_exper'] == 'y'){ ?>
			<div class="postexcerpt">
				<?php esc_html (the_excerpt() ); ?>
			</div>
			<?php } ?>
			<div class="postinfo">
				<?php if ( $catDefault['post_author'] == 'y'){ ?>
					<span class="postauthor">
						<i class="fas fa-user-circle"></i> <?php the_author_posts_link(); ?>
					</span>
				<?php } ?>
				<?php if ( $catDefault['post_date'] == 'y'){ ?>
					<span class="postdate">
						<i class="far fa-clock"></i> <?php echo get_the_date(); ?>
					</span>
				<?php } ?>
				<?php if ( $catDefault['post_viewer'] == 'y'){ ?>
					<span class="postviews">
						<i class="far fa-eye"></i> <?php the_views($post->ID); ?>
					</span>
				<?php } ?>
				<?php if ( $catDefault['post_comments'] == 'y'){ ?>
					<span class="postcomment">
						<i class="far fa-comments"></i> <?php $comments_count = wp_count_comments($post->ID); echo $comments_count->approved; ?>
					</span>
				<?php } ?>
			</div>
		</div>
	</div>
</article>