<?php

// importing stylesheet
// =========================================
function import_stylesheet() {
  wp_enqueue_style('custom-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'import_stylesheet');

// setting up / registering main nav
// =========================================
register_nav_menus(['primary' => 'Primary Top Navigation']);

// setting up shortcut posttype
// =========================================
function create_fp_shortcuts() {
  $args = array(
    'labels' => array(
      'name' => 'Shortcuts',
      'singular_name' => 'Shortcut'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-star-filled',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu-position' => 25
  );
  register_post_type('shortcuts', $args);
}

add_action('init', 'create_fp_shortcuts');

// setting up purr stories posttype
// =========================================
function create_purr_stories() {
  $args = array(
    'labels' => array(
      'name' => 'Purr Stories',
      'singular_name' => 'Purr Story'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-pets',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu-position' => 25
  );
  register_post_type('purr-stories', $args);
}

add_action('init', 'create_purr_stories');

?>
