<?php get_header(); ?>
<img class="bannière" src="<?php echo get_template_directory_uri() . '/assets/images/Header.png'; ?>" alt="Image d'une foule" />



<?php
$args = array('post_type' => 'photos');
$loop = new WP_Query($args);
if ($loop->have_posts()) : ?>
  <div class="conteneur">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
      <div class="box">
        <?php the_post_thumbnail() ?>
      </div>
    <?php endwhile ?>
    </ul>
  </div>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>
<?php get_footer(); ?>