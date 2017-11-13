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
$requesterTable = "INSERT INTO `login_requester` (username, password, wallet) VALUES ('heiho', '$passwordRequesterTest', 1900)";
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
VALUES ('', 'heiho', 'DOnkey', '&#x2716', 'HAHAHAA', 0.05, 200, 'ha', 'hi', 'test')";
$sql2 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'heiho', 'Birds', '&#x2716', 'HAHAHAA', 0.04, 700, 'ha1', 'hi8', 'test')";
$sql3 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'Donny', 'Cats', '&#x2716', 'HAHAHAA', 0.03, 600, 'ha2', 'hi7', 'test')";
$sql4 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'alfred', 'Dogs', '&#x2716', 'HAHAHAA', 0.02, 300, 'ha3', 'hi6', 'test')";
$sql5 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'benny', 'Seal', '&#x2716', 'HAHAHAA', 0.01, 100, 'ha4', 'hi5', 'test')";
$sql6 = "INSERT INTO requester_task (ID, USER, TASKTITLE, COMPLETION_OF_TASK, PAYMENT_PROCESS, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('', 'heiho', 'Dog Breeds', '&#x2714', 'HAHAHAA', 0.01, 100, '/opt/lampp/htdocs/DIPWebsite/dashboard/develop/taskfiles/heiho/Dog Breeds/images/', '/opt/lampp/htdocs/DIPWebsite/dashboard/develop/taskfiles/heiho/Dog Breeds/Dog Breeds.txt', 'This task goal is to differentiate the dog breed according to features that you will be asked. Please answer it with 100% accuracy as the question will be simple.')";

mysqli_query($mainDb, $tableRequesterTask);
mysqli_query($mainDb, $sql1);
mysqli_query($mainDb, $sql2);
mysqli_query($mainDb, $sql3);
mysqli_query($mainDb, $sql4);
mysqli_query($mainDb, $sql5);
mysqli_query($mainDb, $sql6);




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

$image0 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'testing', 'https://upload.wikimedia.org/wikipedia/en/d/d4/Mickey_Mouse.png', 'DOnkey', 'heiho')";
$image1 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'testing', 'https://upload.wikimedia.org/wikipedia/en/d/d4/Mickey_Mouse.png', 'Birds', 'heiho')";
$image2 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog111.jpeg', '../taskfiles/heiho/Dog Breeds/images/Dog111.jpeg', 'Dog Breeds', 'heiho')";
$image3 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog222.jpg', '../taskfiles/heiho/Dog Breeds/images/Dog222.jpg', 'Dog Breeds', 'heiho')";
$image4 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog333.jpeg', '../taskfiles/heiho/Dog Breeds/images/Dog333.jpeg', 'Dog Breeds', 'heiho')";
$image5 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog444.jpg', '../taskfiles/heiho/Dog Breeds/images/Dog444.jpg', 'Dog Breeds', 'heiho')";
$image6 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog555.png', '../taskfiles/heiho/Dog Breeds/images/Dog555.png', 'Dog Breeds', 'heiho')";
$image7 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog666.jpg', '../taskfiles/heiho/Dog Breeds/images/Dog666.jpg', 'Dog Breeds', 'heiho')";
$image8 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog777.jpg', '../taskfiles/heiho/Dog Breeds/images/Dog777.jpg', 'Dog Breeds', 'heiho')";
$image9 = "INSERT INTO images_library (ID, IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('', 'Dog888?.png', '../taskfiles/heiho/Dog Breeds/images/Dog888?.png', 'Dog Breeds', 'heiho')";

mysqli_query($mainDb, $tableImages);
mysqli_query($mainDb, $image0);
mysqli_query($mainDb, $image1);
mysqli_query($mainDb, $image2);
mysqli_query($mainDb, $image3);
mysqli_query($mainDb, $image4);
mysqli_query($mainDb, $image5);
mysqli_query($mainDb, $image6);
mysqli_query($mainDb, $image7);
mysqli_query($mainDb, $image8);
mysqli_query($mainDb, $image9);


/////////////////////////////////////////////FINISHED IMAGE TABLE///////////////////////////////////////
$tableFinishedImages = "CREATE TABLE finished_images (
    ID int NOT NULL AUTO_INCREMENT,
    IMAGE_NAME varchar(255) NOT NULL,
    TASKTITLE varchar(255) NOT NULL,
    ANSWER varchar(255) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY (TASKTITLE) REFERENCES requester_task(TASKTITLE)
)";

$finishedImage1 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog111.jpeg', 'Dog Breeds', 'Australian Terrier Azawakh')";
$finishedImage2 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog222.jpeg', 'Dog Breeds', 'Beagle')";
$finishedImage3 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog333.jpeg', 'Dog Breeds', 'Appenzeller Sennenhunde')";
$finishedImage4 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog444.jpeg', 'Dog Breeds', 'Australian Terrier Azawakh')";
$finishedImage5 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog555.jpeg', 'Dog Breeds', 'Beagle')";
$finishedImage6 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog666.jpeg', 'Dog Breeds', 'Appenzeller Sennenhunde')";
$finishedImage7 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog777.jpeg', 'Dog Breeds', 'Bloodhound')";
$finishedImage8 = "INSERT INTO finished_images (ID, IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('', 'Dog888?.jpeg', 'Dog Breeds', 'Bloodhound')";

mysqli_query($mainDb, $tableFinishedImages);
mysqli_query($mainDb, $finishedImage1);
mysqli_query($mainDb, $finishedImage2);
mysqli_query($mainDb, $finishedImage3);
mysqli_query($mainDb, $finishedImage4);
mysqli_query($mainDb, $finishedImage5);
mysqli_query($mainDb, $finishedImage6);
mysqli_query($mainDb, $finishedImage7);
mysqli_query($mainDb, $finishedImage8);

echo "Database Created";
?>