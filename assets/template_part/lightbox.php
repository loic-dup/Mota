<?php $next_post = get_post(); ?>

<div class="box__container">
  <div class="box"><?php echo get_the_post_thumbnail($next_post->ID, $size = "large"); ?></div>
  <div><a href="<?php echo get_permalink($next_post->ID); ?>"><img class="logo_eye" src="<?= get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png' ?>"></a></div>
  <div><img class="logo_fullscreen" src="<?= get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png' ?>"></div>
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
<!-- <div class="lightbox">
  <div class="lightbox__close"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/close-light.png' ?>"></div>
  <div class="lightbox__next"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow_next.png' ?>"></div>
  <div class="lightbox__prev"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow_prev.png' ?>"></div>
  <div class="lightbox__container">
    <img src="https://picsum.photos/1440/900" alt="">
  </div>
</div> -->