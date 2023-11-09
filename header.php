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
      <div><img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/Logo.png'; ?>" /></div>
      <button type="button" class="menu-toggle" id="icons" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'text-domain'); ?></button>
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

  <!-- Trigger/Open The Modal -->
  <button id="myBtn">Open Modal</button>

  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">×</span>
        <h2>Modal Header</h2>
      </div>
      <div class="modal-body">
        <p>Some text in the Modal Body</p>
        <p>Some other text...</p>
      </div>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>

  </div>