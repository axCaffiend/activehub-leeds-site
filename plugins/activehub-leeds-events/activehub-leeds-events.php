<?php
/**
* Plugin Name: ActiveHub Leeds Events Plugin
* Plugin URI: https://www.yourwebsiteurl.com/
* Description: Plugin that adds events as custom post types.
* Version: 1.0
* Author: Anna Fulcher
* Author URI: http://yourwebsiteurl.com/
**/


// ----- Adapted from tutorial -------

// Our custom post type function
Function my_events_create_posttype() {
    register_post_type( 'events',
    // CPT Options
    array(
    'labels' => array(
    'name' => __( 'Events' ),
    'singular_name' => __( 'Event' )
    ),
    'public' => true,
    'publicly_queryable' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'events'),
    'show_in_rest' => true,
    )
    );
   }
// Hooking up our function to theme setup
add_action( 'init', 'my_events_create_posttype' );

//hook into the init action and call taxonomy function when it fires
add_action( 'init', 'create_eventtypes_taxonomy', 0 );

function create_eventtypes_taxonomy() {
    // Taxonomy labels
     $labels = array(
     'name' => _x( 'Event Types', 'taxonomy general name' ),
     'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
     'search_items' => __( 'Search Types' ),
     'popular_items' => __( 'Popular Types' ),
     'all_items' => __( 'All Types' ),
     'parent_item' => null,
     'parent_item_colon' => null,
     'edit_item' => __( 'Edit Type' ),
     'update_item' => __( 'Update Type' ),
     'add_new_item' => __( 'Add New Event Type' ),
     'new_item_name' => __( 'New Type Name' ),
     'separate_items_with_commas' => __( 'Separate event types with commas' ),
     'add_or_remove_items' => __( 'Add or remove event types' ),
     'choose_from_most_used' => __( 'Choose from the most used event types' ),
     'menu_name' => __( 'Types' ),
     );

     // Now register the taxonomy for custom type Events
    register_taxonomy('types','events',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'eventtype' )
    ));
}

add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('event_tags','events',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'meta_box_cb' => false,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event_tag' ),
  ));
}
