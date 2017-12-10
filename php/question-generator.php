<?php
  session_start();
  require('connect.php'); //connection to DB
  $mainDb = $connection;

  $numberQuestion = $_POST['numberQuestion'];
  $taskTitle = $_POST['taskTitle'];

  $sqlQuery1 = "SELECT TXT_PATH, PRICE_PER_QUESTION FROM requester_task WHERE TASKTITLE = '$taskTitle' LIMIT 1";

  if (mysqli_query($mainDb, $sqlQuery1)) {
    $request = mysqli_query($mainDb, $sqlQuery1);
    while($row = $request->fetch_assoc()) {
      $txtPath = $row['TXT_PATH'];
      $pricePerQuestion = $row['PRICE_PER_QUESTION'];
    }
  } else {
      echo "Error: " . $sqlQuery1 . "<br>" . mysqli_error($mainDb);
  }

  $myfile = fopen($txtPath, "r") or die("Unable to open file!");
  $txtData = explode("\n" ,fread($myfile,filesize($txtPath)));
  fclose($myfile);

  // print_r($txtData);

  $_SESSION['listOfClass'] = $txtData;
  $_SESSION['taskTitle'] = $taskTitle;
  $_SESSION['pricePerQuestion'] = $pricePerQuestion;

  print_r($_SESSION['listOfClass']);

  if (!isset($_SESSION['numberQuestion'])) {
    $_SESSION['numberQuestion'] = $numberQuestion;
  }

  if (!isset($_SESSION['currentQuestion'])) {
    $_SESSION['currentQuestion'] = 0;
  }

  header("Location: ../algo/index.php");
?>