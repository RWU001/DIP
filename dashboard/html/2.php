<!DOCTYPE html>
<html lang="en">
<head>
<title>DIP Homepage</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/homepage.css">
</head>
<body style="background-color:#525252;color:#008080;">
<header>
	<h1>CrowdSourcing DIP (EE3080)</h1>
</header>
<nav>
	<b><a href="index.html">Home</a> &nbsp; 
	<a href="requester home.html">Requester Home</a>
	<a href="worker home.html">Worker Home</a>
	Services &nbsp; 
	Contact </b>
	<title>
	</title>
	
<script language="JavaScript" type="text/javascript">
function login(showhide){
	if(showhide == "show"){
		document.getElementById('popupbox').style.visibility="visible";
	}else if(showhide == "hide"){
    document.getElementById('popupbox').style.visibility="hidden"; 
	}
}
function redirectrequester(){
	window.open("requester home.html");
} 
</script>
</head>
<body>

<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

<div id="popupbox"> 
	<form name="login" action="php/login.php" method="POST">
		<center>Username:</center><span class="error">* <?php echo $usernameErr;?></span>
		<center><input name="username" size="14" /></center>
		<center>Password:</center>
		<center><input name="password" type="password" size="14" /></center>
		<center><input value="REGISTER" name="submit" type="button" class="btn btn-primary" onclick="redirectrequester()">
		<input type="submit" name="submit" value="login" /></center>
	</form>
	<br />
	<center><a href="javascript:login('hide');">close</a></center> 
</div> 

<!-- <p><a href="javascript:login('show');"><button>Login</button></a></p> -->
</nav>
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
