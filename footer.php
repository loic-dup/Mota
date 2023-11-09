<?php wp_footer() ?>
<nav class="menu-border_top" role="navigation" aria-label="<?php esc_html_e('Pied de page', 'text-domain'); ?>">
  <?php
  wp_nav_menu([
    'theme_location' => 'footer-menu',
    'container'      => false,
    'walker'         => new A11y_Walker_Nav_Menu(),
    'menu_id'        => 'secondary-menu',
    'menu_class'     => 'menu_',
  ]);
  ?>
  <?php /*  echo get_option('motaphoto_settings_field_email');*/ ?>
</nav>
</body>

</html>