function createListClass(e) {
  classNumber = parseInt(document.getElementById('number-of-classes').value);
  featuresNumber = parseInt(document.getElementById('number-of-features').value);
  
  //check classNumber and featuresNumber valid
  if (!classNumber || !featuresNumber || classNumber <=0 || featuresNumber <= 0) {
    alert("Please fill the number of class and feature correctly!");
  }

  var classes = 'class';
  var feature = 'feature';

  var a = document.getElementById('demo');
  a.innerHTML = "";

  for (var numclass = 1; numclass <= classNumber; numclass++) {
    a.innerHTML += 'Your number ' + numclass + ' class is : <input type="text" name="' + classes + numclass + '" placeholder="' + classes + numclass + '">';
    a.innerHTML += '\n<ul>\n';
    for (var numfeature = 1; numfeature <= featuresNumber; numfeature++) {
      a.innerHTML += '<li>Feature ' + numfeature + ': <input type="text" name="' + feature + numclass + numfeature + '" placeholder="' + feature + numfeature + '"></li>';
    }
    a.innerHTML += '\n</ul>\n <br><br>';
  }
  console.log(classNumber + featuresNumber);
}