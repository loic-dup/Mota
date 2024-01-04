<?php $next_post = get_post(); ?>

<div class="box__container">

  <div class="box"><?php echo get_the_post_thumbnail($next_post->ID, $size = "large"); ?></div>
  <div class="box__infos">
    <div><a href="<?php echo get_permalink($next_post->ID); ?>"><img class="logo_eye" src="<?= get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png' ?>"></a></div>
    <div><img class="logo_fullscreen" data-id="<?php echo get_the_ID(); ?>" src="<?= get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png' ?>"></div>
    <div>
      <p class="info_title"><?php the_title() ?></p>
    </div>
    <div class="info_taxo">
      <?php $taxonomy = 'category';
      $terms = get_the_terms(get_the_ID(), $taxonomy);
      foreach ($terms as $term) {
        echo '<p href="' .  '" class="therme">' . esc_html($term->name) . '</p> ';
      } ?> </div>
  </div>
</div>