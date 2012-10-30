<?php
  
/**
 * Add the LinesCommand to wp-cli if it's defined. Ergo the console version of wp is being used
 *
 * @since 0.0.1
 */
foreach ( array('custom-post-types', 'taxonomies', ) as $type )
  foreach ( glob(TEMPLATEPATH . "/$type/*.php" ) as $filename )
    include $filename;


register_nav_menus( array(
  'footer'    => 'Footer menu',
  'main'      => 'Main menu',
));