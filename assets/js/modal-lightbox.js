jQuery(document).ready(function ($) {
  $(".logo_fullscreen").click(function () {
    $("#lightbox__modal").css("display", "flex");
    let clickPhoto = this.getAttribute("data-id");
    console.log(clickPhoto);
    // Accéder aux données depuis la variable JavaScript
    for (var i = 0; i < articlesData.length; i++) {
      var article = articlesData[i];
      // Vérifiez si l'ID correspond à l'ID recherché
      if (article.ID == clickPhoto) {
        // Sélectionnez l'élément avec la classe 'clickPhotoSuiv'
        $(".lightbox__container").html("");
        $(".lightbox__container").append(article.thumbnail);
        $(".lightbox__next").attr("data-id", article.ID);
        $(".lightbox__prev").attr("data-id", article.ID);
        break; // Arrêtez la boucle
      }
    }
  });
});
jQuery(document).ready(function ($) {
  $(".lightbox__close").click(function () {
    $("#lightbox__modal").css("display", "none");
  });
});
jQuery(document).ready(function ($) {
  $(".lightbox__next").click(function () {
    var dataId = parseInt(this.getAttribute("data-id"));
    console.log(dataId);
    // Accéder aux données depuis la variable JavaScript
    for (var i = 0; i < articlesData.length; i++) {
      var article = articlesData[i];
      console.log(articlesData);
      // Vérifiez si l'ID correspond à l'ID recherché
      if (article.ID === dataId) {
        article = articlesData[i + 1];
        console.log(article);
        dataId = article.ID;
        if (dataId === 115) {
          dataId = 73;
        } else if (dataId === 73) {
          dataId = 115;
        }
        console.log(dataId);
        // Sélectionnez l'élément avec la classe 'clickPhotoSuiv'
        console.log(article.taxonomy[0].name);
        // Sélectionnez l'élément avec la classe 'clickPhotoSuiv'
        $(".lightbox__container").html("");
        $(".lightbox__container").append(article.thumbnail);

        $(".ref").html("");
        $(".ref").append(article.field);

        $(".therme").html("");
        $(".therme").append(article.taxonomy[0].name);

        $(".lightbox__next").attr("data-id", dataId);
        $(".lightbox__prev").attr("data-id", dataId);
        break; // Arrêtez la boucle
      } else {
      }
    }
  });
});
jQuery(document).ready(function ($) {
  $(".lightbox__prev").click(function () {
    var dataId = parseInt(this.getAttribute("data-id"));
    console.log(dataId);
    // Accéder aux données depuis la variable JavaScript
    for (var i = 0; i < articlesData.length; i++) {
      var article = articlesData[i];
      // Vérifiez si l'ID correspond à l'ID recherché
      if (article.ID === dataId) {
        article = articlesData[i - 1];
        console.log(article);
        console.log(articlesData);
        dataId = article.ID;
        console.log(dataId);
        if (dataId === 115) {
          dataId = 73;
        } else if (dataId === 73) {
          dataId = 115;
        }
        // Sélectionnez l'élément avec la classe 'clickPhotoSuiv'
        console.log(article.taxonomy[0].name);

        $(".lightbox__container").html("");
        $(".lightbox__container").append(article.thumbnail);

        $(".ref").html("");
        $(".ref").append(article.field);

        $(".therme").html("");
        $(".therme").append(article.taxonomy[0].name);

        $(".lightbox__prev").attr("data-id", dataId);
        $(".lightbox__next").attr("data-id", dataId);

        break; // Arrêtez la boucle
      }
    }
  });
});
