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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="robots" content="index, follow">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Tôi Là Tùng">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta name="google-site-verification" content="lzOyODkDACoFFl1RKe7PiCF0lG0AJ5ezHNik9eXo_to" />
	<title><?php wp_title(''); ?></title>
	
	<?php
	// if (defined('WP_DEBUG') && true === WP_DEBUG) {
	// 	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/assets/css/global.css">';
	// }
	wp_head(); 
	?>
	<script>
		FontAwesomeConfig = { searchPseudoElements: true };
	</script>
</head>

<body <?php body_class(); ?>>
<?php 
	$headertop = cg_gen_get_header_top();
	$headernav = cg_gen_get_header_nav();
?>
<div id="page" class="site">
	<header id="masthead" class="site-header <?php echo $headertop['chon']; ?>">
		<div class="site-branding">
		<?php 
			if ($headertop['chon'] == 'c_content'){
				echo '<div class="content">'.$headertop['content'].'</div>';
			} else {
				echo $headertop['result']; 
		?>
		<?php 
			}
		?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation <?php echo $headernav['chon']; ?>">
			<div class="container">
				<a class="mobile-menu"><i class="fa fa-bars"></i> <strong>Menu</strong></a>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'menu_id'        => 'header-menu',
					) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

<?php 
	$bgSetting = cg_gen_get_mau_sac();
	$bgStyle = '';
	if ( $bgSetting['chon'] == 'c_color' ){
		$bgStyle = "style='background-color: {$bgSetting['color']}'";
	}
	if ( $bgSetting['chon'] == 'c_image' ){
		$bgStyle = "style='background-image: url({$bgSetting['upload']}); background-repeat: {$bgSetting['repeat']}; background-size: {$bgSetting['size']}; background-attachment: {$bgSetting['inherit']}; background-position: {$bgSetting['position']};'";
	}

    // printArr(cg_gen_get_mau_sac(), 'cg_gen_get_mau_sac');
    // printArr(cg_gen_get_header_top(), 'cg_gen_get_header_top');
    // printArr(cg_gen_get_header_nav(), 'cg_gen_get_header_nav');
    // printArr(cg_gen_get_footer_widget(), 'cg_gen_get_footer_widget');
    // printArr(cg_gen_get_footer_info(), 'cg_gen_get_footer_info');
    // printArr(cg_home_get_sidebar(), 'cg_home_get_sidebar');
    // printArr(cg_home_get_showsearch(), 'cg_home_get_showsearch');
    // printArr(cg_home_get_featured(), 'cg_home_get_featured');
    // printArr(cg_home_get_section(), 'cg_home_get_section');
    //printArr(cg_gen_get_single_appearance(), 'cg_gen_get_single_appearance');
    //printArr(cg_gen_get_page_appearance(), 'cg_gen_get_page_appearance');
    
    //printArr(cg_gen_get_archives_default('cats_default'), 'cg_gen_get_cats_default');
?>

	<div id="content" class="site-content" <?php echo $bgStyle; ?>>
