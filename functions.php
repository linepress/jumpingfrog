<?php

register_nav_menus( array(
  'footer'    => 'Footer menu',
  'main'      => 'Main menu',
));

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


function jf_add_body_class( $classes ) {
  unset($classes[1]);
  return $classes;
}
add_filter( 'body_class', 'jf_add_body_class' );


foreach ( array( 'custom-post-types', 'taxonomies', 'helpers' ) as $type )
  foreach ( glob( get_template_directory() . "/$type/*.php" ) as $filename )
    include $filename;

add_theme_support( 'automatic-feed-links' );



function jf_add_editor_style() {
  add_theme_support( 'editor_style' );
  add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'jf_add_editor_style' );