<?php

function bw_register_cpts_reviews()
{
    /**
     * Post Type: Reviews.
     */
    $labels = array(
        'name' => __('Reviews', 'brainworks'),
        'singular_name' => __('Review', 'brainworks'),
    );

    $args = array(
        'label' => __('Reviews', 'brainworks'),
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'delete_with_user' => false,
        'show_in_rest' => false,
        'rest_base' => 'reviews',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'has_archive' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'reviews', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('reviews', $args);

    /**
     * Post Type: Packages.
     */
    $labels = array(
        'name' => __('Packages', 'brainworks'),
        'singular_name' => __('Package', 'brainworks'),
    );

    $args = array(
        'label' => __('Packages', 'brainworks'),
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'delete_with_user' => false,
        'show_in_rest' => false,
        'rest_base' => 'packages',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'has_archive' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'packages', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'custom-fields'),
    );

    register_post_type('packages', $args);
}

add_action('init', 'bw_register_cpts_reviews');
