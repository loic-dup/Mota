<?php get_header() ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <div class="single_photos_content">
      <div class="single_photos_meta text_maj">
        <h2> <?php the_title() ?></h2>
        <?php the_taxonomies() ?>
        <?php the_meta() ?>
      </div>
      <div class="single_photos_thumbnail">
        <?php the_post_thumbnail($size = "large") ?>
      </div>
    </div>
    <div class="single_photos_contact">
      <h3>Cette photo vous intéresse ?</h3>
      <button id="myBtn">Contact</button>
    </div>
    <h2>VOUS AIMEREZ AUSSI</h2>
    <div class="single_photos_next">
      <div class="single_photos_thumbnail_link">
        <?php
        $next_post = get_next_post();
        if (is_a($next_post, 'WP_Post')) : ?>
          <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail($next_post->ID, $size = "medium"); ?></a>
        <?php endif; ?>
        <?php
        $previous_post = get_previous_post();
        if (is_a($previous_post, 'WP_Post')) : ?>
          <a href="<?php echo get_permalink($previous_post->ID); ?>"><?php echo get_the_post_thumbnail($previous_post->ID, $size = "medium"); ?></a>
      </div>
      <a href="http://localhost/Mota/"><button>Toutes les photos</button></a>
    </div>
  <?php endif; ?>
<?php endwhile ?>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>