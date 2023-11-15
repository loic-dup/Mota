<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <ul>
    <?php while (have_posts()) : the_post(); ?>
      <li><?php the_title() ?>
        <?php the_post_thumbnail() ?></li>
    <?php endwhile ?>
  </ul>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>
<?php get_footer(); ?>