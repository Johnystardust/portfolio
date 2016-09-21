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



/*
|-----------------------------------------------------------------------------------------------------------------------
|  Create the custom post type.
|-----------------------------------------------------------------------------------------------------------------------
*/
add_action( 'init', 'create_events_post_type' );
function create_events_post_type() {
    $labels = array(
        'name'               => 'Events',
        'singular_name'      => 'Event',
        'add_new'            => 'Nieuw Event',
        'add_new_item'       => 'Nieuw Event',
        'edit_item'          => 'Bewerk Event',
        'new_item'           => 'Nieuw Event',
        'all_items'          => 'Alle Events',
        'view_item'          => 'Bekijk Event',
        'search_items'       => 'Zoek Events',
        'not_found'          => 'Geen Events gevonden',
        'not_found_in_trash' => 'Geen Events gevonden in de prullenbak',
        'parent_item_colon'  => '',
        'menu_name'          => 'Events'
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'menu_position'         => 20,
        'supports'              => array('title', 'excerpt', 'thumbnail'),
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-portfolio',
        'taxonomies'            => array('category')
    );
    register_post_type('events', $args);
}

/*
|-----------------------------------------------------------------------------------------------------------------------
|  Add The Meta Boxes to the 'events' custom post type.
|-----------------------------------------------------------------------------------------------------------------------
*/
add_action( 'add_meta_boxes', 'add_events_metaboxes');
function add_events_metaboxes() {
    // 1. ID, 2. Title, 3. CallBack function, 4. Custom Post Type, 5. Position, 6. Priority
    add_meta_box('events_meta_id', 'Events', 'events_meta_callback', 'events', 'normal', 'default');
}

/*
|-----------------------------------------------------------------------------------------------------------------------
|  Callback for the 'events_meta_id' meta box.
|-----------------------------------------------------------------------------------------------------------------------
*/
function events_meta_callback(){
    global $post;

    // De Nonce voor de controle
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    // Get the location data if its already been entered
    $address    = get_post_meta($post->ID, 'address', true);
    $location   = get_post_meta($post->ID, 'location', true);

    // Echo out the fields
    echo '<label for="address">Address</label>';
    echo '<input type="text" id="adres" name="address" value="'.$address.'" class="widefat" />';

    echo '<label for="location">Locatie</label>';
    echo '<input type="text" id="location" name="location" value="'.$location.'" class="widefat" />';
}

/*
|-----------------------------------------------------------------------------------------------------------------------
|  Save the meta boxes.
|-----------------------------------------------------------------------------------------------------------------------
*/
function save_events_meta($post_id, $post) {
    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |  Dit zorgt ervoor dat alle gecontroleerd word en dat de gebruiker deze wijzigingen kan maken.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |  Alles is gecontrolleerd. We maken van alle data een array zodat we er gemakkelijker doorheen kunnen gaan.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    $events_meta['address']     = $_POST['location'];
    $events_meta['location']    = $_POST['location'];

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |  Hier wordt de data opgeslagen in de database.
    |
    |  Met de 'foreach' worden alle velden die in de '$events_meta' array zitten opgeslagen.
    |  Eerst word er gekeken of de post een revision is, je wilt de data niet 2 keer opslaan.
    |
    |  Als het meta een array is maak er een CSV van (onwaarschijnlijk, failsafe principe).
    |
    |  Daarna word er gekeken of het veld al een waarde heeft. Wanneer het veld een waarde heeft vervang de waarde.
    |  Als het veld geen waarde heeft sla het gewoon op.
    |
    |  Als het veld geen waarde heeft verwijder de meta data uit de database
    |-----------------------------------------------------------------------------------------------------------------------
    */
    foreach ($events_meta as $key => $value) {
        if( $post->post_type == 'revision' ) return;

        $value = implode(',', (array)$value);

        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }

        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'save_events_meta', 1, 2); // save the custom fields