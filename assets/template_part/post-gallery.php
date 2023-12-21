
<?php
$args = array(
  'post_type' => 'photos',
  'posts_per_page' => 8,
);
// Affichage du portofolio sur la page.
$query = new WP_Query($args);
if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
    // Afficher le contenu du post ici (titre, contenu, etc.)
    get_template_part('assets/template_part/lightbox');
  endwhile;
  wp_reset_postdata(); // Réinitialiser la requête post
  wp_reset_query();

else :
  echo "Aucun post trouvé avec cette taxonomie.lol";
endif;
wp_reset_postdata(); // Réinitialiser la requête post
wp_reset_query();

?> 