<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
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
        'before_widget' => '<div id="%1$s" class="%2$s footer-column col-md-3 col-sm-6">',
        'after_widget' 	=> '</div>',
        'before_title' 	=> '<h4 class="title">',
        'after_title' 	=> '</h4>',
    ));
}
add_action( 'widgets_init', 'tvds_add_widgets_init' );