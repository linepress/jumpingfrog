<header id="header" role="banner">
  <div class="container">
    <a class="title" href="/">
      <h1><?php echo bloginfo( 'name' ); ?></h1>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php echo bloginfo( 'name' ); ?>" title="Terug naar homepage" />
    </a>
    <nav id="nav-main" role="navigation">
      <?php 
        wp_nav_menu ( array(
          'theme_location'  => '',
          'menu'            => 'main', 
          'container'       => 'div', 
          'container_class' => 'menu-{menu slug}-container', 
          'container_id'    => '',
          'menu_class'      => 'menu', 
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => ''
        ) );
      ?>
    </nav>
  </div>  <!--- #header > .container -->
</header> <!--- #header -->