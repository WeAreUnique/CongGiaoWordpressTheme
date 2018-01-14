<?php 

function cg_gen_get_archives_default($setName){
	$res = array();

	$opt = conggiao_get_option_setting($setName);
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