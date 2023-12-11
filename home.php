<?php get_header(); ?>
<?php get_template_part('assets/template_part/hero-section'); ?>
<div class="conteneur">
  <?php
  $args = array(
    'post_type' => 'photos',
    'posts_per_page' => 12,
  );
  // Affichage du la galerie sur la page.
  $query = new WP_Query($args); ?>
  <?php if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      get_template_part('assets/template_part/post-gallery');
    endwhile;
    wp_reset_postdata(); // Réinitialiser la requête post
  else :
    echo "Aucun post trouvé";
  endif;  ?>
</div>
<div class="load_button">
  <button class="button_grey" id="load-more-button">Charger plus</button>
</div>
<?php get_footer(); ?>