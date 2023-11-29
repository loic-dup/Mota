<?php get_header(); ?>
<img class="bannière" src="<?php echo get_template_directory_uri() . '/assets/images/Header.png'; ?>" alt="Image d'une foule" />



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
<a><button class="button_load" type="button">Charger plus</button></a>
<?php get_footer(); ?>