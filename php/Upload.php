<?php
//This file will receive ONLY uploaded ZIP file and will extract it to a new unique folder name inside folder name zip_file and will update the database 
//to save the name of the folder according to the task and the username(update database have not implemented)

if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];

	///////////////////INITIALIZATION///////////////////
	$your_own_path = "/opt/lampp/htdocs/test/zip_file/"; //Change this to your own directory folder. This folder path will be a folder which contain lots of taskfolders(each task will have one folder)
	
	if (substr($type,-3) == 'zip') { //IF THE FILE IS NOT ZIP FILE
		$name = explode(".", $filename);
		$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
		foreach($accepted_types as $mime_type) {
			if($mime_type == $type) {
				$okay = true;
				echo nl2br("Breakpoint 1. \n");
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
				$zip->extractTo($your_own_path . " $filename"); // change this to the correct site path
				$zip->close();
		
				unlink($target_path);
			}
			$message = "Your .zip file was uploaded and unpacked.";
			$list_file_path .= substr($source, -9);
			echo $list_file_path;
		} else {	
			$message = "There was a problem with the upload. Please try again.";
		}
		if($message) echo "<p>$message</p>"; 
	} else {
		echo "THE FILE IS NOT A ZIP FILE";
	}
}
	
?>