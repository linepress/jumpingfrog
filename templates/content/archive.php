<?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
      <?php jf_read_more_excerpt(); ?>
    </article>
  <?php
    endwhile;
  endif;
