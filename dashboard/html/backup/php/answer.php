<?php
//define the variables
$nameErr = "You have not answer this";
$question1 = $question2 = $question3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["question1"])) {
  	return ;
  } else {
    $question1 = $_POST["question1"];
  }
  
  if (empty($_POST["question2"])) {
    return ;
  } else {
    $question2 = $_POST["question2"];
  }

  if (empty($_POST["question3"])) {
    return ;
  } else {
    $question3 = $_POST["question3"];
  }
  echo "<p>" . $question1;
  echo "<p>" . $question2;
  echo "<p>" . $question3;
}
?>