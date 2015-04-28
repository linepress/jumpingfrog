<?php
// Load translation files || Read more about this in /lang/readme.txt
load_theme_textdomain('jumpingfrog', get_template_directory() .'/lang' );

// Include all post-types & taxonomies (see WP Scaffold) and all function files
foreach ( array( 'post-types', 'taxonomies', 'functions' ) as $type )
  foreach ( glob( get_template_directory() . "/$type/*.php" ) as $filename )
    include $filename;