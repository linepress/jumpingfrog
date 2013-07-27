<?php

// Return the excerpt of the post, unless the read more element is used
// Output of both versions will be the same: one <p> with content and one <p> with the more link
function jf_read_more_excerpt( ) {
  $content = get_the_content();

  if( strpos( $content, '#more-' ) ) {
    print the_content( __( 'Continue reading', 'jumpingfrog' ) );
  } else {
    print the_excerpt();
    print '<p><a class="more-link" href="'. get_permalink( $post->ID ) . '">' . __('Continue reading', 'jumpingfrog') . '</a></p>';
  }
}

// Change [...] in excerpt to ...
function jf_excerpt_more_link( $more ) {
  global $post;
  return '...';
}
add_filter('excerpt_more', 'jf_excerpt_more_link');

// Create two custom image size functions.
// One hooks into the 'init' and uses `add_image_size()`.
// The other hooks into the 'after_switch_theme' and uses `jf_add_image_size()` to insert them into the database;
function jf_add_image_size( $name, $width = 0, $height = 0, $crop = false ) {
  add_image_size( $name, $width, $height, $crop );

  // Check whether they've been added in the db, otherwise you keep adding them on init.
  if( strlen( get_option( "{$name}_size_w" ) ) || strlen( get_option( "{$name}_size_h" ) ) ) {
    add_option( "{$name}_size_w", $width, '', 'yes' );
    add_option( "{$name}_size_h", $height, '', 'yes' );
    add_option( "{$name}_crop", ((int) $crop), '', 'yes' );
  }
}