const home_d = document.getElementById("home");
const acc_details_d = document.getElementById("details");
const acc_security_d = document.getElementById("security");

home_d.addEventListener("click", function () {
  window.location.href = "index.html";
});

acc_details_d.addEventListener("click", function () {
  window.location.href = "profile_edit.php";
});

acc_security_d.addEventListener("click", function () {
  window.location.href = "profile_security.php";
});

// This function calls to log the user out.
$("#logout").click(function () {
  $.ajax({
    url: "../Helpers/manage_session.php",
    type: "post",
    data: { action: "kill_session" },
  }).done(function () {
    window.location.href = "index.html";
  });
});

// This function calls to log the user out.
$("#admin-dash").click(function () {
  window.location.href = "admin_profiles.php";
});

// This function calls to log the user out.
$("#history").click(function () {
  window.location.href = "history.php";
});

$("#delete").click(function () {
  $.ajax({
    url: "../Helpers/manage_session.php",
    type: "POST",
    data: { action: "delete_user" },
    success: function () {
      window.location.href = "index.html";
    },
    fail: function () {
      alert("ERROR: The server was unable to delete your account.");
    },
  });
});
