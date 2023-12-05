<div class="hero-container">
  <div class="hero-image">
    <?php
    $args = array(
      'post_type' => 'photos',
      'posts_per_page' => 1,
      'orderby' => 'rand'
    );
    $query = new WP_Query($args);
    ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <?php the_post_thumbnail('full', ['class' => 'hero']); ?>
    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>
</div>