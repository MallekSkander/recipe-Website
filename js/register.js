canc.addEventListener("click", function () {
  window.location.href = "index.html";
});

conf.addEventListener("click", function () {
  form.submit();
});

// This function calls to log the user out.
$("#confirm").click(function () {
  $.ajax({
    url: "../manage_user.php",
    type: "post",
    data: { action: "submit_data" },
  }).done(function () {
    form.submit();
  });
});
