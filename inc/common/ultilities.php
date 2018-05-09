<?php 

function debug_to_console( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
    echo $output;
}

function vn_to_str($str) {

    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str);

    return $str;
}

add_action('fw_backend_add_custom_settings_menu', '_action_theme_custom_fw_settings_menu');
function _action_theme_custom_fw_settings_menu($data) {
    add_menu_page(
        __( 'Thiết Lập Giao Diện', 'conggiao' ),
        __( 'Thiết Lập Giao Diện', 'conggiao' ),
        $data['capability'],
        $data['slug'],
        $data['content_callback']
    );
}

function _add_class( $htmlString = '', $newClass ) {

    $pattern = '/class="([^"]*)"/';

    // Class attribute set.
    if ( preg_match( $pattern, $htmlString, $matches ) ) {
        $definedClasses = explode( ' ', $matches[1] );
        if ( ! in_array( $newClass, $definedClasses ) ) {
            $definedClasses[] = $newClass;
            $htmlString = str_replace(
                $matches[0],
                sprintf( 'class="%s"', implode( ' ', $definedClasses ) ),
                $htmlString
            );
        }
    // Class attribute not set.
    } else {
        $htmlString = preg_replace( '/(\<.+\s)/', sprintf( '$1class="%s" ', $newClass ), $htmlString );
    }

    return $htmlString;
}

function _filter_theme_the_content($content) {
    if (is_feed()) {
        return $content;
    }
    if(function_exists('is_amp_endpoint')){
        if (is_amp_endpoint()) {
            return $content;
        }
    }
    if (strlen($content)) {
        $respReplace = 'data-sizes="auto" data-srcset=';
        $matches = array();
        $skip_images_regex = '/class=".*lazyload.*"/';
        $placeholder_image = apply_filters( 'lazysizes_placeholder_image',
            'data:image/jpeg;base64,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' );
        preg_match_all( '/<img\s+.*?>/', $content, $matches );

        $search = array();
        $replace = array();

        foreach ( $matches[0] as $imgHTML ) {

            // Don't to the replacement if a skip class is provided and the image has the class.
            if ( ! ( preg_match( $skip_images_regex, $imgHTML ) ) ) {

                $replaceHTML = preg_replace( '/<img(.*?)src=/i',
                    '<img$1src="' . $placeholder_image . '" data-src=', $imgHTML );

                $replaceHTML = preg_replace( '/srcset=/i', $respReplace, $replaceHTML );

                $replaceHTML = _add_class( $replaceHTML, 'lazyload' );

                $replaceHTML .= '<noscript>' . $imgHTML . '</noscript>';

                array_push( $search, $imgHTML );
                array_push( $replace, $replaceHTML );
            }
        }

        $content = str_replace( $search, $replace, $content );

        return $content;
    } 
    else {
        // Otherwise, carry on
        return $content;
    }
}
add_filter('the_content', '_filter_theme_the_content');

/* THEME SUPPORT */

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 960, '', true); // Large Thumbnail
    add_image_size('medium', 690, '', true); // Medium Thumbnail
    add_image_size('small', 320, '', true); // Small Thumbnail

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    add_theme_support( 'post-formats', array( 'image', 'quote', 'video', 'gallery') );

    // Localisation Support
    load_theme_textdomain('conggiao', get_template_directory() . '/languages');
}


function remove_menus(){   
    remove_menu_page( 'fw-extensions' );    //Pages  
}
add_action( 'admin_menu', 'remove_menus',999 );  //Remove menu

remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_oembed_add_discovery_links' ); // Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_host_js' ); // Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action('rest_api_init', 'wp_oembed_register_route' ); // Remove the REST API endpoint.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10 ); // Don't filter oEmbed results.
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('embed_oembed_discover', '__return_false' ); // Turn off oEmbed auto discovery.
add_filter( 'get_the_excerpt', 'filter_get_the_excerpt_data' );

function filter_get_the_excerpt_data( $excerpt ) {
    $excerpt = wp_trim_excerpt($excerpt);
    return str_replace( "&nbsp","", $excerpt );
}


function conggiao_get_option_setting($k, $v = '', $m = 'theme-settings') {
    if (defined('FW')) {
        switch ($m) {
            case 'theme-settings':
                $v = fw_get_db_settings_option($k);
                break;

            default:
                $v = '';
                break;
        }
    }
    return $v;
}

function conggiao_seekKey($haystack, $needle) {
    foreach ($haystack as $key => $value) {
        if ($key == $needle) {
            return $value;
        } elseif (is_array($value)) {
            return bbland_seekKey($value, $needle);
        }
    }
}

function isBetweenDates($dateToCheck, $start_date, $end_date)
{
  $start = strtotime($start_date);
  $end = strtotime($end_date);
  $date = strtotime($dateToCheck);

  // Check that user date is between start & end
  return (($date > $start) && ($date < $end));
}

function printArr($arr,$label=''){
    if( WP_DEBUG === true ){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        if($label != '')
            echo '<strong>'.$label.'</strong>';
        echo '<p style="height: 10px;"></p>';
    }
}

add_action('admin_head', 'custom_admin_style_editor');

function custom_admin_style_editor() {
    $sep_style_1 = get_template_directory_uri() .'/assets/images/layouts/header_sep_style1.png';
    $sep_style_2 = get_template_directory_uri() .'/assets/images/layouts/header_sep_style2.png';
    $sep_style_3 = get_template_directory_uri() .'/assets/images/layouts/header_sep_style3.png';
    $sep_style_4 = get_template_directory_uri() .'/assets/images/layouts/header_sep_style4.png';
  echo '<style>
    .widget-sep-style input{
        margin:0;padding:0;
        -webkit-appearance:none;
           -moz-appearance:none;
                appearance:none;
    }

    .widget-sep-style input:active +.sep-style{opacity: .9;}
    .widget-sep-style input:checked +.sep-style{
        -webkit-filter: none;
           -moz-filter: none;
                filter: none;
    }
    .sep-style{
        cursor:pointer;
        background-size:contain;
        background-repeat:no-repeat;
        display:inline-block;
        width:300px;
        height:35px;
        -webkit-transition: all 100ms ease-in;
           -moz-transition: all 100ms ease-in;
                transition: all 100ms ease-in;
        -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
           -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
                filter: brightness(1.8) grayscale(1) opacity(.7);
    }
    .sep-style:hover{
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
           -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
                filter: brightness(1.2) grayscale(.5) opacity(.9);
    }
    .widget-sep-style .sep-style-1{
        background-image: url('.$sep_style_1.');
        width: 300px;
        height: 40px;
    }
    .widget-sep-style .sep-style-2{
        background-image: url('.$sep_style_2.');
        width: 300px;
        height: 40px;
    }
    .widget-sep-style .sep-style-3{
        background-image: url('.$sep_style_3.');
        width: 300px;
        height: 40px;
    }
    .widget-sep-style .sep-style-4{
        background-image: url('.$sep_style_4.');
        width: 300px;
        height: 40px;
    }
  </style>';
}


function conggiao_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'conggiao_custom_excerpt_length', 999 );
?>