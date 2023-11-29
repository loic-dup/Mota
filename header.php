<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Motaphoto</title>
  <?php wp_head() ?>

</head>

<body>

  <nav class="menu-border_bottom nav_fixed" role="navigation" aria-label="<?php esc_html_e('Menu principal', 'text-domain'); ?>">
    <div class="menu-principal">
      <div><img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/Logo.png'; ?>" /></div>
      <button type="" class="menu-toggle button_burger" id="icons" aria-controls="primary-menu" aria-expanded="false"></button>
      <?php
      wp_nav_menu([
        'theme_location' => 'main-menu',
        'container'      => false,
        'walker'         => new A11y_Walker_Nav_Menu(),
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'menu_',
      ]);
      ?>

    </div>
  </nav>