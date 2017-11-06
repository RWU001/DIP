<?php
  $directory = "/opt/lampp/htdocs/DIPWebsite/dashboard/develop/taskfiles/"; //Change to your own directory
  if (!file_exists($directory)) {
    mkdir($directory, 0777); //0777 so everyone will have permission to open it
  }

  $notepad_file = $directory."fileso.txt"; //change to your own directory
  $handle = fopen($notepad_file, 'w') or die('Cannot open file:  '.$notepad_file);

  /*
  Structure of the input in the notepad:(assume 2 class with 3 features)
  -$_POST['class0']
  $_POST['feature01']
  $_POST['feature02']
  $_POST['feature03']
  -$_POST['class1']
  $_POST['feature11']
  $_POST['feature12']
  $_POST['feature13']
  */

  $classNumber = (int)$_POST['classNumber'];
  $featureNumber = (int)$_POST['featureNumber'];
  
  for ($class = 0; $class < $classNumber; $class++) {
    echo $_POST['class0'];
    $classdata = '-'.$_POST['class' . $class] . "\n";
    fwrite($handle, $classdata);
    echo $classdata;

    for ($feature = 0; $feature < $featureNumber; $feature++) {
      $featuredata = $_POST['feature' . $class . $feature] . "\n";
      fwrite($handle, $featuredata);
      echo $featuredata;
    }
  }
  fclose($handle); //close the notepad

  chmod($notepad_file, 0777);
  $handle = fopen($notepad_file, 'r') or die('Cannot open file:  '.$notepad_file);
  echo fread($handle, filesize($notepad_file));
  fclose($handle); //close the notepad
?>