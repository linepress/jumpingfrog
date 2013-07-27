<?php 

// The Admin JS can be used to change the WP-ADMIN using Javscript 
function jf_load_custom_wp_admin_script( ) {
  wp_register_script( 'admin_js', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'admin_js' );
}
add_action( 'admin_enqueue_scripts', 'jf_load_custom_wp_admin_style' );


// The Admin CSS can be used to change the WP-ADMIN using CSS
function jf_load_custom_wp_admin_style() {
  wp_register_style( 'admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, '1.0.0' );
  wp_enqueue_style( 'admin_css' );
}
add_action( 'admin_enqueue_scripts', 'jf_load_custom_wp_admin_script' );


// The Editor Style CSS can be used to style the WYSIWYG editor
function jf_add_editor_style() {
  add_theme_support( 'editor_style' );
  add_editor_style( get_template_directory_uri() . '/assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'jf_add_editor_style' );