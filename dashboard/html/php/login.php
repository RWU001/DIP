<?php
//Start the Session
session_start();
require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `login` WHERE username='$username' and password='$password'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hai " . $username . "
";
echo "This is the Members Area
";
echo "<a href='logout.php'>Logout</a>";
}
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
 
 <!DOCTYPE html>
 
 
 <html>
 <head>
		<title>DIP Homepage</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<meta charset="utf-8">
		<link rel="stylesheet" href="../../homepage.css" >
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="background-color:#525252;color:#008080;">

<header>
	<h1>CrowdSourcing DIP (EE3080)<span class="error">* <?php echo $usernameErr;?></span></h1>
</header>
<nav>
	<b><a href="index.html">Home</a> &nbsp; 
	<a href="requester home.html">Requester Home</a>
	<a href="worker home.html">Worker Home</a>
	Services &nbsp; 
	Contact </b>

<script language="JavaScript" type="text/javascript">
	function login(showhide){
		if(showhide == "show"){
			document.getElementById('popupbox').style.visibility="visible";
		}else if(showhide == "hide"){
	    	document.getElementById('popupbox').style.visibility="hidden"; 
		}
	}

	// function redirectrequester(){
	// 	window.open("requester home.html");
	// } 

	function alertFalseLogin() {
		alert('Your username or password is wrong!')
	}

</script>

<body>
<div class="container">

	  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
	  
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
 
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Register</a>
      </form>
</div>
<!-- <p><a href="javascript:login('show');"><button>Login</button></a></p> -->
<hr/>
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

	<p><a href="javascript:login('show');"><button>Requester</button></a></p>
	
	<p>Requester will upload tasks online.
	</p>
	<h3>Worker</h3>

	<p><a href="javascript:login('show');"><button>Worker</button></a></p>
	<p>Worker will get questions assigned to them by the system.
	</p>
</div>

<footer>
	<small><i>Copyright &copy;2017 Front End</i></small>
</footer>
</body>
</html>
</body>
</html>