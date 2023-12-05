<?php get_header(); ?>
<?php get_template_part('assets/template_part/hero-section'); ?>
<?php
$args = array('post_type' => 'photos');
$loop = new WP_Query($args);
if ($loop->have_posts()) : ?>
  <div class="conteneur">
    <?php $i = 1 ?>
    <?php while ($loop->have_posts() && $i <= 12) : $loop->the_post(); ?>
      <?php $i++ ?>
      <div class="box">
        <?php
        $next_post = get_post();
        if (is_a($next_post, 'WP_Post')) : ?>
          <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail($next_post->ID, $size = "large"); ?></a>
        <?php endif; ?>
      </div>
    <?php endwhile ?>
    </ul>
  </div>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>
<div class="bouton">
  <button id="load-more-button">Charger plus</button>
</div>
<?php get_footer(); ?>