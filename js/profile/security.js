// This script depends on constants found in the shared library

// Stop form resubmission on refresh
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

canc.addEventListener("click", function () {
  window.location.href = "profile.php";
});

conf.addEventListener("click", function () {
  form.submit();
});
