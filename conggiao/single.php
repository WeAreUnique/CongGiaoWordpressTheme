<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CongGiao
 */

get_header(); 
$singleDefault = cg_gen_get_single_appearance();
$isSidebar 	= ($singleDefault['sidebar'] == 'y') ? "sidebar-".$singleDefault['sidebarpost'] : '';
// printArr($singleDefault, 'singleDefault');
$style = "border-radius: {$singleDefault['radius']}px";
?>
<?php if ( have_posts() ) :  ?>

<div class="header-section">
	<div class="container">
        <h1 class="title is-3 is-spaced"><?php if ( $singleDefault['title'] == 'y' ): the_title(); endif; ?></h1>
    </div>
</div>

	<?php if ( $singleDefault['sidebar'] == 'n' ) :  ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<?php if ( $singleDefault['meta'] == 'y' ) :  ?>
			<?php include( locate_template('template-parts/single-meta.php') ); ?>
		<?php endif; ?>
		<main id="main" class="site-main single-content" style="<?php echo $style; ?>">
			<div class="content">
				<?php include( locate_template('template-parts/content.php') ); ?>
			</div>
		</main>
		<?php if ($singleDefault['related'] == 'y'){
            include( locate_template('template-parts/single-related.php') );
        } ?>
		<?php if ($singleDefault['comments'] == 'y'){
            comments_template();
        } ?>
	</div>
	<?php endwhile; ?>
	<?php else:  ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="columns <?php echo $isSidebar; ?>">
			<div id="primary" class="content-area column <?php echo ($singleDefault['sidebar'] == 'y') ? 'is-9' : '';?>">
				<?php if ( $singleDefault['meta'] == 'y' ) :  ?>
					<?php include( locate_template('template-parts/single-meta.php') ); ?>
				<?php endif; ?>
				<main id="main" class="site-main single-content" style="<?php echo $style; ?>">
					<div class="content">
						<?php include( locate_template('template-parts/content.php') ); ?>
					</div>
				</main>
				<?php if ($singleDefault['related'] == 'y'){
                    include( locate_template('template-parts/single-related.php') );
                } ?>
				<?php if ($singleDefault['comments'] == 'y'){
                    comments_template();
                } ?>
			</div>
			<?php 
			if ( is_active_sidebar( 'widget-single' ) ) {
				echo '<aside id="sidebar" class="widget-area column is-3">';
					dynamic_sidebar( 'widget-single' );
				echo '</aside>';
			}
			?>
		</div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>

<?php endif; ?>

<?php get_footer();
