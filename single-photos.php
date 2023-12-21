<?php get_header() ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <!-- Affichage du thumbnail de l'article correspondant
Ainsi que ses taxonomies et champs. -->
    <div class="single_photos_content">
      <div class="single_photos_meta text_maj">
        <?php the_title('<h1 class="single_photos_title">', '</h1>') ?>
        <?php $meta = get_post_meta(get_the_ID()); ?>
        <?php $current_reference = get_post_meta(get_the_ID(), "reference", true); ?>
        <?php $current_type = get_post_meta(get_the_ID(), "type", true); ?>
        <?php $current_annee = get_post_meta(get_the_ID(), "annee", true); ?>
        <?php $current_format = get_the_terms($post->ID, 'formats'); ?>
        <?php $current_categorie = get_the_terms($post->ID, 'category'); ?>
        <h3>Référence : <span class="ref_text"><?php echo $current_reference ?></span> </h3>
        <h3>Catégorie : <?php echo $current_categorie[0]->name ?> </h3>
        <h3>Format : <?php echo $current_format[0]->name ?> </h3>
        <h3>Type : <?php echo $current_type ?> </h3>
        <h3>Année : <?php echo $current_annee ?></h3>
      </div>
      <div class="single_photos_thumbnail">
        <?php the_post_thumbnail($size = "large") ?>
      </div>
    </div>
    <!-- Boutton permettant l'accès au formulaire de contact -->
    <div class="single_photos_contact">
      <h3>Cette photo vous intéresse ?</h3>
      <button id="myBtn" class="button_grey">Contact</button>
      <!-- Affiche dans l'ordre de publication les post précédents et suivants -->
      <div class="single_photos_container2">
        <div class="single_photos_box2 prev_img">
          <?php
          $previous_post = get_previous_post();
          if (is_a($previous_post, 'WP_Post')) : ?>
            <a href="<?php echo get_permalink($previous_post->ID); ?>"><?php echo get_the_post_thumbnail($previous_post->ID, $size = "thumbnail"); ?></a>
          <?php endif; ?>
        </div>
        <div class="single_photos_box2 next_img">
          <?php
          $next_post = get_next_post();
          if (is_a($next_post, 'WP_Post')) : ?>
            <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail($next_post->ID, $size = "thumbnail"); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- Affichage des posts ayant la mème catégorie que l'actuel -->
    <h2>VOUS AIMEREZ AUSSI</h2>
    <div class="single_photos_next">
      <div class="single_photos_container">
        <div class="single_photos_box">
          <?php
          $same_category = get_the_taxonomies();
          $previous_post = get_previous_post($taxonomy = $same_category);
          if (is_a($previous_post, 'WP_Post')) : ?>
            <a href="<?php echo get_permalink($previous_post->ID); ?>"><?php echo get_the_post_thumbnail($previous_post->ID, $size = "large"); ?></a>
          <?php $adjacent_post =  get_adjacent_post($taxonomy = $same_category);
          else : ?>
            <a href="<?php echo get_permalink($adjacent_post->ID); ?>"><?php echo get_the_post_thumbnail($adjacent_post->ID, $size = "large"); ?></a>
          <?php endif; ?>
        </div>
        <div class="single_photos_box">
          <?php
          $next_post = get_next_post($taxonomy = $same_category);
          if (is_a($next_post, 'WP_Post')) : ?>
            <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail($next_post->ID, $size = "large"); ?></a>
          <?php $adjacent_post =  get_adjacent_post($taxonomy = $same_category);
          else : ?>
            <a href="<?php echo get_permalink($adjacent_post->ID); ?>"><?php echo get_the_post_thumbnail($adjacent_post->ID, $size = "large"); ?></a>
          <?php endif; ?>
        </div>
      </div>

      <a href="http://localhost/Mota/"><button class="button_grey">Toutes les photos</button></a>
    </div>

  <?php endwhile ?>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>