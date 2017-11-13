function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
      x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}
myFunction();

function downloadResult(taskTitle) {
  window.location = "../php/download-result.php?test=" + taskTitle;
}