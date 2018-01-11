<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CongGiao
 */
?>

<aside id="sidebar" class="widget-area column is-3">
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-homepage')) ?>
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
