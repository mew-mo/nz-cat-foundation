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

// setting up shortcut metabox for linking to a specific page
// =========================================

function add_shortcut_link_box() {
  add_meta_box(
    'shortcut_link_metabox',
    'Link Shortcut to a Page',
    'shortcut_link_box_callback',
    'shortcuts',
    'right'
  );
}

function shortcut_link_box_callback($post) {

  // // Saving Linked Page Data
  // // ========
  $link_data = get_post_meta($post->ID, 'page_dropdown', true);

  if ($link_data) {
    echo 'The current page this shortcut is linked to is <b> ' . $link_data . '</b><br><br>';
  } else {
    echo 'This shortcut isn\'t currently linked to a page. Please select below.<br><br>';
  }

  // // Creating Dropdown
  // // ========
  $dropdown_args = array(
    'post_type' => 'page',
    'name' => 'page_dropdown',
    'sort_column' => 'menu_order, post_title',
    'echo' => true,
    'show_option_none' => 'Select a page',
    'class' => 'page_dropdown',
    'value_field' => 'post_name',
    // post_name gets the slug. post_title would get the actual text/title
    'id' => 'page_dropdown',
    'selected' => $link_data
  );

  wp_dropdown_pages($dropdown_args);
}

add_action('admin_menu', 'add_shortcut_link_box');

function save_shortcut_link($post_id, $post) {

  $post_type = get_post_type_object($post->post_type);
  if (! current_user_can($post_type->cap->edit_post, $post_id)) {
    return $post_id;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  if ($post->post_type != 'shortcuts') {
    return $post_id;
  }

  if (isset($_POST['page_dropdown'])) {
    update_post_meta($post_id, 'page_dropdown', sanitize_text_field($_POST['page_dropdown']));
  } else {
    delete_post_meta($post_id, 'page_dropdown');
  }

  return $post_id;
  // return it as original if no conditions are met
}

add_action('save_post', 'save_shortcut_link', 10, 2);

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

// making navbar content editable - nav section
// =========================================

function nav_content_customize($wp_customize) {
  $wp_customize->add_section('nav_section', array(
    'title' => 'Navbar Content', 'custom_setting',
    'priority' => 0
  ));

  // // Logo Image
  // // ========

  $wp_customize->add_setting('custom_logo', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
    'label' => 'Upload a logo image',
    'section' => 'nav_section',
    'settings' => 'custom_logo',
    'priority' => 0
  )));

  // // Turn hover paws on or off
  // // ========

  $wp_customize->add_setting('paws_hover', array(
    'default' => ''
  ));

  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'paws_hover', array(
    'label' => 'Paws on Link Hover',
    'description' => 'Turn paws on or off',
    'settings' => 'paws_hover',
    'priority' => 10,
    'section' => 'nav_section',
    'type' => 'select',
    'choices' => array(
      '1' => 'On',
      '0' => 'Off'
    )
  )));

  // // Link hover colour
  // // ========
  $wp_customize->add_setting('navlink_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'navlink_colorpicker', array(
      'label' => 'Nav Link Hover Colour',
      'section' => 'nav_section',
      'settings' => 'navlink_colorpicker',
      'priority' => 50
    )
  ));

} //end funct

add_action('customize_register', 'nav_content_customize');

function nav_css() {
  $hover_paws = get_theme_mod('paws_hover');
  $navlink_hover_color = get_theme_mod('navlink_colorpicker');
  ?>
  <style type="text/css">
    .nav-paw,
    .menu-item:hover .nav-paw {
      opacity: <?php echo $hover_paws ?>;
    }

    .menu-item .nav-link:hover:not(.menu-item-18 .nav-link:hover) {
      color: <?php echo $navlink_hover_color ?>;
    }

  </style>
  <?php
}

add_action('wp_head','nav_css');

// making frontpage content editable - fp section
// =========================================

function fp_content_customize($wp_customize) {
  $wp_customize->add_section('fp_section', array(
    'title' => 'NZCF Landing Content', 'custom_setting',
    'priority' => 0
  ));

  // // Hero Image
  // // ========

  $wp_customize->add_setting('custom_hero_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_bg_img', array(
    'label' => 'Upload a background image',
    'section' => 'fp_section',
    'settings' => 'custom_hero_img',
    'priority' => 0
  )));

  // // Turn fp paws on or off
  // // ========

  $wp_customize->add_setting('paws_dropdown', array(
    'default' => ''
  ));

  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'paws_dropdown', array(
    'label' => 'Paws on the Front Page',
    'description' => 'Turn paws on or off',
    'settings' => 'paws_dropdown',
    'priority' => 10,
    'section' => 'fp_section',
    'type' => 'select',
    'choices' => array(
      '1' => 'On',
      '0' => 'Off'
    )
  )));

  // // Title
  // // ========
  $wp_customize->add_setting('nzcf_title', array(
    'default' => 'New Zealand Cat Foundation'
  ));

  $wp_customize->add_control('nzcf_title', array(
    'label' => 'Enter page Title',
    'section' => 'fp_section',
    'settings' => 'nzcf_title',
    'type' => 'text',
    'priority' => 50
  ));

  // // Tagline
  // // ========
  $wp_customize->add_setting('nzcf_tagline', array(
    'default' => 'Helping the Helpless'
  ));

  $wp_customize->add_control('nzcf_tagline', array(
    'label' => 'Enter tagline',
    'section' => 'fp_section',
    'settings' => 'nzcf_tagline',
    'type' => 'text',
    'priority' => 100
  ));

  // // Intro txt title
  // // ========
  $wp_customize->add_setting('intro_title', array(
    'default' => 'You make a Difference'
  ));

  $wp_customize->add_control('intro_title', array(
    'label' => 'Enter introductory section Title',
    'section' => 'fp_section',
    'settings' => 'intro_title',
    'type' => 'text',
    'priority' => 150
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
      'type' => 'textarea',
      'priority' => 150
  ));
} //end funct

add_action('customize_register', 'fp_content_customize');

function hero_img_css() {
  $hero_img = get_theme_mod('custom_hero_img');
  $hero_paws = get_theme_mod('paws_dropdown');
  ?>
  <style type="text/css">
    .hero-img {
      <?php
        if ($hero_img) { ?>
          background-image: url(<?php echo $hero_img ?>);
          <?php
        }
      ?>
    }

    .big-paws {
      opacity: <?php echo $hero_paws ?>;
    }
  </style>
  <?php
}

add_action('wp_head','hero_img_css');


// making theme colours editable - theme colour section
// =========================================

function theme_color_customize_section($wp_customize) {
  $wp_customize->add_section('theme_color_section', array(
    'title' => 'Customize Theme Colours', 'custom_setting',
    'priority' => 50
  ));
  //   // Background colour
  //   // ========
  $wp_customize->add_setting('bg_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'bg_colorpicker', array(
      'label' => 'Background Colour',
      'section' => 'theme_color_section',
      'settings' => 'bg_colorpicker',
      'priority' => 0
    )
  ));

  //   // Main Heading Colour
  //   // ========
  $wp_customize->add_setting('heading_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'heading_colorpicker', array(
      'label' => 'Main Heading Colour',
      'section' => 'theme_color_section',
      'settings' => 'heading_colorpicker',
      'priority' => 50
    )
  ));

  //   // Sub Heading Colour
  //   // ========
  $wp_customize->add_setting('subheading_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'subheading_colorpicker', array(
      'label' => 'Sub Heading Colour (Main Accent)',
      'section' => 'theme_color_section',
      'settings' => 'subheading_colorpicker',
      'priority' => 100
    )
  ));

  //   // Body Text Colour
  //   // ========
  $wp_customize->add_setting('bodytxt_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'bodytxt_colorpicker', array(
      'label' => 'Body Text Colour',
      'section' => 'theme_color_section',
      'settings' => 'bodytxt_colorpicker',
      'priority' => 150
    )
  ));

  //   // Sub Btn Colour
  //   // ========
  $wp_customize->add_setting('subbtn_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'subbtn_colorpicker', array(
      'label' => 'Sub Button Colour',
      'section' => 'theme_color_section',
      'settings' => 'subbtn_colorpicker',
      'priority' => 180
    )
  ));

  //   // Sub Btn Text Colour
  //   // ========
  $wp_customize->add_setting('subbtn_txt_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'subbtn_txt_colorpicker', array(
      'label' => 'Sub Button Text Colour',
      'section' => 'theme_color_section',
      'settings' => 'subbtn_txt_colorpicker',
      'priority' => 200
    )
  ));

} //end theme colour function

add_action('customize_register', 'theme_color_customize_section');

function theme_colorpicker_css() {
  $bg_color = get_theme_mod('bg_colorpicker');
  $heading_color = get_theme_mod('heading_colorpicker');
  $subheading_color = get_theme_mod('subheading_colorpicker');
  $bodytxt_color = get_theme_mod('bodytxt_colorpicker');
  $subbtn_color = get_theme_mod('subbtn_colorpicker');
  $subbtntxt_color = get_theme_mod('subbtn_txt_colorpicker');

  ?>
  <style type="text/css">

    body {
      background: <?php echo $bg_color ?>;
    }

    h2,
    a,
    .purr-content a,
    .card-title a,
    .date-posted a,
    .back-link,
    .woocommerce-message::before,
    .stars a,
    .active,
    span.required,
    .navbar-nav .nav-link:active {
      color:<?php echo $subheading_color ?>;
    }

    .menu-item-18 .nav-link,
    .line,
    .purr-line,
    .news-tag a,
    .news-taxonomy-tag,
    a.checkout-button.button.alt.wc-forward {
      background: <?php echo $subheading_color ?>;
    }

    .woocommerce-message {
      border-top-color: <?php echo $subheading_color ?>;
    }

    textPath {
      fill: <?php echo $subheading_color ?>;
    }

    .purr-img,
    .news-card {
      border-bottom: 3px solid <?php if ($subheading_color) {
        echo $subheading_color;
      } else {
        ?> var(--ncf-pink); <?php
      }  ?>;
      border-top: 3px solid <?php if ($subheading_color) {
        echo $subheading_color;
      } else {
        ?> var(--ncf-pink); <?php
      }  ?>;
    }

    p {
      color: <?php echo $bodytxt_color ?>;
    }

    .content-wrapper {
      background: <?php echo $bg_color ?>;
    }

    .title,
    .subtitle {
      color:<?php echo $heading_color ?>;
    }

    .ncf-btn,
    .ncf-sub-btn {
      background: <?php echo $subbtn_color ?>;
      color: <?php echo $subbtntxt_color ?>;
      transition: all .3s ease;
    }

    .ncf-btn:hover,
    .ncf-sub-btn:hover {
      opacity: .5;
      transition: all .3s ease;
    }

  </style>
  <?php
}

add_action('wp_head','theme_colorpicker_css');

// making purrstories page editable - purr stories section
// =========================================

function purr_stories_section($wp_customize) {
  $wp_customize->add_section('purr_stories_section', array(
    'title' => 'Purr Stories Content', 'custom_setting',
    'priority' => 70
  ));

  //   // Bootstrap Column No.
  //   // ========
  $wp_customize->add_setting('ps_col_number', array(
    'default' => 4
  ));

  $wp_customize->add_control('ps_col_number', array(
    'label' => 'Enter Column Number',
    'section' => 'purr_stories_section',
    'settings' => 'ps_col_number',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1,
      'max' => 12
    ),
    'priority' => 0
  ));

  // // Shape of the image borders
  // // ========

  $wp_customize->add_setting('border_number', array(
    'default' => 200
  ));

  $wp_customize->add_control('border_number', array(
    'label' => 'Enter Border Radius',
    'description' => '200 is the roundest and will have a curved title!',
    'section' => 'purr_stories_section',
    'settings' => 'border_number',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1,
      'max' => 200
    ),
    'priority' => 10
  ));

} //end section function

add_action('customize_register', 'purr_stories_section');

function purrstories_css() {
  $border = get_theme_mod('border_number');
  ?>
  <style type="text/css">

  .hotlink-img-wrapper {
    border-radius: <?php echo $border ?>px;
  }

  <?php if ($border < 200) {
    ?>
    textPath {
      display: none;
    }

    .hidden-title {
      display: block;
    }
    <?php
  } ?>

  </style>
  <?php
}

add_action('wp_head','purrstories_css');


// making footer content editable - footer section
// =========================================

function footer_section($wp_customize) {
  $wp_customize->add_section('footer_section', array(
    'title' => 'Footer Content', 'custom_setting',
    'priority' => 80
  ));

  //   // Background Colour
  //   // ========
  $wp_customize->add_setting('ftbg_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'ftbg_colorpicker', array(
      'label' => 'Footer Background Colour',
      'section' => 'footer_section',
      'settings' => 'ftbg_colorpicker',
      'priority' => 0
    )
  ));

  // // Footer TXT Colour
  // // ========

  $wp_customize->add_setting('fttxt_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'fttxt_colorpicker', array(
      'label' => 'Footer Text Colour',
      'section' => 'footer_section',
      'settings' => 'fttxt_colorpicker',
      'priority' => 10
    )
  ));

  // // Footer TXT Hover Colour
  // // ========

  $wp_customize->add_setting('fttxt_hov_colorpicker', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'fttxt_hov_colorpicker', array(
      'label' => 'Footer Text Hover Colour',
      'section' => 'footer_section',
      'settings' => 'fttxt_hov_colorpicker',
      'priority' => 20
    )
  ));

  //   // Sponsor img size
  //   // ========
  $wp_customize->add_setting('sponsor_img_size', array(
    'default' => 200
  ));

  $wp_customize->add_control('sponsor_img_size', array(
    'label' => 'Sponsor Image Size',
    'section' => 'footer_section',
    'settings' => 'sponsor_img_size',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0,
      'max' => 200
    ),
    'priority' => 30
  ));

} //end section function

add_action('customize_register', 'footer_section');

function footer_css() {
  $bg = get_theme_mod('ftbg_colorpicker');
  $txt = get_theme_mod('fttxt_colorpicker');
  $txthov = get_theme_mod('fttxt_hov_colorpicker');
  $imgsize = get_theme_mod('sponsor_img_size');

  ?>
  <style type="text/css">

  footer {
    background: <?php echo $bg ?>;
    color: <?php echo $txt ?>;
  }

  .pagenav a,
  .social-icons a i,
  footer a {
    color: <?php echo $txt ?>;
  }

  .pagenav a:hover,
  .social-icons a i:hover {
    color: <?php echo $txthov ?>;
  }

  .sponsor-item a img {
    width: <?php echo $imgsize ?>px;
  }

  </style>
  <?php
}

add_action('wp_head','footer_css');


?>
