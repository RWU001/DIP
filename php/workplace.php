<?php
  session_start();
  require('connect.php'); //connection to DB
  $mainDb = $connection;

  $arrayImages = array(
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog111.jpeg\" style=\"width:300px;\" id=\"shownPicture\">", 
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog222.jpg\" style=\"width:300px;\" id=\"shownPicture\">",
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog333.jpeg\" style=\"width:300px;\" id=\"shownPicture\">",
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog444.jpg\" style=\"width:300px;\" id=\"shownPicture\">",
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog555.png\" style=\"width:300px;\" id=\"shownPicture\">",
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog666.jpg\" style=\"width:300px;\" id=\"shownPicture\">",
    "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog777.jpg\" style=\"width:300px;\" id=\"shownPicture\">"
  );

  $numberQuestion = $_POST['numberQuestion'];

  if (!isset($_SESSION['numberQuestion'])) {
    $_SESSION['numberQuestion'] = $numberQuestion;
  }

  if (!isset($_SESSION['currentQuestion'])) {
    $_SESSION['currentQuestion'] = 1;
  } elseif ($_SESSION['currentQuestion'] == $_SESSION['numberQuestion']){
    echo "<script> alert('You have finished the session')";
    unset($_SESSION['numberQuestion']);
    unset($_SESSION['currentQuestion']);
    header("Location: ../php/queryTaskWorker.php");
    exit;
  } else {
    $_SESSION['currentQuestion'] = $_SESSION['currentQuestion'] + 1;
  }

  $number = $_SESSION['currentQuestion']%7;
  $_SESSION['imagesShown'] = $arrayImages[$number];
  header("Location: ../html/workplace-mock.php");
?>