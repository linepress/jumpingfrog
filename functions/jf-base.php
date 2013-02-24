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

// Register navigation menu's
register_nav_menus( array(
  'footer'    => 'Footer menu',
  'main'      => 'Main menu',
));

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


// Load translation files || Read more about this in /lang/readme.txt
load_theme_textdomain('jumping-frog', get_template_directory() .'/lang' );