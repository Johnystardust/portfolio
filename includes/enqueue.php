<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

/*
|-----------------------------------------------------------------------------------------------------------------------
|   Add the scripts.
|-----------------------------------------------------------------------------------------------------------------------
*/
add_action('wp_enqueue_scripts', 'add_my_custom_scripts');
function add_my_custom_scripts(){
    // de-register stock jquery
    wp_deregister_script( 'jquery' );

    // register scripts
    wp_register_script('my-jquery', get_stylesheet_directory_uri().'/assets/jquery/jquery-1.12.1.min.js');
    wp_register_script('nicescroll-js', get_stylesheet_directory_uri().'/assets/jquery/jquery.nicescroll.min.js');
    wp_register_script('waypoints-js', get_stylesheet_directory_uri().'/assets/waypoints/lib/jquery.waypoints.min.js');
    wp_register_script('my-javascript', get_stylesheet_directory_uri().'/assets/javascript/javascript.js');
    wp_register_script('my-slider', get_stylesheet_directory_uri().'/assets/javascript/slider.js');
    wp_register_script('my-waypoints', get_stylesheet_directory_uri().'/assets/javascript/waypoints.js');

    // enqueue scripts
    wp_enqueue_script('my-jquery', '', '', '', true);
    wp_enqueue_script('nicescroll-js', '', '', '', true);
    wp_enqueue_script('waypoints-js', '', '', '', true);
    wp_enqueue_script('my-javascript', '', '', '', true);
    wp_enqueue_script('my-slider', '', '', '', true);
    wp_enqueue_script('my-waypoints', '', '', '', true);
}

/*
|-----------------------------------------------------------------------------------------------------------------------
|   Add the stylesheets.
|-----------------------------------------------------------------------------------------------------------------------
*/
add_action('wp_enqueue_scripts', 'add_my_custom_styles');
function add_my_custom_styles(){
    // register styles
    wp_register_style('bootstrap', get_stylesheet_directory_uri().'/assets/bootstrap/css/bootstrap.css');
    wp_register_style('stylesheet', get_stylesheet_directory_uri().'/assets/stylesheet/style.css');
    wp_register_style('fontello', get_stylesheet_directory_uri().'/assets/fontello/fontello-embedded.css');
    wp_register_style('animate', get_stylesheet_directory_uri().'/assets/animate/animate.css');

    // enqueue styles
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('stylesheet');
    wp_enqueue_style('fontello');
    wp_enqueue_style('animate');
}