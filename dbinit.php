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
    PRICE_PER_QUESTION FLOAT(5) NOT NULL,
    BUDGET int NOT NULL,
    COMPLETE varchar(255) NOT NULL,
    IMAGE_PATH varchar(255) NOT NULL,
    TXT_PATH varchar(255) NOT NULL,
    TASK_DESCRIPTION varchar(400) NOT NULL,
    PRIMARY KEY(ID),
    UNIQUE (TASKTITLE)
)";

// $sql1 = "INSERT INTO requester_task (USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
// VALUES ('heiho', 'DOnkey', 0.05, 200, 'ha', 'hi', 'test')";
// $sql2 = "INSERT INTO requester_task (USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
// VALUES ('heiho', 'Birds', 0.04, 700, 'ha1', 'hi8', 'test')";
// $sql3 = "INSERT INTO requester_task (USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
// VALUES ('Donny', 'Cats', 0.03, 600, 'ha2', 'hi7', 'test')";
// $sql4 = "INSERT INTO requester_task (USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
// VALUES ('alfred', 'Dogs', 0.02, 300, 'ha3', 'hi6', 'test')";
// $sql5 = "INSERT INTO requester_task (USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
// VALUES ('benny', 'Seal', 0.01, 100, 'ha4', 'hi5', 'test')";
$sql6 = "INSERT INTO requester_task (USER, TASKTITLE, PRICE_PER_QUESTION, BUDGET, COMPLETE, IMAGE_PATH, TXT_PATH, TASK_DESCRIPTION)
VALUES ('heiho', 'Dog Breeds', 0.01, 100, 'YES', '/opt/lampp/htdocs/DIPWebsite/dashboard/develop/taskfiles/heiho/Dog Breeds/images/', '/opt/lampp/htdocs/DIPWebsite/dashboard/develop/taskfiles/heiho/Dog Breeds/Dog Breeds.txt', 'This task goal is to differentiate the dog breed according to features that you will be asked. Please answer it with 100% accuracy as the question will be simple.')";

mysqli_query($mainDb, $tableRequesterTask);
// mysqli_query($mainDb, $sql1);
// mysqli_query($mainDb, $sql2);
// mysqli_query($mainDb, $sql3);
// mysqli_query($mainDb, $sql4);
// mysqli_query($mainDb, $sql5);
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

$src0 = "<img src=\"https://upload.wikimedia.org/wikipedia/en/d/d4/Mickey_Mouse.png\" style=\"width:300px;\" id=\"shownPicture\">";
$src1 = "<img src=\"https://upload.wikimedia.org/wikipedia/en/d/d4/Mickey_Mouse.png\" style=\"width:300px;\" id=\"shownPicture\">";
$src2 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog111.jpeg\" style=\"width:300px;\" id=\"shownPicture\">";
$src3 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog222.jpg\" style=\"width:300px;\" id=\"shownPicture\">";
$src4 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog333.jpeg\" style=\"width:300px;\" id=\"shownPicture\">";
$src5 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog444.jpg\" style=\"width:300px;\" id=\"shownPicture\">";
$src6 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog555.png\" style=\"width:300px;\" id=\"shownPicture\">";
$src7 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog666.jpg\" style=\"width:300px;\" id=\"shownPicture\">";
$src8 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog777.jpg\" style=\"width:300px;\" id=\"shownPicture\">";
$src9 = "<img src=\"../taskfiles/heiho/Dog Breeds/images/Dog888.jpg\" style=\"width:300px;\" id=\"shownPicture\">";
$image0 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('testing', '$src0', 'DOnkey', 'heiho')";
$image1 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('testing', '$src1', 'Birds', 'heiho')";
$image2 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog111.jpeg', '$src2', 'Dog Breeds', 'heiho')";
$image3 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog222.jpg', '$src3', 'Dog Breeds', 'heiho')";
$image4 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog333.jpeg', '$src4', 'Dog Breeds', 'heiho')";
$image5 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog444.jpg', '$src5', 'Dog Breeds', 'heiho')";
$image6 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog555.png', '$src6', 'Dog Breeds', 'heiho')";
$image7 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog666.jpg', '$src7', 'Dog Breeds', 'heiho')";
$image8 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog777.jpg', '$src8', 'Dog Breeds', 'heiho')";
$image9 = "INSERT INTO images_library (IMAGE_NAME, IMAGE_PATH, TASKTITLE, USERNAME)
VALUES ('Dog888.jpg', '$src9', 'Dog Breeds', 'heiho')";

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

$finishedImage1 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog111.jpeg', 'Dog Breeds', 'Australian Terrier Azawakh')";
$finishedImage2 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog222.jpg', 'Dog Breeds', 'Beagle')";
$finishedImage3 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog333.jpeg', 'Dog Breeds', 'Appenzeller Sennenhunde')";
$finishedImage4 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog444.jpg', 'Dog Breeds', 'Australian Terrier Azawakh')";
$finishedImage5 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog555.png', 'Dog Breeds', 'Beagle')";
$finishedImage6 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog666.jpg', 'Dog Breeds', 'Appenzeller Sennenhunde')";
$finishedImage7 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog777.jpg', 'Dog Breeds', 'Bloodhound')";
$finishedImage8 = "INSERT INTO finished_images (IMAGE_NAME, TASKTITLE, ANSWER)
VALUES ('Dog888.jpg', 'Dog Breeds', 'Bloodhound')";

mysqli_query($mainDb, $tableFinishedImages);
mysqli_query($mainDb, $finishedImage1);
mysqli_query($mainDb, $finishedImage2);
mysqli_query($mainDb, $finishedImage3);
mysqli_query($mainDb, $finishedImage4);
mysqli_query($mainDb, $finishedImage5);
mysqli_query($mainDb, $finishedImage6);
mysqli_query($mainDb, $finishedImage7);
mysqli_query($mainDb, $finishedImage8);

////////////////////////////////////////WORKER HISTORY///////////////////////////////////////
$workerHistoryTable = "CREATE TABLE worker_history (
    ID int NOT NULL AUTO_INCREMENT,
    DATE_SUBMISSION varchar(255) NOT NULL,
    NUMBER_OF_QUESTIONS INT NOT NULL,
    REWARD_EACH_QUESTION FLOAT(5) NOT NULL,
    USERNAME varchar(255) NOT NULL,
    TASKTITLE varchar(255) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY (TASKTITLE) REFERENCES requester_task(TASKTITLE)
)";

$workerHistory0 = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
VALUES ('10-11-2017', 30, 0.02, 'iamworker', 'Dog Breeds')";
$workerHistory1 = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
VALUES ('13-11-2017', 40, 0.05, 'iamworker', 'Dog Breeds')";
$workerHistory2 = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
VALUES ('15-11-2017', 50, 0.04, 'iamworker', 'Dog Breeds')";
$workerHistory3 = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
VALUES ('18-12-2017', 20, 0.02, 'iamworker', 'Dog Breeds')";
$workerHistory4 = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
VALUES ('19-1-2018', 10, 0.01, 'iamworker', 'Dog Breeds')";
$workerHistory5 = "INSERT INTO worker_history (DATE_SUBMISSION, NUMBER_OF_QUESTIONS, REWARD_EACH_QUESTION, USERNAME, TASKTITLE)
VALUES ('21-2-2018', 5, 1.00, 'iamworker', 'Dog Breeds')";

mysqli_query($mainDb, $workerHistoryTable);
mysqli_query($mainDb, $workerHistory0);
mysqli_query($mainDb, $workerHistory1);
mysqli_query($mainDb, $workerHistory2);
mysqli_query($mainDb, $workerHistory3);
mysqli_query($mainDb, $workerHistory4);
mysqli_query($mainDb, $workerHistory5);


$questionsTable = "CREATE TABLE `questions` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `option1` VARCHAR(255) NOT NULL , `option2` VARCHAR(255) NOT NULL , `TASKTITLE` VARCHAR(255) NOT NULL,`IMAGE_NAME` VARCHAR(255) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

mysqli_query($mainDb, $questionsTable);


echo "Database Created";
?>