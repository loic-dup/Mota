(function ($) {
  $(document).ready(function () {
    let page = 1; // Numéro de page initial
    $("#load-more-button").on("click", function () {
      if (page) {
        $.ajax({
          type: "POST",
          url: my_ajax_object.ajax_url, // Utilisez l'ajax
          data: {
            // Voir dans functions.php
            action: "load_more_posts",
            page: page,
          },
          success: function (response) {
            // Html correspondant a la gallerie
            $(".conteneur").html(response);
            page++;
          },
        });
      }
      return false;
    });
  });
})(jQuery);
