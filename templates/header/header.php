<?php
  $logo_url = get_template_directory_uri() . '/assets/images/logo.png';
?>

<header class="header" role="banner">
  <div class="container cf">
    <?php if( is_front_page() ): ?>
      <h1>
        <a class="title" href="/">
          <img src="<?php echo $logo_url; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php __('Return to homepage', 'jumpingfrog'); ?>" />
        </a>
      </h1>
    <?php elseif( is_post_type_archive() ): ?>
      <h1>
        <a class="title" href="/">
          <img src="<?php echo $logo_url; ?>" alt="<?php post_type_archive_title(); ?>" title="<?php __('Return to homepage', 'jumpingfrog'); ?>" />
        </a>
      </h1>
    <?php else: ?>
       <a class="title" href="/">
        <img src="<?php echo $logo_url; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php __('Return to homepage', 'jumpingfrog'); ?>" />
      </a>
    <?php endif; ?>

    <?php get_template_part( 'templates/header/main-menu' ); ?>

  </div> <!--- .header > .container -->
</header> <!--- .header -->