<?php get_header() ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <h1> <?php the_title() ?></h1>
    <?php the_meta() ?>
    <li> <?php the_taxonomies('formats') ?></li>
    <?php the_post_thumbnail() ?>
    <h3>Cette photo vous intéresse ?</h3>
    <button>contact</button>
    <h2>VOUS AIMEREZ AUSSI</h2>
    <div>

      <?php
      $args = array(
        'posts_per_page' => 10,
        'order'          => 'ASC',
        'orderby'        => 'title',
        'post-type' => 'photos',
      );

      $postslist = get_posts($args);
      print_r($postslist);
      if ($postslist) {
        foreach ($postslist as $post) :
          setup_postdata($post);
      ?>
          <div>
            <?php the_date(); ?>
            <br />
            <?php the_title(); ?>
            <?php the_excerpt(); ?>
          </div>
      <?php
        endforeach;
        wp_reset_postdata();
      } ?>
    </div>
    </div>
    <div></div>
    </div>
  <?php endwhile ?>
<?php else : ?>
  <h1> Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>