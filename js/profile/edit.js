// This script depends on constants found in the shared library

canc.addEventListener("click", function () {
  window.location.href = "profile.php";
});

conf.addEventListener("click", function () {
  form.submit();
});

form.addEventListener("submit", (event) => {
  event.preventDefault();
});

// This function calls to log the user out.
$("#confirm").click(function () {
  $.ajax({
    url: "/Helpers/manage_user.php",
    type: "post",
    data: { action: "submit_data" },
  }).done(function () {
    form.submit();
  });
});

// Replace FOO
/*var val = 'FOO';
$('#btn').on('click', function() {
  $('#sel').val(val);
});*/
