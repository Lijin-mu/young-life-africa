<?php
# Custom non-hierarchical taxonomy (like tags)
register_taxonomy(
  'crb_countries', # Taxonomy name
  array( 'crb_story' ), # Post Types
  array( # Arguments
    'labels'            => array(
      'name'                       => __( 'Countries', 'crb' ),
      'singular_name'              => __( 'Country', 'crb' ),
      'search_items'               => __( 'Search Countries', 'crb' ),
      'popular_items'              => __( 'Popular Countries', 'crb' ),
      'all_items'                  => __( 'All Countries', 'crb' ),
      'view_item'                  => __( 'View Country', 'crb' ),
      'edit_item'                  => __( 'Edit Country', 'crb' ),
      'update_item'                => __( 'Update Country', 'crb' ),
      'add_new_item'               => __( 'Add New Country', 'crb' ),
      'new_item_name'              => __( 'New Country Name', 'crb' ),
      'separate_items_with_commas' => __( 'Separate Countries with commas', 'crb' ),
      'add_or_remove_items'        => __( 'Add or remove Countries', 'crb' ),
      'choose_from_most_used'      => __( 'Choose from the most used Countries', 'crb' ),
      'not_found'                  => __( 'No Countries found.', 'crb' ),
      'menu_name'                  => __( 'Countries', 'crb' ),
    ),
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'country' ),
  )
);

register_taxonomy(
  'crb_staff_countries', # Taxonomy name
  array( 'crb_staff' ), # Post Types
  array( # Arguments
    'labels'            => array(
      'name'                       => __( 'Countries', 'crb' ),
      'singular_name'              => __( 'Country', 'crb' ),
      'search_items'               => __( 'Search Countries', 'crb' ),
      'popular_items'              => __( 'Popular Countries', 'crb' ),
      'all_items'                  => __( 'All Countries', 'crb' ),
      'view_item'                  => __( 'View Country', 'crb' ),
      'edit_item'                  => __( 'Edit Country', 'crb' ),
      'update_item'                => __( 'Update Country', 'crb' ),
      'add_new_item'               => __( 'Add New Country', 'crb' ),
      'new_item_name'              => __( 'New Country Name', 'crb' ),
      'separate_items_with_commas' => __( 'Separate Countries with commas', 'crb' ),
      'add_or_remove_items'        => __( 'Add or remove Countries', 'crb' ),
      'choose_from_most_used'      => __( 'Choose from the most used Countries', 'crb' ),
      'not_found'                  => __( 'No Countries found.', 'crb' ),
      'menu_name'                  => __( 'Countries', 'crb' ),
    ),
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'country' ),
  )
);
