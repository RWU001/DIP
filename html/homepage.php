<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DIP Homepage</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
  </head>

  <script language="JavaScript" type="text/javascript">
    function loginRequester(showhide) {
      if(showhide == "show"){
        document.getElementById('boxRequester').style.visibility="visible";
      } else if(showhide == "hide") {
        document.getElementById('boxRequester').style.visibility="hidden"; 
      }
    }

    function loginWorker(showhide) {
      if(showhide == "show"){
        document.getElementById('boxWorker').style.visibility="visible";
      } else if(showhide == "hide") {
        document.getElementById('boxWorker').style.visibility="hidden"; 
      }
    }

    function alertMessage(message) {
      alert(message);
    }
  </script>

  <body style="background-color:#525252; color:#008080;">
    <header>
      <h1>CrowdSourcing DIP (EE3080)</h1>
    </header>

  <nav>
    <b><a href="">Home</a> &nbsp; Services &nbsp; Contact </b>
    <!-- <p><a href="javascript:login('show');"><button>Login</button></a></p> -->
  </nav>

  <div id="boxRequester" class="popupbox">
    <center>HI Requester!</center>
    <form name="login" action="../php/login-requester.php" method="post">
      <center>Username:</center>
      <center><input name="username" size="14" required/></center>
      <center>Password:</center>
      <center><input name="password" type="password" size="14" required/></center>
      <center><input type="submit" name="login" value="login" /></center>
      <center onclick="loginRequester('hide')" class="buttonClose">x</center> 
      <center><input type="submit" name="register" value="Sign Up" /></center>
    </form>
  </div> 

  <div id="boxWorker" class="popupbox">
    <center>HI Worker!</center>
    <form name="login" action="../php/login-worker.php" method="post">
      <center>Username:</center>
      <center><input name="username" size="14" required/></center>
      <center>Password:</center>
      <center><input name="password" type="password" size="14" required/></center>
      <center><input type="submit" name="login" value="login" /></center>
      <center onclick="loginWorker('hide')" class="buttonClose">x</center> 
      <center><input type="submit" name="register" value="Sign Up" /></center>
		</form>
  </div> 

  <div id="content">
    <h2>Sequential Task Design for Crowdsourcing</h2>
    <p>In a crowdsourcing platform, a task is broken down into microtasks that are then assigned to many workers, 
    whose answers are aggregated to form the final answer to the original task.<br/> 
    This is because workers are usually unreliable, and can only answer simple binary questions.
    In this project, we implement an automatic sequential task design strategy that decomposes<br/> 
    a multi-class labelling problem into simple binary questions for the workers. 
    The students will build an online platform or app as implementation.
    </p>
    <h3>Requester</h3>

    <p><button onclick="loginRequester('show')">Requester</button></p>
    
    <p>Requester will upload tasks online.
    </p>
    <h3>Worker</h3>

    <p><button onclick="loginWorker('show')">Worker</button></p>
    <p>Worker will get questions assigned to them by the system.
    </p>
  </div>

  <footer>
    <small><i>Copyright &copy;2017 Front End</i></small>
	</footer>
  </body>
  <?php
    session_start();
    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
      echo "<script>alertMessage('$message');</script>";
    }
    session_destroy();
  ?>
</html>
