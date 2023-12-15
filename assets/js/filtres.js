jQuery(document).ready(function ($) {
  // Fonction étant utiliser pour détecter le changement d'option,
  // dans les differents selects et appliquer les filtres.
  $("#filtres__category , #filtres__formats, #filtres__dates ").on(
    "change",
    function () {
      let category = $("#filtres__category").val();
      let formats = $("#filtres__formats").val();
      let order = $("#filtres__dates").val();
      console.log(order);
      $.ajax({
        url: my_ajax_object.ajax_url,
        type: "POST",
        data: {
          // Voir dans functions.php
          action: "filter_posts",
          category: category,
          formats: formats,
          order: order,
        },
        success: function (response) {
          // Mise à jour de la zone d'affichage de la gallerie filtrée.
          $("#gallery").html(response);
        },
      });
    }
  );
});
