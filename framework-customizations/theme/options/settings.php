<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$options = array(
	fw()->theme->get_options( 'tab-notifications' ),
	fw()->theme->get_options( 'tab-general' ),
	fw()->theme->get_options( 'tab-homepage' ),
	fw()->theme->get_options( 'tab-archives' ),
	fw()->theme->get_options( 'tab-single' ),
	fw()->theme->get_options( 'tab-page' ),

);


?>