<?php
  session_start();
  require('connect.php');
  
  $userName = $_SESSION['username'];

  $sql = "SELECT * FROM worker_history WHERE USERNAME='" . $userName . "'";
  
  if (mysqli_query($connection, $sql)) {
    $request = mysqli_query($connection, $sql);
    $all_query = "";
    while($row = $request->fetch_assoc()) {
      $title = $row['TASKTITLE'];
      $date = $row['DATE_SUBMISSION'];
      $noQues = $row['NUMBER_OF_QUESTIONS'];
      $reward = $row['REWARD_EACH_QUESTION'];

      $all_query = $all_query . "<tr>";
      $all_query = $all_query . "<td><center><font color='green'>$date</font></center></td>";
      $all_query = $all_query . "<td><center>$noQues</center></td>";
      $all_query = $all_query . "<td><center>$$reward</center></td>";
      $all_query = $all_query . "<td><center>$" . $reward*$noQues . "</center></td>";
      $all_query = $all_query . "<td><center>$title</center></td>";
    }
    $_SESSION['queryHistory'] = $all_query;
    header("Location: ../html/worker-history.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }  
?>