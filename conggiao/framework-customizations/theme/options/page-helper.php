<?php 

function cg_gen_get_page_appearance(){
	$res = array();

	$opt = conggiao_get_option_setting('page_default');
	$sidebar = $opt['sidebar'];
	if ( $sidebar['action_show'] == 'n' ){
		$opt['sidebar'] = 'n';
	} else {
		$opt['sidebar'] = 'y';
		$opt['sidebarpost'] = $sidebar['y']['sidebar_pos'];
	}

	return $opt;
}

?>