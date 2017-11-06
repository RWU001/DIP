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
$passwordRequesterTest = md5("heiho");
$requesterTable = "INSERT INTO `login_requester` (username, password) VALUES ('heiho', '$passwordRequesterTest')";
//below is the create account with email
// $createAccount = "INSERT INTO `login_requester` (username, password, email) VALUES ('heiho', 'heiho', 'heiho@fakeemail.com')";
mysqli_query($mainDb, $requesterTable);

///////////////////////////////////LOGIN WORKER///////////////////////////////////////////////////
$query = "CREATE TABLE login_worker (
    ID int NOT NULL AUTO_INCREMENT,
    USERNAME varchar(255) UNIQUE NOT NULL,
    -- EMAIL varchar(255) UNIQUE NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    MONEY_ACCUMULATED FLOAT NOT NULL,
    QUESTION_ANSWERED int NOT NULL,
    PRIMARY KEY(ID)   
)";
$result = mysqli_query($mainDb, $query);
$passwordWorkerTest = md5("iamworker");
$workerTable = "INSERT INTO `login_worker` (username, password, money_accumulated, question_answered) VALUES ('iamworker', '$passwordWorkerTest', 9.5, 10)";
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
    PRICE_PER_QUESTION FLOAT(5) NOT NULL,
    BUDGET int NOT NULL,
    IMAGE_PATH varchar(255) NOT NULL,
    TXT_PATH varchar(255) NOT NULL,
    PRIMARY KEY(ID)   
)";

$sql1 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH)
VALUES ('', 'heiho', 'DOnkey', '&#x2714', 'HAHAHAA', 0.05, 200, 'ha', 'hi')";
$sql2 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH)
VALUES ('', 'heiho', 'Birds', '&#x2714', 'HAHAHAA', 0.04, 700, 'ha1', 'hi8')";
$sql3 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH)
VALUES ('', 'Donny', 'Cats', '&#x2714', 'HAHAHAA', 0.03, 600, 'ha2', 'hi7')";
$sql4 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH)
VALUES ('', 'alfred', 'Dogs', '&#x2714', 'HAHAHAA', 0.02, 300, 'ha3', 'hi6')";
$sql5 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH)
VALUES ('', 'benny', 'Seal', '&#x2714', 'HAHAHAA', 0.01, 100, 'ha4', 'hi5')";

$result2 = mysqli_query($mainDb, $query2);
$result3 = mysqli_query($mainDb, $sql1);
$result4 = mysqli_query($mainDb, $sql2);
$result5 = mysqli_query($mainDb, $sql3);
$result6 = mysqli_query($mainDb, $sql4);
$result7 = mysqli_query($mainDb, $sql5);
echo "Database Created";
?>