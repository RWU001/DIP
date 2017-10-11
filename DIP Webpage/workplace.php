 <?php
	require_once('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
 
        echo $query = "INSERT INTO `login` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
        }
    }
    ?>
 
 <!DOCTYPE html>
 
 
<html>
<head>
    <title>Redirecting...</title>
    <meta http-equiv="refresh" 
content="2;URL='workplace.html'">
</head>
<body>
    You are being automatically redirected to a new location.<br />
    If your browser does not redirect you in 10 seconds, or you do
    not wish to wait, <a href='workplace.html'>click here</a>. 
</body>
</html>