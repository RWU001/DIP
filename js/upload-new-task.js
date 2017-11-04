function createListClass() {
  classNumber = parseInt(document.getElementById('numberOfClasses').value);
  featuresNumber = parseInt(document.getElementById('numberOfFeatures').value);
  
  //check classNumber and featuresNumber valid
  if (!classNumber || !featuresNumber || classNumber <=0 || featuresNumber <= 0) {
    alert("Please fill the number of class and feature correctly!");
  } else {
    var classes = 'class';
    var feature = 'feature';
  
    var a = document.getElementById('detailClass');
    var class_feature = '<tr id="space"><td></td><td></td></tr>';
    class_feature += '<tr><td id="table-header">Name of Class</td><td id="table-header">Features of Class</td></tr>';
    for (var numclass = 1; numclass <= classNumber; numclass++) {
      class_feature += '<tr id="space"><td>Class ' + numclass + '</td><td></td></tr>';
      class_feature += '<tr>';
      class_feature += '<td rowspan="' + featuresNumber + '"><input type="text" name="' + classes + numclass + '" placeholder="' + classes + numclass + '"></td><td><input type="text" name="' + feature + numclass + "1" + '" placeholder="' + feature + numclass + "1" + '"></td></tr>';
      for (var numfeature = 2; numfeature <= featuresNumber; numfeature++) {
        class_feature += '<tr><td><input type="text" name="' + feature + numclass + numfeature + '" placeholder="' + feature + numclass + numfeature + '"></td></tr>';
      }
      class_feature += '<tr id="space"><td></td><td></td></tr>';
      class_feature += '<tr id="space"><td></td><td></td></tr>';
    }
    a.innerHTML += class_feature;
    document.getElementById('createTask').style.display = 'none';
    // console.log(classNumber + featuresNumber);
  }
  
}

function helpButton() {
  alert(`This upload txt file button allows you to uplaod a txt file and will automatically fill the form below with structure like:
    -(name of class ex.Dog)
    (feature1 Dogs)
    (feature2 Dogs)
    (feature2 Dogs)
    -(name of another class ex.Cat)
    (feature1 Cat)
    (feature2 Cat)
    (feature2 Cat)
  `);
}