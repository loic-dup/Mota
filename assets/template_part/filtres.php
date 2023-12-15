<?php
// Récupérer toutes les catégories
$taxonomy = 'category';
$categories = get_terms($taxonomy, array('hide_empty' => false,));
$category_filter = (isset($_GET['category'])) ? $_GET['category'] : '';

// Récupérer toutes les formats
$taxoFormat = 'formats';
$formats = get_terms($taxoFormat, array('hide_empty' => false,)); // Inclure les catégories sans articles
$category_filter_formats = (isset($_GET['category'])) ? $_GET['category'] : '';
?>
<div class="filtres__container">
  <div class="filtres__container2">
    <select id="filtres__category" class="filtres_select" name="category">
      <option class="select__title" value="">CATÉGORIES</option>
      <?php
      foreach ($categories as $category) :
        $selected = ($category->slug === $category_filter) ? 'selected' : '';
        echo '<option class="select" value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
      endforeach;
      ?>
    </select>
    <select id="filtres__formats" class="filtres_select" name="category">
      <option class="select__title" value="">FORMATS</option>
      <?php
      foreach ($formats as $category) :
        $selected = ($category->slug === $category_filter_format) ? 'selected' : '';
        echo '<option class="select" value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
      endforeach;
      ?>
    </select>
  </div>
  <div>
    <select id="filtres__dates" class="filtres_select" name="category">
      <option class="select__title" value="">TRIER PAR</option>
      <option class="label" value="ASC">Plus ancien</option>
      <option value="DESC">Plus récent</option>
    </select>
  </div>
</div>