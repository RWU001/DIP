<?php
  session_start();
  require('connect.php'); //connection to DB
  $mainDb = $connection;
  $imageName = $_SESSION['imageName'];
  $taskTitleReal = $_SESSION['taskTitle'];
  $username = $_SESSION['username'];
  $answer = explode(".", $imageName)[0];
  echo $imageName;

  $sqlQuery2 = "SELECT ID, option1, option2, TASKTITLE, IMAGE_PATH FROM questions LIMIT 1";
	
	if (mysqli_query($mainDb, $sqlQuery2)) {
    $request = mysqli_query($mainDb, $sqlQuery2);
    $count = mysqli_num_rows($request);
    if ($count == 0) {

      $sqlQueryCheck = "SELECT * FROM finished_images WHERE TASKTITLE = '$taskTitleReal' AND IMAGE_NAME = '$imageName'";

      if (mysqli_query($mainDb, $sqlQueryCheck)) {
        $request = mysqli_query($mainDb, $sqlQueryCheck);
        $count1 = mysqli_num_rows($request);

        if ($count1 == 0) {
          $sqlUpdate = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
          VALUES ('$imageName', '$taskTitleReal', '$answer')";
          mysqli_query($mainDb, $sqlUpdate);
          header("Location: ../algo/index.php");
          echo "HA";
          exit;
        }
        // header("Location: ../algo/index.php");
        echo $imageName;
        exit;
      }
    }

		while($row = $request->fetch_assoc()) {
      $workerID = $row['ID'];
      $option1 = $row['option1'];
      $option2 = $row['option2'];
      $imagePath = $row['IMAGE_PATH'];
      $imageName = $row['IMAGE_NAME'];
    }
    
	} else {
			echo "Error: " . $sqlQuery2 . "<br>" . mysqli_error($mainDb);
  }
  
  $_SESSION['option1'] = $option1;
  $_SESSION['option2'] = $option2;
  $_SESSION['imagePath'] = $imagePath;
  if ($imageName != '') {
    $_SESSION['imageName'] = $imageName;
  }

  $sqlDelete = "DELETE FROM questions WHERE ID = '$workerID'";
  mysqli_query($mainDb, $sqlDelete);

  if ($_SESSION['currentQuestion'] == $_SESSION['numberQuestion']){
    $pricePerQuestion = $_SESSION['pricePerQuestion'];
    $additionMoney = $_SESSION['numberQuestion']*$_SESSION['pricePerQuestion'];
    $numberQuestion = $_SESSION['numberQuestion'];
    
    // UPDATE WORKER DETAILS
    $sqlQueryUpdateWorker = "UPDATE login_worker SET MONEY_ACCUMULATED = MONEY_ACCUMULATED + '$additionMoney', QUESTION_ANSWERED = QUESTION_ANSWERED + '$numberQuestion' WHERE USERNAME = '$username'";
    mysqli_query($mainDb, $sqlQueryUpdateWorker);
    $_SESSION['money'] += $additionMoney;
    $_SESSION['question1'] += $numberQuestion;

    //UPDATE WORKER HISTORY
    $today = getdate();
    $day = $today['mday'];
    $month = $today['mon'];
    $year = $today['year'];
    $date = $day . "-" . $month . "-" . $year;
    $workerHistoryUpdate = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
    VALUES ('$date', '$numberQuestion', '$pricePerQuestion', '$username', '$taskTitleReal')";
    mysqli_query($mainDb, $workerHistoryUpdate);

    unset($_SESSION['numberQuestion']);
    unset($_SESSION['currentQuestion']);
    header("Location: ../php/queryTaskWorker.php");
    exit;
  } else {
    $_SESSION['currentQuestion'] = $_SESSION['currentQuestion'] + 1;
  }

  header("Location: ../html/workplace-mock.php");
?>