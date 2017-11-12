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
      $all_query .= "<div class='QueryTaskWorker'><p><span onclick=fillTest('$taskTitle') class='workerQueryTitle'>$taskTitle</span><span class='pricePerQuestion'>Price per question: $$taskPrice</span></p><p class='workerQueryDescription'>$taskDesc</p></div>";
    }
    // while($row = $request->fetch_assoc()) {
    //   $taskTitle = $row['TASKTITLE'];
    //   $all_query = $all_query . "<tr>";
    //   $all_query = $all_query . "<td onclick=fillTest('$taskTitle')><center><font color='green'>" . $taskTitle . "</font></center></td>";
    //   $all_query = $all_query . '<td><center>Number of questions requested in this round:
    //   <input type="number" id="request">
    //   <input type="submit" name="' . $number . '" value="Confirm"></center></td>';
    //   $all_query = $all_query . "</tr>";
    //   $number++;
    // }
    $_SESSION['queryTaskWorker'] = $all_query;
    header("Location: ../html/worker-home.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }  
?>