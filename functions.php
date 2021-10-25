<?php

// theme supports
// =========================================
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

// excerpt length
// =========================================
function new_excerpt_length() {
  return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

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

// this taxonomy includes:
  // * NZCF Updates
  // * TV Appearances
  // * Positive Stories
  // * Cat News in NZ
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

// this taxonomy includes:
  // * Article
  // * Video
// is for a more general tagging purpose
function create_newstag_taxonomy() {
  $labels = array(
    'name' => 'Tags',
    'singular_name' => 'Tag',
    'search_items' => 'Search Tags',
    'all_items' => 'All Tags',
    'parent_item' => 'Parent Tag',
    'parent_item_colon' => 'Parent Tag:',
    'edit_item' => 'Edit Tag',
    'update_item' => 'Update Tag',
    'add_new_item' => 'Add new Tag',
    'new_item_name' => 'New Tag',
    'menu_name' => 'Tag'
  );

  register_taxonomy(
    'tags',
    array('news-posts'),
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true
    )
  );
}

add_action('init', 'create_newstag_taxonomy', 0);

// making frontpage content editable
// =========================================

function fp_content_customize($wp_customize) {
  $wp_customize->add_section('fp_section', array(
    'title' => 'NZCF Landing Content', 'custom_setting',
    'priority' => 0
  ));
  //
  // // Title
  // // ========
  $wp_customize->add_setting('nzcf_title', array(
    'default' => 'New Zealand Cat Foundation'
  ));

  $wp_customize->add_control('nzcf_title', array(
    'label' => 'Enter page Title',
    'section' => 'fp_section',
    'settings' => 'nzcf_title',
    'type' => 'text'
  ));
  //
  // // Tagline
  // // ========
  $wp_customize->add_setting('nzcf_tagline', array(
    'default' => 'Helping the Helpless'
  ));

  $wp_customize->add_control('nzcf_tagline', array(
    'label' => 'Enter tagline',
    'section' => 'fp_section',
    'settings' => 'nzcf_tagline',
    'type' => 'text'
  ));
  //
  // // Intro txt title
  // // ========
  $wp_customize->add_setting('intro_title', array(
    'default' => 'You make a Difference'
  ));

  $wp_customize->add_control('intro_title', array(
    'label' => 'Enter introductory section Title',
    'section' => 'fp_section',
    'settings' => 'intro_title',
    'type' => 'text'
  ));

  //   // Intro txt content
  //   // ========
    $wp_customize->add_setting('intro_content', array(
      'default' => 'There are so many abandoned and       unwanted cats and kittens in our Auckland communities. Our aim is to de-sex, vaccinate, and microchip every stray cat in the hope that one day each of them will have a loving home.
                <br><br>

      We are committed to educating the community, particularly New Zealand youth. Education of our new generation is paramount, teaching our young people to embrace their responsibility to care for their cats. Our stance is that we do not have a "cat problem"; we have a "people problem".
                <br><br>

      We offer a sanctuary to unwanted stray cats in a protected environment where all their needs are met in an indoor/outdoor environment.'
    ));

    $wp_customize->add_control('intro_content', array(
      'label' => 'Enter introductory section content',
      'section' => 'fp_section',
      'settings' => 'intro_content',
      'type' => 'textarea'
  ));
} //end funct

add_action('customize_register', 'fp_content_customize');

?>
