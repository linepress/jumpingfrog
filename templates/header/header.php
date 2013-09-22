<?php
  $logo_url = get_template_directory_uri() . '/assets/images/logo.png';
?>

<header class="header" role="banner">
  <div class="container cf">
    <?php if( is_front_page() ): ?>
      <h1>
        <a class="title" href="/">
          <img src="<?php echo $logo_url; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo sprintf( __( 'Return to the homepage of %1s', 'jumpingfrog' ), get_bloginfo( 'name' ) ); ?>" />
        </a>
      </h1>
    <?php elseif( is_post_type_archive() ): ?>
      <h1>
        <a class="title" href="/">
          <img src="<?php echo $logo_url; ?>" alt="<?php post_type_archive_title(); ?>" title="<?php echo sprintf( __( 'Return to the homepage of %1s', 'jumpingfrog' ), get_bloginfo( 'name' ) ); ?>" />
        </a>
      </h1>
    <?php else: ?>
       <a class="title" href="/">
        <img src="<?php echo $logo_url; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo sprintf( __( 'Return to the homepage of %1s', 'jumpingfrog' ), get_bloginfo( 'name' ) ); ?>" />
      </a>
    <?php endif; ?>

    <?php get_template_part( 'templates/header/main-menu' ); ?>

  </div> <!--- .header > .container -->
</header> <!--- .header -->