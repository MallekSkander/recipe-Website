$("#clear").click(function () {
  $.ajax({
    url: "../Helpers/manage_session.php",
    type: "POST",
    data: { action: "clear_history" },
    success: function () {
      window.location.href = "history.php";
    },
    fail: function () {
      alert("ERROR: The server was unable to clear your history.");
    },
  });
});

$("#back").click(function () {
  window.location.href = "profile.php";
});
