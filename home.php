<?php get_header(); ?>
<img class="bannière" src="<?php echo get_template_directory_uri() . '/assets/images/Header.png'; ?>" alt="Image d'une foule" />
<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>
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