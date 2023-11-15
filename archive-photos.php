<?php get_header() ?>
<?php if (have_posts()) : ?>
  <ul>
    <?php while (have_posts()) : the_post(); ?>
      <a href="<?php the_permalink() ?>">
        <li><?php the_title() ?></li>
      </a>
    <?php endwhile ?>
  </ul>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>
<?php get_footer() ?>