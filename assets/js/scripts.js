// Get the modal
window.onload = function () {
  var modal = document.getElementById("myModal");
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  var btn2 = document.getElementById("menu-item-46");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  // When the user clicks on the button, open the modal
  btn.onclick = function () {
    modal.style.display = "block";
  };
  btn2.onclick = function () {
    modal.style.display = "block";
  };
  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  };
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
};
$(document).ready(function () {
  $(".button_grey").click(function () {
    $reference = $(".ref_text").text();
    $('input[name="ref"]').val($reference);
  });
});
$(document).ready(function () {
  $("#menu-item-46").click(function () {
    $reference = $(".ref_text").text();
    $('input[name="ref"]').val($reference);
  });
});
