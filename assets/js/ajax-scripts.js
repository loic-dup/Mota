jQuery(function ($) {
  let page = 1; // Numéro de page initial

  $("#load-more-button").on("click", function () {
    if (page) {
      $.ajax({
        type: "POST",
        url: my_ajax_object.ajax_url, // Utilisez l'ajax
        data: {
          action: "load_more_posts",
          page: page,
        },
        success: function (response) {
          $(".photos_post").html(response);
          page++;
        },
      });
    }
    return false;
  });
});
