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

  $sql = "SELECT * FROM requester_task";
  
  if (mysqli_query($conn, $sql)) {
    $request = mysqli_query($conn, $sql);
    $all_query = "";
    $number = 0;
    while($row = $request->fetch_assoc()) {
      $taskTitle = $row['TASKTITLE'];
      $taskDesc = $row['TASK_DESCRIPTION'];
      $taskPrice = sprintf('%0.2f', $row['PRICE_PER_QUESTION']);
      $all_query .= "<div class='QueryTaskWorker'><p><span onclick=\"document.getElementById('test').value = 'HAHA';\" class='workerQueryTitle'>$taskTitle</span><span class='pricePerQuestion'>Price per question: $$taskPrice</span></p><p class='workerQueryDescription'>$taskDesc</p></div>";
    }
    $all_query .= '<input type="text" name="taskTitle" style="visibility: hidden;" id="test" required/>';
    $_SESSION['queryTaskWorker'] = $all_query;
    header("Location: ../html/worker-home.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }  
?>