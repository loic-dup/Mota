jQuery(document).ready(function ($) {
  $("#filtres_category , #filtres_formats, #filtres_dates ").change(
    function () {
      let category = $("#filtres_category").val();
      let formats = $("#filtres_formats").val();
      let order = $("#filtres_dates").val();

      $.ajax({
        url: my_ajax_object.ajax_url,
        type: "POST",
        data: {
          action: "filter_posts",
          category: category,
          format: formats,
          order: order,
        },
        success: function (response) {
          // Mettez à jour la zone d'affichage des publications filtrées.
          $("#gallery").html(response);
        },
      });
    }
  );

  $(".select__title").click(function () {
    $(".choix-cat").css("display", "flex");
  });
});
