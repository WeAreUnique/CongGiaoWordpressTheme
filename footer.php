<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CongGiao
 */

$wgNumber	= cg_gen_get_footer_widget();
$numberWd 	= ( $wgNumber['chon'] == 'y' ) ? $wgNumber['number'] : 0;
$footerInfo = cg_gen_get_footer_info();
?>
	</div><!-- #content -->
	<div id="gototop"><i class="fas fa-arrow-circle-up"></i></div>
	<footer id="colophon" class="footer" style="padding: 3rem 1.5rem 1.5rem">
		<div class="container">
		<?php 
			if ( $wgNumber['chon'] == 'y' ){
				echo '<div class="columns footer-widget">';
				for ($i=1; $i <= $numberWd; $i++) {  ?>
				<div class="column widget-area ">
					<?php if ( is_active_sidebar( 'footer-'.$i ) ) : ?>
						<?php dynamic_sidebar( 'footer-'.$i ); ?>
					<?php endif; ?>
				</div>
				<?php 
				}
				echo '</div> <hr>';
			}
		?>
		
			<div class="columns footer-info is-mobile">
				<div class="column">
					<?php echo $footerInfo['left']; ?>
				</div>
				<div class="column has-text-right">
					<?php echo $footerInfo['right']; ?>
				</div>
			</div>
			<?php 
			if ( $footerInfo['credit'] == 1 ){
				echo '<hr>';
				echo '<div class="site-info has-text-centered">';
				echo 'Giao diện được phát triển và chia sẻ miễn phí, nhấn vào <a href="https://github.com/WeAreUnique/CongGiaoWordpressTheme" target="_blank">Đây</a> để theo dõi. <span class="sep"> | </span> Thiết kế: <a href="https://bbland.net" target="_blank">BBLand Blog</a>';
				echo '</div><!-- .site-info -->';
			}
			?>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>