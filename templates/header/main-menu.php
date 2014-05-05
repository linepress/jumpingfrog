<nav class="nav-main" role="navigation">
  <?php
    wp_nav_menu ( array(
      'theme_location'  => 'main',
      'menu'            => 'main',
      'container'       => false,
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul>%3$s</ul>',
      'depth'           => 0,
      'walker'          => new jf_walker_nav_menu(),
    ) );
  ?>
</nav>