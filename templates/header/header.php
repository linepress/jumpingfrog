<header class="header" role="banner">
  <div class="container">
    <a class="title" href="/">
      <h1 class="hide"><?php echo bloginfo( 'name' ); ?></h1>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php echo bloginfo( 'name' ); ?>" title="Terug naar homepage" />
    </a>

    <?php get_template_part( 'templates/header/main-menu' ); ?>

  </div>  <!--- .header > .container -->
</header> <!--- .header -->