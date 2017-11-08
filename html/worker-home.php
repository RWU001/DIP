<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="../css/general.css">

  <head>
    <title>Worker Home Page</title>
    <meta charset="utf-8">
    <!-- <style>
    body {background-color: powderblue;}
    h1 {color: blue;}
    </style> -->
  </head>

  <script>
    var AQ = "500";
    var AM = "5"
  </script>

  <style type="text/css">
    th {
      color:BLUE;
      font-family:Comic Sans MS;
      font-weight:bold;
      font-style:italic;
      }
    td {color:#000;
        font-family:Verdana;
      font-weight:bold;
        }	
    tr {
      background-color:#FEc704;
    }	
    table {
      text-align:center;
      font-size: 18px;
    }
  </style>

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

    <center>
      <form action="/work_page.html">
      <h3>
        Accumulated number of question answered: 
        <?php
          session_start(); 
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
      <table Border="10" width="1000" cellpadding="20" table style="margin: 0px auto;">

        <tr>
        <th>TASK TITLE</th>
        <th>Number of questions requested in this round:</th>
        </tr>

        <?php
          $request = $_SESSION['queryTaskWorker'];
          echo $request;
        ?>
      </table>

      <br/>
      </form>
    </center>
  </body>
</html>