<?php
// On enregistre nos différents menus
function register_my_menu()
{
  register_nav_menu('main-menu', __('Menu principal', 'text-domain'));
  register_nav_menu('footer-menu', __('Pied de page', 'text-domain'));
}
add_action('after_setup_theme', 'register_my_menu');
/**
 * Registers a stylesheet.
 * Or Registers a script.
 */
function theme_register_assets()
{
  wp_register_style('style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('style');
  wp_register_style('lightbox__style', get_template_directory_uri() . '/assets/css/lightbox.css');
  wp_enqueue_style('lightbox__style');
  wp_register_style('filtres__style', get_template_directory_uri() . '/assets/css/filtres.css');
  wp_enqueue_style('filtres__style');
  wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js');
  wp_enqueue_script('scripts');
  wp_register_script('filtres_script', get_template_directory_uri() . '/assets/js/filtres.js');
  wp_enqueue_script('filtres_script');
  wp_register_script('modal_lightbox_script', get_template_directory_uri() . '/assets/js/modal-lightbox.js');
  wp_enqueue_script('modal_lightbox_script');
  wp_register_script('menus', get_template_directory_uri() . '/assets/js/menus.js');
  wp_enqueue_script('menus');
  wp_enqueue_script('motaphoto', get_template_directory_uri() . '/assets/js/motaphoto.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js', array('jquery'), '1', true);
  wp_localize_script('motaphoto', 'motaphoto_js', array('ajax_url' => admin_url('admin-ajax.php')));
}
// Register style sheet or scripts.
add_action('wp_enqueue_scripts', 'theme_register_assets');
//Chargement du fichier menus.php
require_once get_template_directory() . '/assets/walker/menus.php';
//Mise en place de la page d'administation
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
//Ajout des champs de la page d'aministration
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
// Register ajax scripts.
function enqueue_ajax_scripts()
{
  wp_enqueue_script('jquery');
  wp_register_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js', array('jquery'), '1', true);
  wp_enqueue_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js', array('jquery'), '1', true);
  // Passez l'URL Ajax au script
  wp_localize_script('ajax-scripts', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_scripts');
// Fonction permettant le chargement de post supplémentaires
function load_more_posts()
{
  $page = $_POST['photos'];

  $query_args = array(
    'post_type' => 'photos',
    'posts_per_page' => 24,
    'paged' => $page,
    'orderby' => 'post_in',
    array(
      'taxonomy' => 'category',
    ),

  );

  $query = new WP_Query($query_args);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      get_template_part('assets/template_part/lightbox');
    endwhile;
  endif;
  // wp_reset_postdata();
  die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
// Fonction pour la gestion des filtres 
function filter_posts()
{
  $categorie =  $_POST['category'];
  $format = $_POST['formats'];
  $sort_order = $_POST['order'];
  // Si on utilises les deux filtres Categories et Formats
  // Alors on applique le tri de photos correspondant
  if ($categorie && $format) {
    $args = array(
      'post_type' => 'photos',
      'orderby' => $sort_order,
      'order' => $sort_order,
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => $categorie,
        ),
        array(
          'taxonomy' => 'formats',
          'field' => 'slug',
          'terms' => $format,
        ),
      ),

    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        get_template_part('assets/template_part/lightbox');

      endwhile;
    else :
      echo "Il n'y a pas de photos correspondant à votre recherche";
    endif;
    die();
  }
  // Si on utilises le  filtre Categories
  // Alors on applique le tri de photos correspondant
  elseif ($categorie) {
    $args = array(
      'post_type' => 'photos',
      'orderby' => $sort_order,
      'order' => $sort_order,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field'    => 'slug',
          'terms'    =>  $categorie,
        ),
      ),
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        get_template_part('assets/template_part/lightbox');

      endwhile;
    else :
      echo "Il n'y a pas de photos correspondant à votre recherche";
    endif;
    die();
  }
  // Si on utilises le  filtre Formats
  // Alors on applique le tri de photos correspondant 
  elseif ($format) {
    $args = array(
      'post_type' => 'photos',
      'orderby' => $sort_order,
      'order' => $sort_order,
      'tax_query' => array(
        array(
          'taxonomy' => 'formats',
          'field'    => 'slug',
          'terms'    =>  $format,
        ),
      ),
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        get_template_part('assets/template_part/lightbox');

      endwhile;
    else :
      echo "Il n'y a pas de photos correspondant à votre recherche";

    endif;
    die();
  }
  // Si on utilises le  filtre date
  // Alors on applique le tri de photos correspondant 
  elseif ($sort_order) {
    $args = array(
      'post_type' => 'photos',
      'orderby' => $sort_order,
      'order' => $sort_order,
      'tax_query' => array(),
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        get_template_part('assets/template_part/lightbox');

      endwhile;
    else :
      echo "Il n'y a pas de photos correspondant à votre recherche";
    endif;
    die();
  } else {
    $args = array(
      'post_type' => 'photos',
      'posts_per_page' => 12,
      'orderby' => 'post_in',
      array(
        'taxonomy' => 'category',
      ),


    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        get_template_part('assets/template_part/lightbox');

      endwhile;
    else :
      echo "Il n'y a pas de photos correspondant à votre recherche";
    endif;
    die();
  }
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');
