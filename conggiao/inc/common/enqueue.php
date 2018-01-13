<?php

function enqueue_style_script(){
	// wp_enqueue_style( $handle, $src = '', $deps = array(), $ver = false, $media = 'all' )
	// wp_enqueue_script( $handle, $src = '', $deps = array(), $ver = false, $in_footer = false )
	
	//CSS
	if (defined('WP_DEBUG') && false === WP_DEBUG) {
		wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css' );
	}
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'bxslidercss', get_template_directory_uri() . '/assets/css/jquery.bxslider.min.css' );
	// wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
	// wp_enqueue_style( 'Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;subset=vietnamese');

	//JS
	wp_deregister_script('jquery');
	
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, true );
	wp_enqueue_script( 'lazysite', get_stylesheet_directory_uri() . '/assets/js/lazysizes.min.js', array(), '4.0.1', true );
	// wp_enqueue_script( 'bgset', get_stylesheet_directory_uri() . '/assets/js/ls.bgset.min.js', array('jquery'), '4.0.1', true );
	wp_enqueue_script( 'fa5', 'https://use.fontawesome.com/releases/v5.0.3/js/all.js', array(), '5.0.3', true );
	wp_enqueue_script( 'bxsliderjs', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.js', array('jquery'), '4.2.12', true );
	wp_enqueue_script( 'conggiao', get_stylesheet_directory_uri() . '/assets/js/conggiao.js', array('jquery', 'bxsliderjs'), '1.0', true );
	

}
add_action('wp_enqueue_scripts', 'enqueue_style_script', 10);

?>