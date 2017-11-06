function createListClass() {
  classNumber = parseInt(document.getElementById('numberOfClasses').value);
  featuresNumber = parseInt(document.getElementById('numberOfFeatures').value);
  
  //check classNumber and featuresNumber valid
  if (!classNumber || !featuresNumber || classNumber <=0 || featuresNumber <= 0) {
    alert("Please fill the number of class and feature correctly!");
  } else {
    var detailClass = document.getElementById('detailClass');
    var class_feature = '<tr id="space"><td></td><td></td></tr>';
    class_feature += '<tr><td id="table-header">Name of Class</td><td id="table-header">Features of Class</td></tr>';
    for (var numclass = 0; numclass < classNumber; numclass++) {
      class_feature += '<tr id="space"><td>Class ' + (numclass+1) + '</td><td></td></tr>';
      class_feature += '<tr><td rowspan="' + featuresNumber + '"><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '"></td>';
      class_feature += '<td><input type="text" name="feature' + numclass + "0" + '" placeholder="feature' + numclass + "0" + '"></td></tr>';
      for (var numfeature = 1; numfeature < featuresNumber; numfeature++) {
        class_feature += '<tr><td><input type="text" name="feature' + numclass + numfeature + '" placeholder="feature'+ numclass + numfeature + '"></td></tr>';
      }
      class_feature += '<tr id="space"><td></td><td></td></tr>';
      class_feature += '<tr id="space"><td></td><td></td></tr>';
    }
    detailClass.innerHTML += class_feature;
    document.getElementById('numberOfFeatures').value = featuresNumber;
    document.getElementById('numberOfClasses').value = classNumber;
    document.getElementById('createDetails').style.display = 'none';
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
  NOTE THAT number of features for every class must be equal
  `);
}

///////////////////////////////READ TXT FILE//////////////////
var reader; //GLOBAL File Reader object for demo purpose only

/**
 * Check for the various File API support.
 */
function checkFileAPI() {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        reader = new FileReader();
        return true; 
    } else {
        alert('The File APIs are not fully supported by your browser. Fallback required.');
        return false;
    }
}

/**
 * read text input
 */
function readText(filePath) {
    var output = ""; //placeholder for text output
    if(filePath.files && filePath.files[0]) {           
        reader.onload = function (e) {
            output = e.target.result;
            // displayContents(output);
            setDetails(output);
        };//end onload()
        reader.readAsText(filePath.files[0]);
    }//end if html5 filelist support
    else if(ActiveXObject && filePath) { //fallback to IE 6-8 support via ActiveX
        try {
            reader = new ActiveXObject("Scripting.FileSystemObject");
            var file = reader.OpenTextFile(filePath, 1); //ActiveX File Object
            output = file.ReadAll(); //text contents of file
            file.Close(); //close file "input stream"
            setDetails(output);
            // displayContents(output);
            // console.log(output + "HAHA");
        } catch (e) {
            if (e.number == -2146827859) {
                alert('Unable to access local files due to browser security settings. ' + 
                'To overcome this, go to Tools->Internet Options->Security->Custom Level. ' + 
                'Find the setting for "Initialize and script ActiveX controls not marked as safe" and change it to "Enable" or "Prompt"'); 
            }
        }       
    }
    else { //this is where you could fallback to Java Applet, Flash or similar
        return false;
    }       
    return true;
}   

/**
 * display content using a basic HTML replacement
 */
function displayContents(txt) {
    var el = document.getElementById('main'); 
    el.innerHTML = txt; //display output in DOM
}

function setDetails(txt) {
  var classNumber = 0;
  var featuresNumber = 0;
  var classes = [];
  var features = [];
  var strings = ""; //temp strings

  var stringarray = txt.split("\n");
  for (var i = 0; i < stringarray.length; i++) {
    if (stringarray[i][0] == "-") {
      classes.push(stringarray[i].substring(1));
      classNumber++;
      featuresNumber = 0;
    } else {
      if (features[classNumber - 1] == undefined) {
        features.push([]);
      }
      features[classNumber - 1][featuresNumber] = stringarray[i];
      featuresNumber++;
    }
  }
  console.log(classNumber, featuresNumber);

  var detailClass = document.getElementById('detailClass');
  var class_feature = '<tr id="space"><td></td><td></td></tr>';
  class_feature += '<tr><td id="table-header">Name of Class</td><td id="table-header">Features of Class</td></tr>';

  for (var numclass = 0; numclass < classNumber; numclass++) {
    class_feature += '<tr id="space"><td>Class ' + (numclass+1) + '</td><td></td></tr>';
    class_feature += '<tr><td rowspan="' + featuresNumber + '"><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '" value="' + classes[numclass] + '"></td>';
    class_feature += '<td><input type="text" name="feature' + numclass + "0" + '" placeholder="feature' + numclass + "0" + '" value="' + features[numclass][0] + '"></td></tr>';
    for (var numfeature = 1; numfeature < featuresNumber; numfeature++) {
      class_feature += '<tr><td><input type="text" name="feature' + numclass + numfeature + '" placeholder="feature'+ numclass + numfeature + '" value="' + features[numclass][numfeature] + '"></td></tr>';
    }
    class_feature += '<tr id="space"><td></td><td></td></tr>';
    class_feature += '<tr id="space"><td></td><td></td></tr>';
  }
  detailClass.innerHTML += class_feature;
  document.getElementById('numberOfFeatures').value = featuresNumber;
  document.getElementById('numberOfClasses').value = classNumber;
}
/////////////////////////////////////////////////////////////