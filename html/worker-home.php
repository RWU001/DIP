<?php
	require('../php/directing.php');
?>

<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="../css/general.css">

  <head>
    <title>Worker Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <!-- <style>
    body {background-color: powderblue;}
    h1 {color: blue;}
    </style> -->
  </head>

  <body>
    <div>
      <ul>
        <a href="requester-home.php">Requester Home</a>&nbsp;&nbsp;
        <a href="worker-home.php">Worker Home</a>&nbsp;&nbsp;
        <a href="homepage.php" id="logout">Logout</a>&nbsp;&nbsp;
      </ul>
    </div>

    <header>
      <h1>Home Page</h1>
    </header>

    <hr>

    <form action="../php/workspace.php" method="post">
      <div class="taskListBox">
        <h2 class="taskListTitle">Task List</h2>
        <div id="taskList">
          <?php
              $request = $_SESSION['queryTaskWorker'];
              echo $request;
          ?>
        </div>
      </div>
      <div class="workerDetails">
        <h3>
        Accumulated number of question answered: 
        <?php
          if (isset($_SESSION['question1'])) {
            $question = $_SESSION['question1'];
            echo $question;
          } else {
            echo "#ERROR";
          }
        ?>
        </h3>
        <h3>
        Accumulated amount of money earned:
        <?php
        if (isset($_SESSION['money'])) {
          $money = sprintf('%0.2f', $_SESSION['money']); //print 2 decimals
          echo "$" . $money;
        } else {
          echo "#ERROR";
        }
        ?>
        </h3>
        <a href="history.html">
          <h4>View answered history</h4>
        </a>
        <br>
        <label>
          <p><span class="numberQuestion">Number of Question:</span> <input type="number" max="200" name="numberQuestion" id="numberQuestion"></p>
        </label>
        <input type="text" name="taskTitle" id="test" style="visibility: hidden" required/>
        <br>
        <input type="submit" value="Start Working!" id="startWorker">
      </div>
    </form>
    <!-- <form name="test" action="../php/test.php" method="post">
    <center>Amount to top up:</center>
    <center><input type="text" name="asd" id="test" style="visibility: hidden" required/></center>
    <center><input type="submit" value="submit"/></center>
  </form> -->
  </div>
  <script src="../js/worker-home.js"></script>
  </body>
</html>