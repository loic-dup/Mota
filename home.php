<?php get_header(); ?>
<?php get_template_part('assets/template_part/hero-section'); ?>
<?php get_template_part('assets/template_part/filtres'); ?>
<div class="conteneur" id="gallery">
  <?php
  get_template_part('assets/template_part/post-gallery');
  ?>
</div>
<div class="load_button">
  <button class="button_grey" id="load-more-button">Charger plus</button>
</div>
<?php //get_template_part('/assets/template_part/lightbox'); 
?>

<?php get_footer(); ?>