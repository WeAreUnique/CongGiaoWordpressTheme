<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CongGiao
 */

get_header(); 
$catDefault = cg_gen_get_archives_default('other_default');
$isSidebar 	= ($catDefault['sidebar'] == 'y') ? "sidebar-".$catDefault['sidebarpost'] : '';
$columnDiv	= "<div class='column is-12-mobile is-6-tablet is-4-desktop'>";
switch ($catDefault['columns']) {
	case 'c1':
		$columnDiv	= "<div class='column is-12-mobile is-12-tablet is-12-desktop c1'>";
		break;
	case 'c2':
		$columnDiv	= "<div class='column is-12-mobile is-6-tablet is-6-desktop c2'>";
		break;
	case 'c3':
		$columnDiv	= "<div class='column is-12-mobile is-6-tablet is-4-desktop c3'>";
		break;
	case 'c4':
		$columnDiv	= "<div class='column is-6-mobile is-4-tablet is-3-desktop c4'>";
		break;
	
	default:
		# code...
		break;
}
?>
	<div class="header-section">
		<div class="container">
            <h1 class="title is-2 is-spaced"><?php if ( $catDefault['title'] == 'y' ): the_archive_title(); endif; ?></h1>
            <h2 class="subtitle is-6"><?php if ( $catDefault['exper'] == 'y' ): the_archive_description(); endif; ?></h2>
        </div>
	</div>

	<?php
	if ($catDefault['sidebar'] == 'n'){
		echo '<div class="container">';
		echo '<main id="main" class="site-main content-area">';
			echo "<div class='columns is-mobile is-variable is-2 is-multiline'>";
			if ( have_posts() ) : 
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					echo $columnDiv;
						include( locate_template('template-parts/content-archive.php') );
						//get_template_part( 'template-parts/content', 'archive' );
					echo "</div>";
				endwhile;
				
				//the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			echo "</div>";
			echo '<nav class="pagination is-medium" role="navigation" aria-label="pagination">';
					wp_pagenavi();
			echo '</nav>';
		echo '</main>';
		echo "</div>";
	} else { ?>

	<div class="container">
		<div class="columns <?php echo $isSidebar; ?>">
			<div id="primary" class="content-area column <?php echo ($catDefault['sidebar'] == 'y') ? 'is-9' : '';?>">
				<main id="main" class="site-main">
					<div class="columns archive-posts is-mobile is-variable is-2 is-multiline">
					<?php
					if ( have_posts() ) : 
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							echo $columnDiv;
								include( locate_template('template-parts/content-archive.php') );
							echo "</div>";
						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
					</div><!-- columns -->
					<nav class="pagination is-medium" role="navigation" aria-label="pagination">
						<?php wp_pagenavi(); ?>
					</nav>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php 
			if ( is_active_sidebar( 'widget-archive' ) ) {
				echo '<aside id="sidebar" class="widget-area column is-3">';
					dynamic_sidebar( 'widget-archive' );
				echo '</aside>';
			}
			?>
		</div><!-- Columns -->
	</div><!-- Container -->
	<?php } ?>

<?php get_footer();