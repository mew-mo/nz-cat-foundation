<?php

// theme supports
// =========================================
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

// importing stylesheet
// =========================================
function import_stylesheet() {
  wp_enqueue_style('custom-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'import_stylesheet');

// setting up / registering main nav
// =========================================
register_nav_menus(['primary' => 'Primary Top Navigation']);

// setting up news posttype
// =========================================

function create_news_post() {
  $args = array(
    'labels' => array(
      'name' => 'News Posts',
      'singular_name' => 'News Post'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-welcome-add-page',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu-position' => 25
  );
  register_post_type('news-posts', $args);
}

add_action('init', 'create_news_post');

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

// setting up news post taxonomies
// =========================================
function create_news_taxonomy() {
  $labels = array(
    'name' => 'News Types',
    'singular_name' => 'News Type',
    'search_items' => 'Search News Types',
    'all_items' => 'All News Types',
    'parent_item' => 'Parent News Type',
    'parent_item_colon' => 'Parent News Type:',
    'edit_item' => 'Edit News Type',
    'update_item' => 'Update News Type',
    'add_new_item' => 'Add new News Type',
    'new_item_name' => 'New News Type Name',
    'menu_name' => 'News Type'
  );

  register_taxonomy(
    'news-type',
    array('news-posts'),
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true
    )
  );
}

add_action('init', 'create_news_taxonomy', 0);

?>
