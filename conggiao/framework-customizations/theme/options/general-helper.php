<?php 

function cg_gen_get_mau_sac(){
	$res = array();

	$opt = conggiao_get_option_setting('gen_bg');
	$chon = $opt['action_show'];

	if ( $chon == 'c_color' ){
		$keys = fw_akg('c_color', $opt);
		$res['color'] = $keys['color'];
	}else{
		//Get Image Key Array
		$keys = fw_akg('c_image/image',$opt);

		if (!empty($keys['image_upload']['url']))
			$res['upload'] = $keys['image_upload']['url'];
		$res['repeat'] = $keys['image_repeat'];
		$res['size'] = $keys['image_size'];
		$res['attachment'] = $keys['image_attachment'];
		$res['position'] = str_replace('_', ' ', $keys['image_position']);
	}

	//Process resturn
	$res['chon'] = $chon;
	return $res;
}

function cg_gen_get_header_top(){
	$res = array();
	
	$opt = conggiao_get_option_setting('header_type');
	$chon = $opt['action_show'];
	if ( $chon == 'c_images' ){
		$mob 	= $opt['c_images']['gen_img_mobile'];
		$tab 	= $opt['c_images']['gen_img_tablet'];
		$des 	= $opt['c_images']['gen_img_desktop'];
		$srcmob = ($mob['url'] != "") ? $mob['url'].' 700w,':'';
		$srctab = ($tab['url'] != "") ? $tab['url'].' 900w,':'';
		$srcdes = ($des['url'] != "") ? $des['url'].' 1200w':'';

		$title 	= $opt['c_images']['gen_tieu_de'];
		$imgurl = '<img data-srcset="'.$srcmob.$srctab.$srcdes.'" class="lazyload" title="'.$title.'"/>';
		
		$link 	= $opt['c_images']['gen_lien_ket'];
		if ($link == ""){
			$link = "#";
		}
		$target = '_self';
		$gen_is_blank 	= $opt['c_images']['gen_is_blank'];
		if ($gen_is_blank == 'true')
			$target = '_blank';
		$result = '<a class="tooltip is-tooltip-multiline is-tooltip-info is-tooltip-bottom" href="'.$link.'" target="'.$target.'" title="'.$title.'" data-tooltip="'.$title.'">'.$imgurl.'</a>';
		$res['result']	= $result;
	}else{
		$res['content'] = $opt['c_content']['header_text'];	
	}
	$res['chon'] = $chon;
	return $res;
}

function cg_gen_get_header_nav(){
	$res = array();
	$opt = conggiao_get_option_setting('header_nav');
	$chon = $opt['action_show'];
	switch ($chon) {
		case 's1':
			$res["bgcolor"]		= $opt['s1']['bg_color'];
			$res["textcolor"]	= $opt['s1']['text_color'];
			$res["hovercolor"]	= $opt['s1']['hover_color'];
			
			break;
		case 's2':
			$res["bgcolor"]		= $opt['s2']['bg_color'];
			$res["textcolor"]	= $opt['s2']['text_color'];
			$res["hovercolor"]	= $opt['s2']['hover_color'];
			break;
		
		default:
			# code...
			break;
	}
	$res['chon'] = $chon;
	return $res;
}

function _action_theme_enqueue_inline_nav_style(){
	if (!defined('FW')) return;
    $w = cg_gen_get_header_nav();

    if ($w['chon'] == 's1'){
    	$s1Style = "<style>
	    	#masthead #site-navigation {
			  background-color: {$w['bgcolor']} !important;
			}
			#masthead #site-navigation .mobile-menu {
			  color: {$w['textcolor']};
			}
			#masthead #site-navigation #header-menu a {
			  color: {$w['textcolor']};
			}
			#masthead #site-navigation #header-menu a:hover, #masthead #site-navigation #header-menu a:active {
			  color: {$w['hovercolor']};
			}
			@media screen and (min-width: 1024px) {
			  #masthead #site-navigation #header-menu li .sub-menu {
			    background-color: {$w['bgcolor']};
			  }
			}
			#masthead #site-navigation.s1 #header-menu > li.current-menu-item a {
			  border-bottom: 3px solid {$w['hovercolor']};
			}
			#masthead #site-navigation.s1 #header-menu > li > a:hover {
			  border-bottom: 3px solid {$w['hovercolor']};
			}</style>";
		// echo "<script>console.log( 'Debug Objects: " . $s1Style . "' );</script>";
    	// wp_add_inline_style( 'navs1style', $s1Style );
    	echo $s1Style;
    }else if ($w['chon'] == 's2'){
    	$s2Style = "<style>
	    	#masthead #site-navigation {
			  background-color: {$w['bgcolor']};
			}
			#masthead #site-navigation .mobile-menu {
			  color: {$w['textcolor']};
			}
			#masthead #site-navigation #header-menu a {
			  color: {$w['textcolor']};
			}
			#masthead #site-navigation #header-menu a:hover, #masthead #site-navigation #header-menu a:active {
			  color: {$w['hovercolor']};
			}
			@media screen and (min-width: 1024px) {
			  #masthead #site-navigation #header-menu li .sub-menu {
			    background-color: {$w['bgcolor']};
			  }
			}
			#masthead #site-navigation.s2 {
			  border-bottom: 3px solid {$w['hovercolor']};
			}
			#masthead #site-navigation.s2 #header-menu li.current-menu-item > a {
			  background-color: {$w['hovercolor']};
			  color: {$w['textcolor']};
			}
			#masthead #site-navigation.s2 #header-menu li a:hover {
			  background-color: {$w['hovercolor']};
			  color: {$w['textcolor']};
			}</style>";
		// echo "<script>console.log( 'Debug Objects: " . $s2Style . "' );</script>";
    	// wp_add_inline_style( 'navs2style', $s2Style );
    	echo $s2Style;
    }
}

add_action('wp_head', '_action_theme_enqueue_inline_nav_style');

function cg_gen_get_footer_widget(){
	$res 	= array();
	$opt 	= conggiao_get_option_setting('gen_widget');
	$chon 	= $opt['action_show'];
	if ( $chon == 'y' ){
		$keys 				= fw_akg('y/widget_setting',$opt);
		$res['number'] 		= ltrim($keys['number'],'c');
		$res['bgColor'] 	= $keys['bg_color'];
		$res['textColor'] 	= $keys['txt_color'];
	}
	$res['chon'] = $chon;
	return $res;
}

function cg_gen_get_footer_info(){
	$res = array();
	$res['left'] 	= conggiao_get_option_setting('gen_left_text');
	$res['right'] 	= conggiao_get_option_setting('gen_right_text');
	$res['credit'] 	= conggiao_get_option_setting('gen_credit');
	
	return $res;
}

add_action('fw_init', '_action_theme_dynamic_footer_sidebar');
function _action_theme_dynamic_footer_sidebar() {
    if (!defined('FW')) return;
    $w = cg_gen_get_footer_widget();
    if ($w['chon'] == 'y'){
        if ( function_exists('register_sidebar') ) {
            register_sidebars($w['number'], array('name'=>'Widget Cuối Trang - Cột %d'));
        }
    }
}



?>