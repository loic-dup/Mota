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
  wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js');
  wp_enqueue_script('scripts');
  wp_register_script('menus', get_template_directory_uri() . '/assets/js/menus.js');
  wp_enqueue_script('menus');
  wp_enqueue_script('motaphoto', get_template_directory_uri() . '/assets/js/motaphoto.js', array('jquery'), '1.0.0', true);
  wp_localize_script('motaphoto', 'motaphoto_js', array('ajax_url' => admin_url('admin-ajax.php')));
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


add_action('wp_ajax_capitaine_load_comments', 'capitaine_load_comments');
add_action('wp_ajax_nopriv_capitaine_load_comments', 'capitaine_load_comments');

function capitaine_load_comments()
{

  // Vérification de sécurité
  if (
    !isset($_REQUEST['nonce']) or
    !wp_verify_nonce($_REQUEST['nonce'], 'capitaine_load_comments')
  ) {
    wp_send_json_error("Vous n’avez pas l’autorisation d’effectuer cette action.", 403);
  }

  // On vérifie que l'identifiant a bien été envoyé
  if (!isset($_POST['postid'])) {
    wp_send_json_error("L'identifiant de l'article est manquant.", 400);
  }

  // Récupération des données du formulaire
  $post_id = intval($_POST['postid']);

  // Vérifier que l'article est publié, et public
  if (get_post_status($post_id) !== 'publish') {
    wp_send_json_error("Vous n'avez pas accès aux commentaires de cet article.", 403);
  }

  // Utilisez sanitize_text_field() pour les chaines de caractères.
  // exemple : 
  $name = sanitize_text_field($_POST['name']);

  // Requête des commentaires
  $comments = get_comments([
    'post_id' => $post_id,
    'status' => 'approve'
  ]);

  // Préparer le HTML des commentaires
  $html = wp_list_comments([
    'per_page' => -1,
    'avatar_size' => 76,
    'echo' => false,
  ], $comments);

  // Envoyer les données au navigateur
  wp_send_json_success($html);
}
function enqueue_ajax_scripts()
{
  wp_enqueue_script('jquery');
  wp_register_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js');
  wp_enqueue_script('ajax-scripts', get_template_directory_uri() . '/js/ajax-scripts.js', array('jquery'), '1', true);
  wp_enqueue_script('filtre', get_template_directory_uri() . '/js/filtre.js', array('jquery'), '1', true);


  // Passez l'URL Ajax au script
  wp_localize_script('ajax-scripts', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
  wp_localize_script('filtre', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_scripts');



// afficher plus
function load_more_posts()
{
  $page = $_POST['photos'];

  $query_args = array(
    'post_type' => 'photos',
    'posts_per_page' => 12,
    'paged' => $page,
    array(
      'taxonomy' => 'category',
      'field' => 'slug',
    ),
  );

  $query = new WP_Query($query_args);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();

      the_post_thumbnail();

    endwhile;
  endif;

  // wp_reset_postdata();
  die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
