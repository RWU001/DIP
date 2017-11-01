# DIP Crowdsourcing Instructions

### How to activate the XAMPP:
1) Download and install XAMPP from [here](https://www.apachefriends.org/download.html)
2) Run your XAMPP, press start, go to services tab, and start all
3) Open "Network" tab, and enable the localhost (Please remember the localhost number, mine is 8080)
4) Go to volumes, and press mount button, and then explore button, and you will be directed to lampp folder
    
### Steps:
* Download all the files from GitHub
* Proceed to htdocs file, and then paste all the files here (you may want to create a new folder and paste it there ex:DIPWebsite). Note that you need to put these three folders in the same directory.
* Change your index.php at line 8 to direct the page that you want to show whenever you go to localhost:8080 like below
```
<?php
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	    $uri = 'https://';
	} else {
        $uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/DIPWebsite/html/homepage.html'); //Add your own directory path, for mine, I would like to show my homepage
	exit;
?>
Something is wrong with the XAMPP installation :-(
```
* Go to your browser, and type localhost:8080/phpmyadmin at the URL
* Create a new database by pressing New, and set database name to DIP_CROWDSOURCING
* Open a new browser tab, and open the dbinit.php by opening it from URL (example : localhost:8080/DIPWebsite/dbinit.php). This will create all the necessary tables and some fake data
* And you can see the project by typing localhost:8080 at the URL
* We have created a fake account as a requester with username: heiho and password: heiho
* We also have created a fake account as a worker with username:iamworker and password:iamworker


## Things that we may work on
* Generating questions based on matrix algorithm
* Getting all the images from compressed file and can get list of the images names + can show the image at the html
* Adding features of uploading word documents and create the task classes according to the word document (you may set your own text structure at the word document)
* Set the completion of task at requester side (whether the task already complete)
* Allow the worker to be able to choose task that he want to do it + the number of questions feature (allow worker to only work for a number of questions).
* Table structure

## Things that we can improve
* Website design

## Suggestion
* Try to give a relevant name to every variable that you created or file-names for better debugging.