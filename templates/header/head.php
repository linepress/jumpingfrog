<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php wp_title('|', true, 'right'); bloginfo( 'name' ); ?></title>

  <?php
    if( ENVIRONMENT == 'prod' ) { 
      wp_enqueue_style( 'style-min', get_template_directory_uri() .'/assets/css/style.min.css' );
    } else {
      wp_enqueue_style( 'style', get_template_directory_uri() .'/assets/css/style.css' );
    }
  ?>
  <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

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

  <div id="wrap" role="document">
  <!--[if lt IE 7]>
      <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
      <style type="text/css">
        #wrap {display:table;height:100%}
      </style>
  <![endif]-->
