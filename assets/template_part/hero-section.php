<div class="hero-container">
  <div class="hero-image">

    <?php
    $args = array(
      'post_type' => 'photos',
      'posts_per_page' => 1,
      'orderby' => 'rand',
      array(
        'taxonomy' => 'formats',
        'field' => 'slug',
        'terms'    => 'Paysage',
      ),
    );
    $query = new WP_Query($args);
    ?>
    <?php while ($query->have_posts()) : $query->the_post();  ?>
      <?php the_post_thumbnail('full', ['class' => 'hero']); ?>
    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>
  <div class="hero-title">
    <h1>PHOTOGRAPHE EVENT</h1>
  </div>
</div>