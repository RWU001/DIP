<?php
  session_start();
  require('connect.php');
  
  $userName = $_SESSION['username'];

  $sql = "SELECT * FROM requester_task WHERE USER='" . $userName . "'";
  
  if (mysqli_query($connection, $sql)) {
    $request = mysqli_query($connection, $sql);
    $all_query = "";
    while($row = $request->fetch_assoc()) {
      $all_query = $all_query . "<tr>";
      $all_query = $all_query . "<td><center><font color='green'>" . $row['TASKTITLE'] . "</font></center></td>";
      $all_query = $all_query . "<td><center>" . $row['COMPLETION_OF_TASK'] . "</center></td>";
      $all_query = $all_query . "<td><center><font color='red'>" . $row['PAYMENT_PROCESS'] . "</font></center></td>";

      $queryLibrary = "SELECT * FROM `images_library` WHERE tasktitle='" . $row['TASKTITLE'] . "'";
      $resultLibrary = mysqli_query($connection, $queryLibrary) or die(mysqli_error($connection));
      $countLibrary = mysqli_num_rows($resultLibrary);
      $queryFinished = "SELECT * FROM `finished_images` WHERE tasktitle='" . $row['TASKTITLE'] . "'";
      $resultFinished = mysqli_query($connection, $queryFinished) or die(mysqli_error($connection));
      $countFinished = mysqli_num_rows($resultFinished);

      if ($countFinished == $countLibrary) {
        $all_query = $all_query . "<td><center><button>Download</button></center></td>";
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