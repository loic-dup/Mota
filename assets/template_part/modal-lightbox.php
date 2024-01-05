<!-- <div class="lightbox" id="lightbox__modal">
  <div class="lightbox__close"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/close-light.png' ?>"></div>
  <div class="lightbox__next"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow_next.png' ?>"></div>
  <div class="lightbox__prev"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow_prev.png' ?>"></div>
  <div class="lightbox__container">
    <img src="" alt="">
  </div>
</div> -->
<div class="lightbox" id="lightbox__modal">
  <div class="container-lightbox">
    <div class="lightbox__close">
      <img src="<?= get_stylesheet_directory_uri() . '/assets/images/close-light.png' ?>">
    </div>
    <div class="post_light">
      <div class="lightbox__prev">
        <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Fleche_precedente.png' ?>">
      </div>
      <div class="lightbox__container">
        <?php
        // Arguments de requête pour récupérer les articles
        $args = array(
          'post_type' => 'photos',   // Type de post : article
          'posts_per_page' => -1,  // Récupérer tous les articles
        );
        // Récupérer les articles en utilisant get_posts()
        $articles = get_posts($args);
        // Initialiser un tableau pour stocker les données des articles
        $tableau_articles = array();
        // Boucler à travers les articles récupérés et les ajouter au tableau
        foreach ($articles as $article) {
          $taxonomy_name = 'category';
          $thumbnail = get_the_post_thumbnail($article->ID, 'large');
          $terms = get_the_terms($article->ID, $taxonomy_name);
          $ref = get_post_meta($article->ID, "reference", true);
          $article_data = array(
            'ID' => $article->ID,
            'thumbnail' => $thumbnail,
            'taxonomy' => $terms,
            'field' => $ref,
            // Vous pouvez ajouter d'autres champs selon vos besoins
          );
          // Ajouter les données de l'article au tableau
          $tableau_articles[] = $article_data;

          $tableau_articles_json = json_encode($tableau_articles);
        }
        ?>
        <!-- Utiliser une balise script pour passer les données à JavaScript -->
        <script>
          let articlesData = <?php echo $tableau_articles_json; ?>;
        </script>

      </div>
      <div class="lightbox__next">
        <img src="<?= get_stylesheet_directory_uri() . '/assets/images/Fleche_suivante.png' ?>">
      </div>
      <div class="infos_light">
        <a class="ref"><?php echo $ref ?></a>
        <?php
        $taxonomy = 'category'; // Remplacez par le nom de la taxonomie que vous souhaitez afficher
        $terms = get_the_terms($article->ID, $taxonomy);
        // var_dump($terms);
        if ($terms && !is_wp_error($terms)) {
          foreach ($terms as $term) {
            echo '<a href="' . esc_url(get_term_link($term)) . '" class="therme">' . esc_html($term->name) . '</a> ';
          }
        }
        ?>
      </div>
    </div>

  </div>
</div>