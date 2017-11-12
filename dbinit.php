<?php
//////////////////////////////////////INITIALIZE DATABASE///////////////////////////////////////////
require('php/connect.php');
$mainDb = $connection;

///////////////////////////////////LOGIN REQUESTER///////////////////////////////////////////////////
$tableLoginRequester = "CREATE TABLE login_requester (
    ID int NOT NULL AUTO_INCREMENT,
    USERNAME varchar(255) UNIQUE NOT NULL,
    -- EMAIL varchar(255) UNIQUE NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    WALLET INT NOT NULL,
    PRIMARY KEY(ID)   
)";
mysqli_query($mainDb, $tableLoginRequester);
$passwordRequesterTest = md5("heiho");
$requesterTable = "INSERT INTO `login_requester` (username, password, wallet) VALUES ('heiho', '$passwordRequesterTest', 0)";
//below is the create account with email
// $createAccount = "INSERT INTO `login_requester` (username, password, email) VALUES ('heiho', 'heiho', 'heiho@fakeemail.com')";
mysqli_query($mainDb, $requesterTable);

///////////////////////////////////LOGIN WORKER///////////////////////////////////////////////////
$tableLoginWorker = "CREATE TABLE login_worker (
    ID int NOT NULL AUTO_INCREMENT,
    USERNAME varchar(255) UNIQUE NOT NULL,
    -- EMAIL varchar(255) UNIQUE NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    MONEY_ACCUMULATED FLOAT NOT NULL,
    QUESTION_ANSWERED int NOT NULL,
    PRIMARY KEY(ID)   
)";
mysqli_query($mainDb, $tableLoginWorker);
$passwordWorkerTest = md5("iamworker");
$workerTable = "INSERT INTO `login_worker` (username, password, money_accumulated, question_answered) VALUES ('iamworker', '$passwordWorkerTest', 9.5, 10)";
// below is the code with email
// $createAccount = "INSERT INTO `login_worker` (username, password, email) VALUES ('iamworker', 'iamworker', 'heiho@fakeemail.com')";
mysqli_query($mainDb, $workerTable);


//////////////////////////////////////////////////REQUESTER TASK///////////////////////////////////////////
// $dbProfile = new mysqli('localhost', $user, $pass, $mainDbName) or die("Unable to connect");
$tableRequesterTask = "CREATE TABLE requester_task (
    ID int NOT NULL AUTO_INCREMENT,
    USER varchar(255) NOT NULL,
    TASKTITLE varchar(255) NOT NULL,
    COMPLETION_OF_TASK varchar(255) NOT NULL,
    PAYMENT_PROCESS varchar(255) NOT NULL,
    PRICE_PER_QUESTION FLOAT(5) NOT NULL,
    BUDGET int NOT NULL,
    IMAGE_PATH varchar(255) NOT NULL,
    TXT_PATH varchar(255) NOT NULL,
    TASK_DESCRIPTION varchar(400) NOT NULL,
    PRIMARY KEY(ID),
    UNIQUE (TASKTITLE)
)";

$sql1 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'heiho', 'DOnkey', '&#x2714', 'HAHAHAA', 0.05, 200, 'ha', 'hi', 'test')";
$sql2 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'heiho', 'Birds', '&#x2714', 'HAHAHAA', 0.04, 700, 'ha1', 'hi8', 'test')";
$sql3 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'Donny', 'Cats', '&#x2714', 'HAHAHAA', 0.03, 600, 'ha2', 'hi7', 'test')";
$sql4 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'alfred', 'Dogs', '&#x2714', 'HAHAHAA', 0.02, 300, 'ha3', 'hi6', 'test')";
$sql5 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'benny', 'Seal', '&#x2714', 'HAHAHAA', 0.01, 100, 'ha4', 'hi5', 'test')";

mysqli_query($mainDb, $tableRequesterTask);
mysqli_query($mainDb, $sql1);
mysqli_query($mainDb, $sql2);
mysqli_query($mainDb, $sql3);
mysqli_query($mainDb, $sql4);
mysqli_query($mainDb, $sql5);




/////////////////////////////////////////////IMAGES TABLE///////////////////////////////////////
$tableImages = "CREATE TABLE images_library (
    ID int NOT NULL AUTO_INCREMENT,
    IMAGE_NAME varchar(255) NOT NULL,
    IMAGE_PATH varchar(255) NOT NULL,
    TASKTITLE varchar(255) NOT NULL,
    USERNAME varchar(255) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY (TASKTITLE) REFERENCES requester_task(TASKTITLE),
    FOREIGN KEY (USERNAME) REFERENCES login_requester(USERNAME)
)";

$image1 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'testing', 'https://upload.wikimedia.org/wikipedia/en/d/d4/Mickey_Mouse.png', 'Birds', 'heiho')";
mysqli_query($mainDb, $tableImages);
mysqli_query($mainDb, $image1);

echo "Database Created";
?>