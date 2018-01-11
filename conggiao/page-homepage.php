<?php
/* Template Name: HomePage Template 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CongGiao
 */

get_header(); 

$homesidebar 	= cg_home_get_sidebar();
$homesearch 	= cg_home_get_showsearch();
$homefeatured 	= cg_home_get_featured();
$isSidebar 		= ($homesidebar['chon'] == 'y') ? "sidebar-".$homesidebar['pos'] : '';

if ($homesearch == 'y'){
?>
<!-- Search -->
<div class="container" id="homepagesearch">
	<form role="search" action="<?php echo site_url('/'); ?>" method="get"  class="control">
		<p class="control has-icons-right">
	    <input type="text" name="s" placeholder="Nhập nội dung muốn tìm kiếm" class="is-rounded input is-large"/>
	    <span class="icon is-small is-right">
	    	<i class="fas fa-search"></i>
	    </span>
	  </p>
        
    </form>
</div>
<?php } 
if ($homefeatured['chon'] == 'y'){ ?>
<div class="container" id="homepage-featured">
<?php 
	switch ($homefeatured['style']) {
		case 's1':
			include( locate_template('template-parts/homepageslider-style1.php') );
			break;
		case 's2':
			include( locate_template('template-parts/homepageslider-style2.php') );
			break;
		case 's3':
			echo do_shortcode( $homefeatured['scode'] );
			break;
		default:
			# code...
			break;
	}
?>
</div>
<?php } ?>


<div class="container">
	<div class="homepage columns <?php echo $isSidebar; ?>">
		<div id="primary" class="content-area column <?php echo ($homesidebar['chon'] == 'y') ? 'is-9' : '';?>">
			<main id="main" class="site-main">
				ok	
			</main><!-- #main -->
		</div><!-- #primary -->

<?php
if ($homesidebar['chon'] == 'y'){
	get_sidebar();
}
?>
	</div><!-- Columns -->
</div><!-- Container -->
<?php
get_footer();

?>