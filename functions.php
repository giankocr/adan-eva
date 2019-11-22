<?php
/**
 * Theme
 * Functions.php
 *
 * ===== NOTES ==================================================================
 *
 * Unlike style.css, the functions.php of a child theme does not override its
 * counterpart from the parent. Instead, it is loaded in addition to the parent's
 * functions.php. (Specifically, it is loaded right before the parent's file.)
 *
 * In that way, the functions.php of a child theme provides a smart, trouble-free
 * method of modifying the functionality of a parent theme.
 *
 * @author Alfredo Navas <elpuas@gmail.com>
 * @package adan-eva
 * =============================================================================== */

/**
 * Add parent styles
 *
 * @author Alfredo Navas <elpuas@gmail.com>
 */
function hs_enqueue_scripts() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'hs_enqueue_scripts' );

/**
 * Add custom styles
 *
 * * @author Alfredo Navas <elpuas@gmail.com>
 */
function hs_scripts() {
	$script_filemtime = get_stylesheet_directory() . '/custom.min.js';
	wp_enqueue_style( 'kb-main', get_stylesheet_directory_uri() . '/main.min.css', filemtime( $script_filemtime ), true, 'all' );
	wp_enqueue_script( 'kb--custom-script', get_stylesheet_directory_uri() . '/custom.min.js', array(), filemtime( $script_filemtime ), true );
}
add_action( 'wp_enqueue_scripts', 'hs_scripts' );


/**
 * Add custom validation message
 *
 * @author Giancarlos Villalobos <gian@gianko.com>
 */
add_filter("gform_validation_message", "gwp_change_message", 10, 2);
function gwp_change_message($message, $form){
return '
<div class="validation_error">*La información registrada no corresponde a una </br> entrada válidad.<b>Por favor, intentalo de nuevo.</b></div>
';
}


/**
 * Add custom validation message
 *
 * @author Giancarlos Villalobos <gian@gianko.com>
 */
// add_action( 'gform_after_submission', 'trigger_action', 10, 2 );
// function trigger_action( $entry, $form ) {
		
//         $file_path = get_stylesheet_directory() . '/codes_ubereats.txt';
//         $contents = file_get_contents($file_path);
//         $first_line = file($file_path)[0];
//         $line_lenght =  strlen($first_line);
//         file_put_contents($file_path, substr($contents, $line_lenght));

//         echo   "<p>{$$first_line}</p>";
// }



