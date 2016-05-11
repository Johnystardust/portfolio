<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

/*
|-----------------------------------------------------------------------------------------------------------------------
|   Add thumbnails support.
|-----------------------------------------------------------------------------------------------------------------------
*/
add_theme_support( 'post-thumbnails' );

/*
|-----------------------------------------------------------------------------------------------------------------------
|   Enqueue.
|-----------------------------------------------------------------------------------------------------------------------
*/
get_template_part('includes/enqueue');

/*
|-----------------------------------------------------------------------------------------------------------------------
|   Custom Post Types.
|-----------------------------------------------------------------------------------------------------------------------
*/
get_template_part('includes/cpt');

/*
|-----------------------------------------------------------------------------------------------------------------------
|   Register menu.
|-----------------------------------------------------------------------------------------------------------------------
*/
function tvds_register_menu_init() {
    register_nav_menu('main-menu',__( 'Hoofdmenu' ));
}
add_action( 'init', 'tvds_register_menu_init' );
