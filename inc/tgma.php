<?php
require_once get_template_directory() . '/inc/tgma-class.php';
add_action('tgmpa_register', 'toilatung_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function toilatung_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name' => 'WP PageNavi',
            'slug' => 'wp-pagenavi',
            'required' => true,
        ),
        array(
            'name' => 'WP PostViews',
            'slug' => 'wp-postviews',
            'required' => true,
        ),
        array(
            'name' => 'Elementor',
            'slug' => 'elementor',
            'required' => false,
        ),
        array(
            'name' => 'Yoast SEO',
            'slug' => 'wordpress-seo',
            'required' => false,
        ),
        array(
            'name' => 'Monarch Plugin',
            'slug' => 'monarch',
            'version' => '1.4.5',
            'source' => get_template_directory() . '/inc/tgma-libs/monarch.zip', // The plugin source.
            'required' => false,
        ),
        array(
            'name' => 'Bloom',
            'slug' => 'monarch',
            'version' => '1.3.4',
            'source' => get_template_directory() . '/inc/tgma-libs/bloom.zip', // The plugin source.
            'required' => false,
        ),
        array(
            'name' => 'WP Tab Widget Pro',
            'slug' => 'wp-tab-widget-pro',
            'version' => '1.0.7',
            'source' => get_template_directory() . '/inc/tgma-libs/wp-tab-widget-pro.zip', // The plugin source.
            'required' => false,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'conggiao', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php', // Parent menu slug.
        'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}
