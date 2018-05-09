<?php
/**
 * CongGiao functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CongGiao
 */

if (defined('FW')):
    // the framework was already included in another place, so this version will be inactive/ignored
else:
    require dirname(__FILE__) .'/framework/bootstrap.php';
endif;

require_once(dirname(__FILE__) . '/inc/tgma.php');

if (!isset($content_width))
{
    $content_width = 900;
}

add_action('after_setup_theme', function () {

    require __DIR__ . '/update-checker/plugin-update-checker.php';
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/WeAreUnique/CongGiaoWordpressTheme',
        __FILE__,
        'conggiao'
    );
    $myUpdateChecker->setAuthentication('235fda6d987bf5e7fca678437d61340160b21bda');
    $myUpdateChecker->setBranch('master');

    require_once __DIR__ . '/inc/common/enqueue.php';
    require_once __DIR__ . '/inc/common/sidebar.php';
    require_once __DIR__ . '/inc/common/nav.php';
    require_once __DIR__ . '/inc/common/ultilities.php';
    require_once __DIR__ . '/inc/common/comment_walker.php';

    require_once __DIR__ . '/inc/widget/widget_text.php';

    require_once __DIR__ . '/framework-customizations/theme/options/general-helper.php';
    require_once __DIR__ . '/framework-customizations/theme/options/homepage-helper.php';
    require_once __DIR__ . '/framework-customizations/theme/options/archives-helper.php';
    require_once __DIR__ . '/framework-customizations/theme/options/single-helper.php';
    require_once __DIR__ . '/framework-customizations/theme/options/page-helper.php';
    require_once __DIR__ . '/framework-customizations/theme/options/notifications-helper.php';
    require_once __DIR__ . '/inc/common/wpqueries.php';

}, 3);


?>
