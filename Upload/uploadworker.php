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



$sql = "INSERT INTO workerplace (Username, Questionstoanswer, QuestionsAnswered, AmountEarned, DateTime )
VALUES ('worker1', '10', '7', '50', '20th Oct 2017')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>