<?php
function register_my_menu()
{
  register_nav_menu('main-menu', __('Menu principal', 'text-domain'));
  register_nav_menu('footer-menu', __('Pied de page', 'text-domain'));
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
//Chargement du fichier menus.php
require_once get_template_directory() . '/assets/walker/menus.php';

//Page d'administation

function motaphoto_add_admin_pages()
{
  add_menu_page(__('Paramètres du thème MotaPhoto', 'MotaPhoto'), __('MotaPhoto', 'motaphoto'), 'manage_options', 'motaphoto-settings', 'motaphoto_theme_settings', 'dashicons-admin-settings', 60);
}
function motaphoto_theme_settings()
{
  echo '<h1>' . get_admin_page_title() . '</h1>';
  echo '<form action="options.php" method="post" name="motaphoto_settings">';

  echo '<div>';

  settings_fields('motaphoto_settings_fields');

  do_settings_sections('motaphoto_settings_section');

  submit_button();

  echo '</div>';

  echo '</form>';
}
add_action('admin_menu', 'motaphoto_add_admin_pages');
function motaphoto_settings_register()
{
  register_setting('motaphoto_settings_fields', 'motaphoto_settings_fields', 'motaphoto_settings_fields_validate');
  add_settings_section('motaphoto_settings_section', __('Paramètres', 'motaphoto'), 'motaphoto_settings_section_introduction', 'motaphoto_settings_section');
  add_settings_field('motaphoto_settings_field_introduction', __('Introduction', 'motaphoto'), 'motaphoto_settings_field_introduction_output', 'motaphoto_settings_section', 'motaphoto_settings_section');
  add_settings_field('motaphoto_settings_field_phone_number', __('Numéro de téléphone', 'motaphoto'), 'motaphoto_settings_field_phone_number_output', 'motaphoto_settings_section', 'motaphoto_settings_section');
  add_settings_field('motaphoto_settings_field_email', __('Adresse mail', 'motaphoto'), 'motaphoto_settings_field_email_output', 'motaphoto_settings_section', 'motaphoto_settings_section');
}
//Ajout des champs
function motaphoto_settings_fields_validate($inputs)
{
  if (!empty($_POST)) {
    if (!empty($_POST['motaphoto_settings_field_introduction'])) {
      update_option('motaphoto_settings_field_introduction', $_POST['motaphoto_settings_field_introduction']);
    }
    if (!empty($_POST['motaphoto_settings_field_phone_number'])) {
      update_option('motaphoto_settings_field_phone_number', $_POST['motaphoto_settings_field_phone_number']);
    }
    if (!empty($_POST['motaphoto_settings_field_email'])) {
      update_option('motaphoto_settings_field_email', $_POST['motaphoto_settings_field_email']);
    }
  }
  return $inputs;
}
function motaphoto_settings_section_introduction()
{

  _e('Paramètrez les différentes options de votre thème MotapPhoto.', 'motaphoto');
}
function motaphoto_settings_field_introduction_output()
{
  $value = get_option('motaphoto_settings_field_introduction');

  echo '<input name="motaphoto_settings_field_introduction" type="text" value="' . $value . '" />';
}
function motaphoto_settings_field_phone_number_output()
{
  $value = get_option('motaphoto_settings_field_phone_number');

  echo '<input name="motaphoto_settings_field_phone_number" type="tel" value="' . $value . '" />';
}
function motaphoto_settings_field_email_output()
{
  $value = get_option('motaphoto_settings_field_email');

  echo '<input name="motaphoto_settings_field_email" type="email" value="' . $value . '" />';
}

add_action('admin_init', 'motaphoto_settings_register');
