<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

/*
|----------------------------------------------------------------
|   Include all the widgets.
|----------------------------------------------------------------
*/
include_once('custom/contact-form-widget.php');
include_once('custom/test-widget/test-widget.php');

/*
|----------------------------------------------------------------
|   Load widget function.
|
|	Register and load the widgets
|----------------------------------------------------------------
*/
function tvds_load_widget() {
    register_widget('tvds_contact_form_widget');
}
add_action( 'widgets_init', 'tvds_load_widget' );


/*
|-----------------------------------------------------------------------------------------------------------------------
|   Widgets.
|-----------------------------------------------------------------------------------------------------------------------
*/
function tvds_add_widgets_init(){
    /*
    |----------------------------------------------------------------
    |   Footer.
    |----------------------------------------------------------------
    */
    register_sidebar(array(
        'name' 			=> __( 'Footer', 'portfolio' ),
        'id' 			=> 'footer',
        'description' 	=> __( 'Footer ruimte', 'portfolio' ),
        'before_widget' => '<div id="%1$s" class="%2$s footer-column col-md-3">',
        'after_widget' 	=> '</div>',
        'before_title' 	=> '<h4 class="title">',
        'after_title' 	=> '</h4>',
    ));
    register_sidebar(array(
        'name' 			=> __( 'Blog', 'portfolio' ),
        'id' 			=> 'blog',
        'description' 	=> __( 'Blog ruimte', 'portfolio' ),
        'before_widget' => '<div id="%1$s" class="%2$s blog-column col-md-3">',
        'after_widget' 	=> '</div>',
        'before_title' 	=> '<h4 class="title">',
        'after_title' 	=> '</h4>',
    ));
}
add_action( 'widgets_init', 'tvds_add_widgets_init' );