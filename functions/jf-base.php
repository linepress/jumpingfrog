<?php

function jf_template_path() {
  return My_Wrapping::$main_template;
}

function jf_template_base() {
  return My_Wrapping::$base;
}


class My_Wrapping {

  /**
   * Stores the full path to the main template file
   */
  static $main_template;

  /**
   * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
   */
  static $base;

  static function jf_wrap( $template ) {
    self::$main_template = $template;

    self::$base = substr( basename( self::$main_template ), 0, -4 );

    if ( 'index' == self::$base )
      self::$base = false;

    $templates = array( 'wrapper.php' );

    if ( self::$base )
      array_unshift( $templates, sprintf( 'wrapper-%s.php', self::$base ) );

    return locate_template( $templates );
  }
}

add_filter( 'template_include', array( 'My_Wrapping', 'jf_wrap' ), 99 );


function jf_get_main_header_template_part( $templates ) {
  if( !empty( $templates ) ) {
    print '<div class="main-header">';
    foreach( $templates as $template ) {
      get_template_part( $template );
    }
    print '</div>';
  }
}

function jf_get_main_template_part( $templates ){
  print '<article class="content">';
  foreach ( $templates as $template ) {
    get_template_part( $template );
  }
  print '</article>';
}

function jf_get_sidebar_template_part( $templates ){
  if( !empty($templates) ) {
    print '<aside class="sidebar">';
    foreach ( $templates as $template ) {
      get_template_part( $template );
    }
    print '</aside>';
  }
}


// Enqueue all Stylesheets and Javascript files
if ( ! function_exists( 'jf_enqueue_scripts_styles' ) ) {
  function jf_enqueue_scripts_styles() {
    // Enqueue styles
    if ( WP_ENV == 'production' ) {
      wp_register_style( 'style', get_template_directory_uri() .'/assets/dist/css/style.min.css', false );
    } else {
      wp_register_style( 'style', get_template_directory_uri() .'/assets/dist/css/style.css', false );
    }
    wp_enqueue_style( 'style' );

    // Enqueue scripts
    if ( ! is_admin() ) {
      wp_deregister_script( 'jquery' );
      wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, null, false );
      add_filter( 'script_loader_src', 'jf_jquery_local_fallback', 10, 2 );
    }
    wp_register_script( 'modernizr-respond', get_template_directory_uri() . '/assets/src/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', false, null, false );

    if ( WP_ENV == 'production' ) {
      wp_register_script( 'plugins', get_template_directory_uri() . '/assets/dist/js/script-plugins.min.js', array('jquery'), null, true );
      wp_register_script( 'script', get_template_directory_uri() . '/assets/dist/js/script.min.js', array('jquery', 'plugins'), null, true );
    } else {
      wp_register_script( 'plugins', get_template_directory_uri() . '/assets/dist/js/script-plugins.js', array('jquery'), null, true );
      wp_register_script( 'script', get_template_directory_uri() . '/assets/dist/js/script.js', array('jquery', 'plugins'), null, true );
    }
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'modernizr-respond' );
    wp_enqueue_script( 'plugins' );
    wp_enqueue_script( 'script' );
  }
  add_action( 'wp_enqueue_scripts', 'jf_enqueue_scripts_styles', 100 );
}


function jf_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' .get_template_directory_uri() . '/assets/src/js/vendor/jquery-1.11.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}


// Add body classes
function jf_add_body_class( $classes ) {
  unset($classes[1]);

  if( is_singular() ){
    $classes[] = 'single-' . get_post_type();
  }

  if( is_post_type_archive() ){
    $classes[] = 'archive-' . get_post_type();
  }

  return $classes;
}
add_filter( 'body_class', 'jf_add_body_class' );


// Adds RSS feed links to HTML head
add_theme_support( 'automatic-feed-links' );


// Remove generator meta element
function rm_generator_filter() {
  return '';
}
add_filter('the_generator', 'rm_generator_filter');


// Remove wlwmanifest and rsd link elements
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');