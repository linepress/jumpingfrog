<?php
  
/**
 * Add the LinesCommand to wp-cli if it's defined. Ergo the console version of wp is being used
 *
 * @since 0.0.1
 */
// foreach ( array('custom-post-types', 'taxonomies', ) as $type )
//   foreach ( glob(TEMPLATEPATH . "/$type/*.php" ) as $filename )
//     include $filename;


register_nav_menus( array(
  'footer'    => 'Footer menu',
  'main'      => 'Main menu',
));


# This code is in the Public Domain.
# I recommend replacing 'my_' with your own prefix.

function my_template_path() {
  return My_Wrapping::$main_template;
}

function my_template_base() {
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

  static function wrap( $template ) {
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

add_filter( 'template_include', array( 'My_Wrapping', 'wrap' ), 99 );




function get_main_template_part( $templates ){
  print '<article id="content">';
  foreach ( $templates as $template ) {
    get_template_part( $template );
  }
  print '</article>';
}

function get_sidebar_template_part( $templates ){
  print '<aside id="sidebar">';
  foreach ( $templates as $template ) {
    get_template_part( $template );
  }
  print '</aside>';
}


function add_body_class( $classes ) {
  unset($classes[1]);
  return $classes;
}
add_filter( 'body_class', 'add_body_class' );