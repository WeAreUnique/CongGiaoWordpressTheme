<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CongGiao
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 

$head_top = cg_gen_get_header_top();
echo cg_gen_get_header_top_src();
//printArr(cg_gen_get_header_top_src(),'cg_gen_get_header_top_src');

?>

<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'conggiao' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'header-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

<?php 
    // printArr(cg_gen_get_mau_sac(), 'cg_gen_get_mau_sac');
    // printArr(cg_gen_get_header_top(), 'cg_gen_get_header_top');
    // printArr(cg_gen_get_footer_widget(), 'cg_gen_get_footer_widget');
    // printArr(cg_gen_get_footer_info(), 'cg_gen_get_footer_info');
    // printArr(cg_home_get_sidebar(), 'cg_home_get_sidebar');
    // printArr(cg_home_get_showsearch(), 'cg_home_get_showsearch');
    // printArr(cg_home_get_featured(), 'cg_home_get_featured');
    // printArr(cg_home_get_section(), 'cg_home_get_section');
    
?>

	<div id="content" class="site-content">
