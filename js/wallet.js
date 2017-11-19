var counterWallet = 0;
function myFunction() {
  var x = document.getElementById("myDIV");
  if (counterWallet === 0) {
			x.style.visibility = "hidden";
			counterWallet++;
  } else {
			x.style.visibility = "visible";
			counterWallet = 0;
  }
}
myFunction();


var counterWallet2 = 0;
function myFunction2() {
  var x = document.getElementById("myDIV2");
  if (counterWallet2 === 0) {
			x.style.visibility = "hidden";
			counterWallet2++;
  } else {
			x.style.visibility = "visible";
			counterWallet2 = 0;
  }
}