<?php
//////////////////////////////////////INITIALIZE DATABASE///////////////////////////////////////////
require('php/connect.php');
$mainDb = $connection;

///////////////////////////////////LOGIN REQUESTER///////////////////////////////////////////////////
$query = "CREATE TABLE login_requester (
    ID int NOT NULL AUTO_INCREMENT,
    USERNAME varchar(255) UNIQUE NOT NULL,
    -- EMAIL varchar(255) UNIQUE NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    PRIMARY KEY(ID)   
)";
$result = mysqli_query($mainDb, $query);
$requesterTable = "INSERT INTO `login_requester` (username, password) VALUES ('heiho', 'heiho')";
//below is the create account with email
// $createAccount = "INSERT INTO `login_requester` (username, password, email) VALUES ('heiho', 'heiho', 'heiho@fakeemail.com')";
mysqli_query($mainDb, $requesterTable);

///////////////////////////////////LOGIN WORKER///////////////////////////////////////////////////
$query = "CREATE TABLE login_worker (
    ID int NOT NULL AUTO_INCREMENT,
    USERNAME varchar(255) UNIQUE NOT NULL,
    -- EMAIL varchar(255) UNIQUE NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    PRIMARY KEY(ID)   
)";
$result = mysqli_query($mainDb, $query);

$workerTable = "INSERT INTO `login_worker` (username, password) VALUES ('iamworker', 'iamworker')";
// below is the code with email
// $createAccount = "INSERT INTO `login_worker` (username, password, email) VALUES ('iamworker', 'iamworker', 'heiho@fakeemail.com')";
mysqli_query($mainDb, $workerTable);


//////////////////////////////////////////////////REQUESTER TASK///////////////////////////////////////////
// $dbProfile = new mysqli('localhost', $user, $pass, $mainDbName) or die("Unable to connect");
$query2 = "CREATE TABLE requester_task (
    ID int NOT NULL AUTO_INCREMENT,
    USER varchar(255) NOT NULL,
    TASKTITLE varchar(255) NOT NULL,
    COMPLETION_OF_TASK varchar(255) NOT NULL,
    PAYMENT_PROCESS varchar(255) NOT NULL,
    PRIMARY KEY(ID)   
)";

$sql1 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS)
VALUES ('', 'heiho', 'DOnkey', '&#x2714', 'HAHAHAA')";
$sql2 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS)
VALUES ('', 'heiho', 'You', '&#x2714', 'HAHAHAA')";

$result2 = mysqli_query($mainDb, $query2);
$result3 = mysqli_query($mainDb, $sql1);
$result3 = mysqli_query($mainDb, $sql2);
echo "Database Created";
?>