<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

add_action( 'init', 'create_work_post_type' );
function create_work_post_type() {
    $labels = array(
        'name'               => 'Projecten',
        'singular_name'      => 'Project',
        'add_new'            => 'Nieuw Project',
        'add_new_item'       => 'Nieuw Project',
        'edit_item'          => 'Bewerk Project',
        'new_item'           => 'Nieuw Project',
        'all_items'          => 'Alle Projecten',
        'view_item'          => 'Bekijk Project',
        'search_items'       => 'Zoek Projecten',
        'not_found'          => 'Geen Projecten gevonden',
        'not_found_in_trash' => 'Geen Projecten gevonden in de prullenbak',
        'parent_item_colon'  => '',
        'menu_name'          => 'Projecten'
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'menu_position'         => 20,
        'supports'              => array('title', 'thumbnail'),
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-portfolio',
        'taxonomies'            => array('category')
    );
    register_post_type('projecten', $args);
}