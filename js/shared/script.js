const conf = document.getElementById("confirm");
const canc = document.getElementById("cancel");
const form = document.querySelector("form");

function isEmpty(obj) {
  return Object.keys(obj).length === 0;
}

document.addEventListener("keyup", function (event) {
  if (event.code === "Enter") {
    form.submit();
  }
});

// Stop form resubmission after refresh (very helpful!)
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
