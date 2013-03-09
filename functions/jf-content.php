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