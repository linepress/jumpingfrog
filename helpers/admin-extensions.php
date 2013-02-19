<?php 

function jumpingfrog_load_custom_wp_admin_script( $hook ) {
  wp_register_script( '{context}', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ), null, true );
  wp_enqueue_script( '{context}_admin' );
}

function jumpingfrog_load_custom_wp_admin_style() {
  wp_register_style( 'admin_css', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/admin.css', false, '1.0.0' );
  wp_enqueue_style( 'admin_css' );
}

/*
 * Uncomment the following add_action() functions if you want to load the custom admin script and style.
 * The css and js files are located in the assets folder.
 * Replace all {context} occurances with your theme context.
 */
// add_action( 'admin_enqueue_scripts', 'kwa_load_custom_wp_admin_style' );
// add_action( 'admin_enqueue_scripts', 'jumpingfrog_load_custom_wp_admin_script' );
