<?php
//defined( 'ABSPATH' ) or die( 'Nope! );

/*
Plugin Name: WP Scroll To Bottom & Redirect
Description: Redirects to Home if bottom of the page is is reached.
Version:     1.0
Author:      Stefan Böttcher
Text Domain: dpoakaspine
*/

function WPScrollBottomRedirectEnqueue() {

  wp_register_script('WPScrollBottomRedirectJS', plugins_url('/js/script.js', __FILE__), array('jquery'),'1.1', true);
  wp_register_style( 'WPScrollBottomRedirectCSS', plugins_url('style.css', __FILE__) );

  //make data for js file
  $parameters = array(
  	'home_url' => get_site_url(),
    'plugin_url' => plugins_url()
  );
  wp_localize_script( 'WPScrollBottomRedirectJS', 'parameters', $parameters );

  if(is_single()) {
    wp_enqueue_style('WPScrollBottomRedirectCSS');
	wp_enqueue_style( 'WPScrollBottomRedirectCSS-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
    wp_enqueue_script('WPScrollBottomRedirectJS');
  }

}

add_action( 'wp_enqueue_scripts', 'WPScrollBottomRedirectEnqueue' );
add_action( 'wp_enqueue_style', 'WPScrollBottomRedirectEnqueue' );

add_action('wp_head', 'WPScrollBottomRedirect');

function WPScrollBottomRedirect() {
  if(is_single()) {
    echo "<a href='' id='WPScrollBottomRedirect' class=''><span id='WPScrollBottomRedirectColor'><i class='fa fa-arrow'></i></span></a>";
  }
}
?>
