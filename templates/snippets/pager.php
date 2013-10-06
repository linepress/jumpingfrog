<?php
  $next_label = __('Next', 'jumpingfrog');
  $prev_label = __('Previous', 'jumpingfrog');

  global $wp_query;
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<div class="pager">
  <span class="next">
    <?php
      previous_posts_link($next_label, $wp_query->max_num_pages);
      if( $paged == 1 ) { echo '<span class="no-link">' . $next_label . '</span>'; } // if there are no older articles
    ?>
  </span>
  <span class="prev">
    <?php
      next_posts_link($prev_label, $wp_query->max_num_pages);
      if( $paged == $wp_query->max_num_pages ) { echo '<span class="no-link">' . $prev_label . '</span>'; } // if there are no newer articles
    ?>
  </span>
</div>