<?php
  session_start();
  require('connect.php');
  
  $userName = $_SESSION['username'];

  $sql = "SELECT * FROM requester_task WHERE USER='" . $userName . "'";
  
  if (mysqli_query($connection, $sql)) {
    $request = mysqli_query($connection, $sql);
    $all_query = "";
    while($row = $request->fetch_assoc()) {
      $title = $row['TASKTITLE'];
      $all_query = $all_query . "<tr>";
      $all_query = $all_query . "<td><center><font color='green'>$title</font></center></td>";
      $sign = $row['COMPLETION_OF_TASK'];
      if ($sign == '&#x2716') {
        $all_query = $all_query . "<td><center style='color:red'>" . $row['COMPLETION_OF_TASK'] . "</center></td>";
      } else {
        $all_query = $all_query . "<td><center style='color:green'>" . $row['COMPLETION_OF_TASK'] . "</center></td>";
      }
      $all_query = $all_query . "<td><center><font color='red'>" . $row['PAYMENT_PROCESS'] . "</font></center></td>";

      $queryLibrary = "SELECT * FROM `images_library` WHERE tasktitle='$title' and username='$userName'";
      $resultLibrary = mysqli_query($connection, $queryLibrary) or die(mysqli_error($connection));
      $countLibrary = mysqli_num_rows($resultLibrary);
      $queryFinished = "SELECT * FROM `finished_images` WHERE tasktitle='$title'";
      $resultFinished = mysqli_query($connection, $queryFinished) or die(mysqli_error($connection));
      $countFinished = mysqli_num_rows($resultFinished);

      if ($countFinished == $countLibrary) {
        $button = "downloadResult(123)";
        $all_query = $all_query . "<td><center><button onclick='" . 'downloadResult("' . $title . '")' . "'>Download</button></center></td>";
      } else {
        $all_query = $all_query . "<td></td>";
      }
      $all_query = $all_query . "</tr>";
    }
    $_SESSION['querytask'] = $all_query;
    header("Location: ../html/requester-home.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }  
?>