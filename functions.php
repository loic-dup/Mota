<?php
function register_my_menu()
{
  register_nav_menu('main-menu', 'Menu principal');
}
add_action('after_setup_theme', 'register_my_menu');
/**
 * Registers a stylesheet.
 */
function theme_register_assets()
{
  wp_register_style('style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('style');
}
// Register style sheet.
add_action('wp_enqueue_scripts', 'theme_register_assets');
