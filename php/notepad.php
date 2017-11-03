<?php
  echo "HAHA";
  $directory = "/opt/lampp/htdocs/DIPWebsite/dashboard/upload-file/DIP/txtfile";
  // chmod("/opt/lampp/htdocs/DIPWebsite/dashboard/upload-file/DIP/", 0777);
  if (!file_exists($directory)) {
    mkdir($directory, 0777); //0777 so everyone will have permission to open it
  }

  $notepad_file = "/opt/lampp/htdocs/DIPWebsite/dashboard/upload-file/DIP/txtfile/files.txt";
  $handle = fopen($notepad_file, 'a') or die('Cannot open file:  '.$notepad_file);

  /*
  Structure of the input in the notepad:(assume 2 class with 3 features)
  -$_POST['class1']
  $_POST['feature11']
  $_POST['feature12']
  $_POST['feature13']
  -$_POST['class2']
  $_POST['feature21']
  $_POST['feature22']
  $_POST['feature23']
  */

  $classNumber = (int)$_POST['classNumber'];
  $featureNumber = (int)$_POST['featureNumber'];
  
  for ($class = 1; $class <= $classNumber; $class++) {
    $classdata = '-'.$_POST['class' . $class] . "\n";
    fwrite($handle, $classdata);
    echo $classdata;

    for ($feature = 1; $feature <= $featureNumber; $feature++) {
      $featuredata = $_POST['feature' . $class . $feature] . "\n";
      fwrite($handle, $featuredata);
      echo $featuredata;
    }
  }
  fclose($handle); //close the notepad

  $notepad_file = "/opt/lampp/htdocs/DIPWebsite/dashboard/upload-file/DIP/txtfile/files.txt";
  $handle = fopen($notepad_file, 'r') or die('Cannot open file:  '.$notepad_file);
  echo fread($handle, filesize($notepad_file));
  fclose($handle); //close the notepad
?>