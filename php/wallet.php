<?php
session_start();
require('connect.php');
$conn = $connection;
$username = $_SESSION['username'];


if (isset($_POST['number'])) {
    //update action
    if (isset($_POST['number'])) {
      //3.1.1 Assigning posted values to variables.
      $number = $_POST['number'];

$sql = "UPDATE login_requester 
		SET WALLET=WALLET+'$number' 
		WHERE USERNAME='" . $username . "'";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
}	
?>