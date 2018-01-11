<?php 

function debug_to_console( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
    echo $output;
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
?>