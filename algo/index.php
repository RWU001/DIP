<?php
  session_start();
  require('../php/connect.php'); //connection to DB
  $mainDb = $connection;
	$multi_class = $_SESSION['listOfClass'];
	$taskTitle = $_SESSION['taskTitle'];
	$username = $_SESSION['username'];
	
	$sqlQuery2 = "SELECT ID FROM requester_task WHERE TASKTITLE = '$taskTitle'";
	
	if (mysqli_query($mainDb, $sqlQuery2)) {
		$request = mysqli_query($mainDb, $sqlQuery2);
		while($row = $request->fetch_assoc()) {
			$taskID = $row['ID'];
		}
	} else {
			echo "Error: " . $sqlQuery2 . "<br>" . mysqli_error($mainDb);
	}

	$sqlQuery3 = "SELECT * FROM images_library WHERE TASKTITLE = '$taskTitle' AND NOT EXISTS (SELECT 1 FROM finished_images WHERE TASKTITLE = '$taskTitle' AND finished_images.IMAGE_NAME = images_library.IMAGE_NAME) LIMIT 1";
  
	if (mysqli_query($mainDb, $sqlQuery3)) {
		$request = mysqli_query($mainDb, $sqlQuery3);
		$count = mysqli_num_rows($request);
		
		if ($count == 0) {
			$currentQuestionTotal = $_SESSION['currentQuestion'] + 1;
			$pricePerQuestion = $_SESSION['pricePerQuestion'];
			$additionMoney = $currentQuestionTotal * $pricePerQuestion;
			
			// UPDATE WORKER DETAILS
			$sqlQueryUpdateWorker = "UPDATE login_worker SET MONEY_ACCUMULATED = MONEY_ACCUMULATED + '$additionMoney', QUESTION_ANSWERED = QUESTION_ANSWERED + '$currentQuestionTotal' WHERE USERNAME = '$username'";
			mysqli_query($mainDb, $sqlQueryUpdateWorker);
			$_SESSION['money'] += $additionMoney;
			$_SESSION['question1'] += $currentQuestionTotal;
	
			//UPDATE WORKER HISTORY
			$today = getdate();
			$day = $today['mday'];
			$month = $today['mon'];
			$year = $today['year'];
			$date = $day . "-" . $month . "-" . $year;
			$workerHistoryUpdate = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
			VALUES ('$date', '$currentQuestionTotal', '$pricePerQuestion', '$username', '$taskTitle')";
			mysqli_query($mainDb, $workerHistoryUpdate);
	
			unset($_SESSION['numberQuestion']);
			unset($_SESSION['currentQuestion']);
			$_SESSION['message'] = "The task have finished, please choose another task";

			$sqlQuery = "UPDATE requester_task SET COMPLETE = 'YES' WHERE TASKTITLE = '$taskTitle'";
			mysqli_query($mainDb, $sqlQuery);
			header("Location: ../php/queryTaskWorker.php");
			exit;
		}
		while($row = $request->fetch_assoc()) {
			$imageID = $row['ID'];
			$imageName = $row['IMAGE_NAME'];
			$imagePath = $row['IMAGE_PATH'];
		}
	} else {
			echo "Error: " . $sqlQuery3 . "<br>" . mysqli_error($mainDb);
	}

	$input_string = $taskID . " " . $imageID . " ";

	$_SESSION['imagePath'] = $imagePath;
	$_SESSION['imageName'] = $imageName;
	//!!!main part.
	$fin = fopen("matlab_input.txt", "w") or die("Unable to open file!");
	fwrite($fin, $input_string);
	fclose($fin);
	// If the dataset is new (haven't initialized), please intilize first. (see initilize.php for details)
	/*write the input to matlab into "matlab_input.txt", e.g.:
	6 1  0 1 1 0 0 0 0 0 0 0 
	The first value indicates datasetID.
	The second value indicates taskID. (which image in the dataset)
	The following is the answers collected from workers.
	*/



	//After writing the corresponding arguments into matlab_input.txt, call SQS
	//We can get the output of matlab from file "matlab_output.txt".
	//$command = "SQS";
	//system($command);

	
	//The following is how to read the output. (This is just a rough version, you could try to change it for your convenience.)
	//In this version you just need to focus on the two arraies gotten after read: questions and realquestions.
	//In this version, questions and realquestions both are multi-arraies.
	//I give an example to illustrate the structure of them.
	/*
	$question: 3-D array
	{
		{
			{5, 14, 1, 10, 13, 3}, {2, 11, 9, 8, 12, 15, 16, 3, 6, 4, 7}    Worker1's question---two sets
		},

		{
			{6, 9, 3, 2, 4, 15, 16}, {5, 12, 7, 10, 13, 8, 11, 1, 14}		Worker2's question---two sets
		},
		
		{
			{9, 3, 13,}, {8, 15, 14, 12, 6, 4, 2, 5, 1, 11, 7, 16, 10}		Worker3's question---two sets
		}

		.													Worker?...
		.
		.
	}

	$realquestions: 3-D array (it stores the corresponding class names)
	{
		{
			{"Westie", "D", "Dachshund", "A", "D", "Afghan Hound"}, {"Irish Water Spaniel"........"American Pit Bull Terrier"}    												Worker1's question---two sets
		},

		.													 Worker?...
		.
		.
	}
	


	*/
	$questions = [];
	$realquestions = [];
$questionstring = [];
	$fout = fopen("matlab_output.txt", "r") or die("Unable to open file!");
	while (($data = fgetcsv($fout, 1000, "\t")) !== FALSE) {
			foreach($data as $num)
					$numbers[] = (int)$num;
	 }
	 fclose($fout);
	//print_r($numbers);
	$num_worker = $numbers[1];
	$num_element = $numbers[0];
	if ($num_element != 1) {
		for ($work_i = 0; $work_i < $num_worker; $work_i++) {
			array_push($questions,[[],[]]); 
			array_push($realquestions,[[],[]]);
			for ($element_j = 0; $element_j < $num_element; $element_j++){
				array_push($questions[$work_i][$numbers[2+$work_i*$num_element+$element_j]], $numbers[2+$num_worker*$num_element+$element_j]);
			//echo nl2br(2+$work_i*$num_element+$element_j. "\n");
				array_push($realquestions[$work_i][$numbers[2+$work_i*$num_element+$element_j]], $multi_class[$numbers[2+$num_worker*$num_element+$element_j]-1]);
				//echo nl2br($numbers[2+$num_worker*$num_element+$element_j]]-1.  "\n");
			}
		 }

for ($work_i = 0; $work_i < $num_worker; $work_i++) {
	array_push($questionstring,[[],[]]);
	$questionstring[$work_i][0] = "A)&nbsp;";
	$questionstring[$work_i][1] = "B)&nbsp;&nbsp;&nbsp;";
	$size1 = count($questions[$work_i][0]);
	$size2 = count($questions[$work_i][1]);
	for($i=0; $i < $size1-2; $i++){
		$w = $questions[$work_i][0][$i];
			$questionstring[$work_i][0] .= $multi_class[$w-1]. ", ";
	}
	$w = $questions[$work_i][0][$size1-2];
		$questionstring[$work_i][0] .= $multi_class[$w-1]. " ";
	$w = $questions[$work_i][0][$size1-1];
		$questionstring[$work_i][0] .= "or ". $multi_class[$w-1]. ".";
	
	for($i=0; $i < $size2-2; $i++){
		$w = $questions[$work_i][1][$i];
			$questionstring[$work_i][1] .= $multi_class[$w-1]. ", ";
	}
	$w = $questions[$work_i][1][$size2-2];
		$questionstring[$work_i][1] .= $multi_class[$w-1]. " ";
	$w = $questions[$work_i][1][$size2-1];
		$questionstring[$work_i][1] .= "or ". $multi_class[$w-1]. ".";
}

$sqlCheck = "SELECT * FROM questions WHERE TASKTITLE = '$taskTitle' AND IMAGE_NAME = '$imageName'";
$result = mysqli_query($mainDb, $sqlCheck) or die(mysqli_error($mainDb));
$count = mysqli_num_rows($result);

if ($count == 0) {
	for ($work_i = 0; $work_i < $num_worker; $work_i++) {
		$length1 = strlen($questionstring[$work_i][0]);
		$length2 = strlen($questionstring[$work_i][1]);
		if($length1>$length2){
			$questionstring[$work_i][0] = "A) Others";
		}
		else{
			$questionstring[$work_i][1] = "B) Others";
		}
		
		$option1 = $questionstring[$work_i][0] ;
		$option2 = $questionstring[$work_i][1] ;
		//connect to database
		$db = $mainDb;
	
	if (mysqli_connect_errno()) {
		 echo 'Error: Could not connect to database.  Please try again later.';
		 exit;
	}
	
	
	$sql = "INSERT INTO questions (option1, option2, TASKTITLE, IMAGE_NAME)
		VALUES ('$option1', '$option2', '$taskTitle', '$imageName')";
	
	$db->query($sql);
	}
	
	$db->close();
}

	var_dump ($questionstring);


	 //end of main part
	 


$pageContents = <<< EOPAGEC
<!DOCTYPE html>
<html>
<head>
<title>Workplace</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/NTU.png">
<link rel="stylesheet" type="text/css" href="homepage.css">
<script type="text/javascript" src="script.js"></script>
</head>
<body>

<form action="index.php" method="post">
EOPAGEC;

for ($work_i = 0; $work_i < $num_worker; $work_i++) {
$choice_0 = "";
$choice_1 = "";
$length_choice = count($realquestions[$work_i][0]);
if($length_choice > 1){
	for ($i = 0; $i < $length_choice-1; $i++) {
		$choice_0 .= $realquestions[$work_i][0][$i] .", ";
	}
	$choice_0 .=  "or ". $realquestions[$work_i][0][$length_choice-1] . ".";
} else {
	$choice_0 .= $realquestions[$work_i][0][0];
}

$length_choice = count($realquestions[$work_i][1]);
if($length_choice > 1){
	for ($i = 0; $i < $length_choice-1; $i++) {
		$choice_1 .= $realquestions[$work_i][1][$i] .", ";
	}
	$choice_1 .=  "or ". $realquestions[$work_i][1][$length_choice-1] . ".";
} else {
	$choice_1 .= $realquestions[$work_i][1][0];
}




$pageContents .= <<<EOPAGEC
<h1 style="color:red;">Question  $work_i :</h1> <img src= 2.jpg height="60" width="60"/>
<p> Which breed do you think the dog in the image belongs to? </p>
<input type="radio" name="answers[$work_i]" value="0" checked> $choice_0<br>
<input type="radio" name="answers[$work_i]" value="1"> $choice_1<br>
EOPAGEC;
}

$pageContents .= <<<EOPAGEC
<input type="submit" value="Submit">
</form>

</body>
</html>
EOPAGEC;

	 } else {
		 $answer = $numbers[4];
		 echo $answer ;
	 }

//print_r($realquestions);

header("Location: ../php/workplace.php");
?>