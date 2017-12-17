<?php if (!defined('FW')) die('Forbidden');

$manifest = array();

$manifest['name']         = __('Công Giáo Wordpress Theme', 'fw');
$manifest['uri']          = 'https://bbland.net';
$manifest['description']  = __('Cong Giao Wordpress Theme', 'fw');
$manifest['version']      = '1.0';
$manifest['author']       = 'ToiLaTung';
$manifest['author_uri']   = 'https://bbland.net';

/**
 * @type bool Display on the Extensions page or it's a hidden extension
 */
$manifest['display'] = false;
/**
 * @type bool If extension can exist alone
 * false - There is no sense for it to exist alone, it exists only when is required by some other extension.
 * true  - Can exist alone without bothering about other extensions.
 */
$manifest['standalone'] = false;
/**
 * @type string Thumbnail used on the Extensions page
 * All framework extensions has thumbnails set in the available extensions list
 * but if your extension is not in that list and id located in the theme, you can set the thumbnail via this parameter
 */
$manifest['thumbnail'] = null;