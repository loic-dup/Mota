(function ($) {
  $(document).ready(function () {
    let page = 1; // Numéro de page initial
    $("#load-more-button").on("click", function () {
      console.log("hello");
      if (page) {
        console.log("hello");
        $.ajax({
          type: "POST",
          url: my_ajax_object.ajax_url, // Utilisez l'ajax
          data: {
            action: "load_more_posts",
            page: page,
          },
          success: function (response) {
            $(".conteneur").html(response);
            page++;
          },
        });
      }
      return false;
    });
  });
})(jQuery);
