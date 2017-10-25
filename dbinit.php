<?php

$user = 'root';
$pass = '';
$db1 = 'cc';
$db2 = 'profile';

$dbcc = new mysqli('localhost', $user, $pass, $db1) or die("Unable to connect");

$query = "CREATE TABLE login (
    ID int NOT NULL AUTO_INCREMENT,
    USERNAME varchar(255) UNIQUE NOT NULL,
    EMAIL varchar(255) UNIQUE NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    PRIMARY KEY(ID)   
)";
$result = mysqli_query($dbcc, $query);
$createAccount = "INSERT INTO `login` (username, password, email) VALUES ('heiho', 'heiho', 'heiho@fakeemail.com')";
mysqli_query($dbcc, $createAccount);

$dbProfile = new mysqli('localhost', $user, $pass, $db2) or die("Unable to connect");
$query2 = "CREATE TABLE request (
    ID int NOT NULL AUTO_INCREMENT,
    USER varchar(255) NOT NULL,
    TASKTITLE varchar(255) NOT NULL,
    COMPLETION_OF_TASK varchar(255) NOT NULL,
    PAYMENT_PROCESS varchar(255) NOT NULL,
    PRIMARY KEY(ID)   
)";

$sql1 = "INSERT INTO request (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS)
VALUES ('', 'heiho', 'DOnkey', '&#x2714', 'HAHAHAA')";
$sql2 = "INSERT INTO request (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS)
VALUES ('', 'heiho', 'You', '&#x2714', 'HAHAHAA')";

$result2 = mysqli_query($dbProfile, $query2);
$result3 = mysqli_query($dbProfile, $sql1);
$result3 = mysqli_query($dbProfile, $sql2);
echo "Database Created";
?>