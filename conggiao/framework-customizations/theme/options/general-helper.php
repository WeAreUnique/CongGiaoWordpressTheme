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

	$res['desktop'] = conggiao_get_option_setting('gen_img_desktop');
	$res['tablet'] 	= conggiao_get_option_setting('gen_img_tablet');
	$res['mobile'] 	= conggiao_get_option_setting('gen_img_mobile');
	$res['title'] 	= conggiao_get_option_setting('gen_tieu_de');
	$res['link'] 	= conggiao_get_option_setting('gen_lien_ket');
	$gen_is_blank 	= conggiao_get_option_setting('gen_is_blank');
	if ($gen_is_blank == 'true')
		$res['target'] = '_blank';
	else 
		$res['target'] = 'self';
	return $res;
}

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