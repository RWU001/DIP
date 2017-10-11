<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dip";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* The SQL query must be quoted in PHP
String values inside the SQL query must be quoted
Numeric values must not be quoted
The word NULL must not be quoted*/

        //$username = $_POST['username'];
		//$email = $_POST['email'];
        //$password = $_POST['password'];
		
		$task = $_GET["title"]; 
		$numofclass = $_GET["member"]; 
		//$ClassNo = $_GET["class.no"]; 
		//$ClassName = $_GET["class.name"];
		//$classfeature = $_GET["class.feature"]; 
		$reward = $_GET["reward"]; 
		$budget = $_GET["budget"]; 
		
		$sql = "INSERT INTO upload (User, Password, tasktitle, Images, NumOfClass, Features, Reward, Budget )
				VALUES (' ', ' ', '$task', ' ', '$numofclass', ' ', '$reward', '$budget')";
		
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
 
mysqli_close($conn);
?>

<html>
<head>
    <title>Redirecting...</title>
    <meta http-equiv="refresh" 
content="2;URL='requester home.html'">
</head>
<body>
    You are being automatically redirected to a new location.<br />
    If your browser does not redirect you in 10 seconds, or you do
    not wish to wait, <a href='requester home.html'>click here</a>. 
</body>
</html>