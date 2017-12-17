<?php

function enqueue_style_script(){
	// wp_enqueue_style( $handle, $src = '', $deps = array(), $ver = false, $media = 'all' )
	// wp_enqueue_script( $handle, $src = '', $deps = array(), $ver = false, $in_footer = false )
	
	wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css' );
	// wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/website-scripts.js', array( 'owl-carousel', 'jquery' ), '1.0', true );
}
add_action('wp_enqueue_scripts', 'enqueue_style_script');




?>