<?php 

function cg_home_get_sidebar(){
	$res 	= array();
	$opt 	= conggiao_get_option_setting('home_sidebar');
	$chon 	= $opt['action_show'];
	if ( $chon == 'y' ){
		$res['pos'] 		= fw_akg('y/sidebar_pos',$opt);
	}
	$res['chon'] = $chon;
	return $res;
}

function cg_home_get_showsearch(){
	return conggiao_get_option_setting('home_show_search');
}

function cg_home_get_featured(){
	$res 	= array();
	$opt 	= conggiao_get_option_setting('home_featured');
	$chon 	= $opt['action_show'];
	if ( $chon == 'y' ){
		$style = fw_akg('y/display_style',$opt);
		$res['style'] = $style['action_show'];

		switch ($style['action_show']) {
			case 's1':
				$styleContent 			= fw_akg('y/display_style/s1',$opt);
				$res['num_post'] 		= $styleContent['num_post'];
                $res['show_title'] 		= $styleContent['show_title'];
                $res['show_exper'] 		= $styleContent['show_exper'];
                $res['show_cats'] 		= $styleContent['show_cats'];
                $res['show_date'] 		= $styleContent['show_date'];
                $res['show_author'] 	= $styleContent['show_author'];
                $res['show_viewer'] 	= $styleContent['show_viewer'];
                $res['show_comments'] 	= $styleContent['show_comments'];
                $res['b1_content'] 		= $styleContent['b1_content'];
                $res['b2_content'] 		= $styleContent['b2_content'];
                $res['b3_content'] 		= $styleContent['b3_content'];
                $res['b4_content'] 		= $styleContent['b4_content'];
                $styleSliderChoose 		= fw_akg('slider_type',$styleContent);
                $res['slidertype']  = $styleSliderChoose['action_show'];
                if ($styleSliderChoose['action_show'] == 'c_latest'){
                	$res['slidercats']  = $styleSliderChoose['c_latest']['fromcat'];
                }
                if ($styleSliderChoose['action_show'] == 'c_views'){
                	$res['slidercats']  = $styleSliderChoose['c_views']['fromcat'];
                }
                if ($styleSliderChoose['action_show'] == 'c_manual'){
                	$res['sliderids']   = $styleSliderChoose['c_manual']['postsel'];
                }
				break;

			case 's2':
				$styleContent 			= fw_akg('y/display_style/s2',$opt);
				$res['num_post'] 		= $styleContent['num_post'];
                $res['show_title'] 		= $styleContent['show_title'];
                $res['show_exper'] 		= $styleContent['show_exper'];
                $res['show_cats'] 		= $styleContent['show_cats'];
                $res['show_date'] 		= $styleContent['show_date'];
                $res['show_author'] 	= $styleContent['show_author'];
                $res['show_viewer'] 	= $styleContent['show_viewer'];
                $res['show_comments'] 	= $styleContent['show_comments'];
                $res['b1_content'] 		= $styleContent['b1_content'];
                $res['b2_content'] 		= $styleContent['b2_content'];
                $res['b3_content'] 		= $styleContent['b3_content'];
                $res['b4_content'] 		= $styleContent['b4_content'];
                $styleSliderChoose 		= fw_akg('slider_type',$styleContent);
                $res['slidertype']  = $styleSliderChoose['action_show'];
                if ($styleSliderChoose['action_show'] == 'c_latest'){
                	$res['slidercats']  = $styleSliderChoose['c_latest']['fromcat'];
                }
                if ($styleSliderChoose['action_show'] == 'c_views'){
                	$res['slidercats']  = $styleSliderChoose['c_views']['fromcat'];
                }
                if ($styleSliderChoose['action_show'] == 'c_manual'){
                	$res['sliderids']   = $styleSliderChoose['c_manual']['postsel'];
                }
				break;
			
			default:
				# code...
				break;
		}
	}
	$res['chon'] = $chon;
	return $res;
	// return $opt;
}

function cg_home_get_section(){
	$res 	= array();
	$opt 	= conggiao_get_option_setting('home_sec_content');
	foreach ($opt as $value) {
		$arrVal = array();

		$conType = $value['content_type'];
		$arrVal['chon'] = $conType['action_show'];
		if ( $conType['action_show'] == 'c_post' ){
			$contentArr 	= fw_akg('content_type/c_post',$value);

			$arrVal['sortby']			= $contentArr['sortby'];
			$arrVal['postincats']		= $contentArr['category'];
            $arrVal['style']			= $contentArr['style'];
            $arrVal['num_post']			= $contentArr['num_post'];
            $arrVal['tieude']			= $contentArr['tieude'];
            $arrVal['lienket']			= $contentArr['lienket'];
            $arrVal['seperator']		= $contentArr['seperator'];
            $arrVal['show_title']		= $contentArr['show_title'];
            $arrVal['show_exper']		= $contentArr['show_exper'];
            $arrVal['show_cats']		= $contentArr['show_cats'];
            $arrVal['show_date']		= $contentArr['show_date'];
            $arrVal['show_author']		= $contentArr['show_author'];
            $arrVal['show_viewer']		= $contentArr['show_viewer'];
            $arrVal['show_comments']	= $contentArr['show_comments'];
            $arrVal['bgcolor']			= $contentArr['bgcolor'];
            $arrVal['headingcolor']		= $contentArr['headingcolor'];
            $arrVal['sepcolor']			= $contentArr['sepcolor'];
            $arrVal['posttitlecolor']	= $contentArr['posttitlecolor'];
            $arrVal['postmetacolor']	= $contentArr['postmetacolor'];
            $arrVal['radius']			= $contentArr['radius'];

		}

		if ( $conType['action_show'] == 'c_static' ){
			$contentArr 	= fw_akg('content_type/c_static',$value);
			$arrVal['content']		= $contentArr['content'];
            $arrVal['tieude']		= $contentArr['tieude'];
            $arrVal['lienket']		= $contentArr['lienket'];
            $arrVal['seperator']	= $contentArr['seperator'];
            $arrVal['bgcolor']		= $contentArr['bgcolor'];
            $arrVal['headingcolor']	= $contentArr['headingcolor'];
            $arrVal['sepcolor']		= $contentArr['sepcolor'];
            $arrVal['radius']		= $contentArr['radius'];
		}
		array_push($res, $arrVal);
	}
	// $chon 	= $opt['action_show'];
	// if ( $chon == 'y' ){
	// 	$res['pos'] 		= fw_akg('y/sidebar_pos',$opt);
	// }
	// $res['chon'] = $chon;
	return $res;
	// return $opt;
}



?>