<?php 
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
      <?php jf_read_more_excerpt(); ?>
    </div>
  <?php
    endwhile;
  endif;