<?php
//////////////////////INITIALIZE///////////////////////////////////
  session_start();
  require('connect.php');//Database connection
  require('problem-delete.php');
  $mainDb = $connection;

  $taskTitle = $_POST['taskTitle'];
  $taskBudget = $_POST['taskBudget'];
  $taskReward = $_POST['taskReward'];
  $taskDescription = $_POST['taskDescription'];
  $userName = $_SESSION['username'];
  $wallet = $_SESSION['wallet'];

  /////////////////////////DIRECTORY////////////////////////////////////////  
  $directory = "/opt/lampp/htdocs/DIPWebsite/dashboard/develop/taskfiles/". $userName . "/"; //Change to your own directory
  if (!file_exists($directory)) {
    $oldmask = umask(0);
    mkdir($directory, 0777); //0777 so everyone will have permission to open it also can delete the folder
    umask($oldmask);
  }
  
  $directory .= $taskTitle . "/"; //Change to your own directory
  if (!file_exists($directory)) {
    $oldmask = umask(0);
    mkdir($directory, 0777); //0777 so everyone will have permission to open it also can delete the folder
    umask($oldmask);
  }


///////////////////////////////////////////DEDUCT THE WALLET//////////////////////////////////
if ($wallet < $taskBudget) {
  $_SESSION['errorMessage'] = "Insufficient Balance";
  header("Location: error-message.php");
  exit;
}
$deductWallet = "UPDATE login_requester SET WALLET=WALLET-'$taskBudget' WHERE USERNAME='" . $userName . "'";
mysqli_query($mainDb, $deductWallet);
$_SESSION['wallet'] -= $taskBudget;


/////////////////////////////////////////////EXTRACT THE ZIP FILE////////////////////////////////////////////
//This file will receive ONLY uploaded ZIP file and will extract it to a new unique folder name inside folder name zip_file and will update the database 
//to save the name of the folder according to the task and the username(update database have not implemented)

if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];

	// $your_own_path = "/opt/lampp/htdocs/DIPWebsite/dashboard/upload-file/DIP/zip-files/"; //Change this to your own directory folder. This folder path will be a folder which contain lots of taskfolders(each task will have one folder)
	$your_own_path = $directory;
	if (substr($type,-3) == 'zip') { //IF THE FILE IS NOT ZIP FILE
		$name = explode(".", $filename);
		$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
		foreach($accepted_types as $mime_type) {
			if($mime_type == $type) {
				$okay = true;
				break;
			} 
		}
		
		$continue = strtolower($name[1]) == 'zip' ? true : false;
		if(!$continue) {
			$message = "The file you are trying to upload is not a .zip file. Please try again.";
		}

		//create the folder if the folder does not exist
		$target_path = $your_own_path;
		if (!file_exists($target_path)) {
			mkdir($target_path, 0777); //0777 so everyone will have permission to open it
		}
		
		$list_file_path = $target_path;
		$target_path = $your_own_path . $filename;  // change this to the correct site path
		
		if(move_uploaded_file($source, $target_path)) {
			$zip = new ZipArchive();
			$x = $zip->open($target_path);
			if ($x === true) {
				$filename = substr($source, -9);
				$zip->extractTo($your_own_path . 'images'); // change this to the correct site path
				$zip->close();
        $your_own_path .= 'images/';
        chmod($your_own_path, 0777); //ENABLE deleting the folder for everyone (some delete issue)
        deleteDirectory($your_own_path . "__MACOSX");
				unlink($target_path);
			}
			$message = "Your .zip file was uploaded and unpacked.";
			echo $list_file_path;
		} else {	
			$message = "There was a problem with the upload. Please try again.";
		}
		if($message) echo "<p>$message</p>"; 
	} else {
		echo "THE FILE IS NOT A ZIP FILE";
	}
}

//////////////////////////////////////////////CREATE TEXT FILE////////////////////////////////

  $notepad_file = $directory . $taskTitle . ".txt"; //change to your own directory
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
    $classdata = '-'.$_POST['class' . $class] . "\n";
    fwrite($handle, $classdata);
    echo $classdata;

    for ($feature = 0; $feature < $featureNumber; $feature++) {
      if ($feature == $featureNumber - 1 and $class == $classNumber - 1) {
        $featuredata = $_POST['feature' . $class . $feature];
      } else {
        $featuredata = $_POST['feature' . $class . $feature] . "\n";
      }
      fwrite($handle, $featuredata);
      echo $featuredata;
    }
  }
  fclose($handle); //close the notepad

  chmod($notepad_file, 0777);
  $handle = fopen($notepad_file, 'r') or die('Cannot open file:  '.$notepad_file);
  echo fread($handle, filesize($notepad_file));
  fclose($handle); //close the notepad


////////////////////////////////////////////QUERY A NEW TASK//////////////////////////////
$sqlQuery = "INSERT INTO requester_task (ID, USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', '$userName', '$taskTitle', '$taskReward', '$taskBudget', '$your_own_path', '$notepad_file', '$taskDescription')";
$result3 = mysqli_query($mainDb, $sqlQuery);

///////////////////////////////////////////////QUERT THE IMAGES name and path to database//////////////////////////////////
$imagePath = $your_own_path;
$directorySrc = "../taskfiles/" . $userName . "/" . $taskTitle . "/images/";
$files1 = scandir($imagePath);
echo "<br><br><br>";
  foreach($files1 as $picsName) {
    if ($picsName[0] != ".") {
      $image = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
      VALUES ('', '$picsName', '$directorySrc" . "$picsName', '$taskTitle', '$userName')";
      mysqli_query($mainDb, $image);
    } 
  }


///////////////////back to page////////////////////
header("Location: querytask.php");
?>