<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "DIP_CROWDSOURCING";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $userName = $_SESSION['username'];

  $sql = "SELECT * FROM requester_task WHERE USER='" . $userName . "'";
  
  if (mysqli_query($conn, $sql)) {
    $request = mysqli_query($conn, $sql);
    $all_query = "";
    while($row = $request->fetch_assoc()) {
      $all_query = $all_query . "<tr>";
      $all_query = $all_query . "<td><center><font color='green'>" . $row['TASKTITLE'] . "</font></center></td>";
      $all_query = $all_query . "<td><center>" . $row['COMPLETION_OF_TASK'] . "</center></td>";
      $all_query = $all_query . "<td><center><font color='red'>" . $row['PAYMENT_PROCESS'] . "</font></center></td>";
      $all_query = $all_query . "<td><center><button>Download</button></center></td>";
      $all_query = $all_query . "<tr>";
    }
    $_SESSION['querytask'] = $all_query;
    header("Location: ../html/requester-home.html");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }  
?>