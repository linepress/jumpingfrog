<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
      wp_title( '|', true, 'right' );
    } else {
      wp_title( '|', true, 'right' ) . bloginfo( 'name' );
    }
  ?></title>

  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

  <link rel="apple-touch-icon" href="/apple-touch-icon-57.png" sizes="57x57"> <!-- non-retina iPhone pre iOS 7 -->
  <link rel="apple-touch-icon" href="/apple-touch-icon-72.png" sizes="72x72"> <!-- non-retina iPad pre iOS 7 -->
  <link rel="apple-touch-icon" href="/apple-touch-icon-76.png" sizes="76x76"> <!-- non-retina iPad iOS 7 -->
  <link rel="apple-touch-icon" href="/apple-touch-icon-114.png" sizes="114x114"> <!-- retina iPhone pre iOS 7 -->
  <link rel="apple-touch-icon" href="/apple-touch-icon-120.png" sizes="120x120"> <!-- retina iPhone iOS 7 -->
  <link rel="apple-touch-icon" href="/apple-touch-icon-144.png" sizes="144x144"> <!-- retina iPad pre iOS 7 -->
  <link rel="apple-touch-icon" href="/apple-touch-icon-152.png" sizes="152x152"> <!-- retina iPad iOS 7 -->
 
  <?php wp_head(); ?>

  <?php if( ENVIRONMENT == 'prod' ){ ?>
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'xxxxxxxxxx']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
  <?php } ?>
</head>

<body <?php body_class(); ?>>

  <div class="wrap" role="document">