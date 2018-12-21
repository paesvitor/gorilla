<?php
/*
* Post Types
*/
function create_post_types() {
    register_post_type( 'slider',
        array(
          'labels'        => array(
              'name'          => __( 'Slider' ),
              'singular_name' => __( 'Slider' )
              ),
          'public'        => true,
          'has_archive'   => false,
          'hierarchical'  => false,
          'exclude_from_search' => true,
          'capability_type' => 'post',
          'publicly_queryable' => true,
          'rewrite'       => array('slug' => 'slider'),
          'menu_icon'     => 'dashicons-cart',
          'supports'      => array( 'title', 'page-attributes', 'revisions' ),
          )
        );

    flush_rewrite_rules();
}
add_action( 'init', 'create_post_types' );

function create_taxonomy() {
    register_taxonomy( 'tipo-de-produto', 'produto', array(
        'label'        => __( 'Tipos de produto', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'tipo-de-produto' ),
        'hierarchical' => true,
        ) );
}
//add_action( 'init', 'create_taxonomy', 0 );