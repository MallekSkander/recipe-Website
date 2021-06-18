// This function hides specific items when the user
// is logged in/logged out.
$(document).ready(function () {
  $.ajax({
    url: "../manage_session.php",
    type: "post",
    dataType: "json",
    data: { action: "get_username" },
  })
    .done(function (result) {
      if (result.username == "") {
        $("#item_profile").css("display", "none");
      } else {
        $("#item_login").css("display", "none");
        $("#item_register").css("display", "none");
      }
    })
    .fail(function () {
      $("#item_profile").css("display", "none");
    });
});

// This function logs the user out
// when the logout item is clicked
$("#item_logout").click(function () {
  $.ajax({
    url: "../manage_saession.php",
    type: "post",
    data: { action: "kill_session" },
  }).done(function () {
    window.location.href = "home";
  });
});
