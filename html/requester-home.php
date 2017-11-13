<?php
	require('../php/directing.php');
?>

<!doctype html>
<html>
<head>
<title>RequesterHomepage</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/general.css">

<title>
Crowdsourcing
</title>

</head>

<body>
<div>
	<ul>
		<a href="#">Requester Home</a>&nbsp;&nbsp;
		<a href="worker-home.php">Worker Home</a>&nbsp;&nbsp;
		<a href="homepage.php" id="logout">Logout</a>
		<!-- <form id="myForm" action="../php/logout.php" method="get">
				<input type="hidden" name="someName" value="helloworld" />
				<a href="#" onclick="document.getElementById('myForm').submit();">Logout</a>
		</form> -->
	</ul>
</div>

<h1>REQUESTER PROFILE PAGE</h1>
<?php
	$wallet = $_SESSION['wallet'];
	echo "<div><center>Your wallet is $" . $wallet . "</center></div><br>";
?>

<table Border="10" width="1000" cellpadding="20" table style="margin: 0px auto;">

<tr>
<th>TASK TITLE</th>
<th>COMPLETION OF TASK</th>
<th>PAYMENT PROCESS</th>
<th>RESULT</th>
</tr>

<?php
	$request = $_SESSION['querytask'];
	echo $request;
?>
</table>

<br><br>
<div id="center">
	<a href="upload-new-task.php"><button style="text-align: center;">UPLOAD NEW TASK</button></a>
	<button onclick="myFunction()">WALLET</button>
	<div id="myDIV">
		<center>Top Up</center>
		<form name="wallet" action="../php/wallet.php" method="post">
			<center>Amount to top up:</center>
			<center><input type="number" name="number" size="14" required/></center>
			<center><input type="submit" name="wallet" value="Add Wallet" /></center>
		</form>
	</div>
</div>

<script language="JavaScript" type="text/javascript">
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
myFunction();
</script>
</body>
</html>