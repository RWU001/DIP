<!doctype html>
<html>
<head>
<title>RequesterHomepage</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/general.css">

<style type="text/css">
th {
	color:BLUE;
  font-family:Comic Sans MS;
	font-weight:bold;
	font-style:italic;
	}
td {color:#00FF00;
    font-family:Verdana;
	font-weight:bold;
    }	
tr  {background-color:#FEc704;}	
table {text-align:center;
       	  
    }
</style>

<title>
Crowdsourcing
</title>

</head>


<body>
<div>
	<ul>
		<a href="#">Requester Home</a>&nbsp;&nbsp;
		<a href="worker-home.php">Worker Home</a>&nbsp;&nbsp;
		<a href="homepage.php">Logout</a>
		<!-- <form id="myForm" action="../php/logout.php" method="get">
				<input type="hidden" name="someName" value="helloworld" />
				<a href="#" onclick="document.getElementById('myForm').submit();">Logout</a>
		</form> -->
	</ul>
</div>

<h1>REQUESTER PROFILE PAGE</h1>

<table Border="10" width="1000" cellpadding="20" table style="margin: 0px auto;">

<tr>
<th>TASK TITLE</th>
<th>COMPLETION OF TASK</th>
<th>PAYMENT PROCESS</th>
<th>RESULT</th>
</tr>

<?php
	session_start();

	$request = $_SESSION['querytask'];
	echo $request;
?>
</table>

<br><br>
<div id="center">
<a href="upload-new-task.php"><button style="text-align: center;">UPLOAD NEW TASK</button></a>
</div>

</body>
</html>