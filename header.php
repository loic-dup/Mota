<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Motaphoto</title>
  <?php wp_head() ?>

</head>

<body>

  <nav class="menu-border_bottom" role="navigation" aria-label="<?php esc_html_e('Menu principal', 'text-domain'); ?>">
    <div class="menu-principal">
      <button type="button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'text-domain'); ?></button>
      <div><img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/Logo.png'; ?>" /></div>
      <?php
      wp_nav_menu([
        'theme_location' => 'main-menu',
        'container'      => false,
        'walker'         => new A11y_Walker_Nav_Menu(),
        'menu_id'        => 'primary-menu',
      ]);
      ?>
    </div>
  </nav>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/Header.png'; ?>" alt="Image d'une foule" />