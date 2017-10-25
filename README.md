# DIP Crowdsourcing

## How to activate the XAMPP:
1) Download and install XAMPP from [here](https://www.apachefriends.org/download.html)
2) Run your XAMPP, press start, go to services tab, and start all
3) Open "Network" tab, and enable the localhost (Please remember the localhost number, mine is 8080)
4) Go to volumes, and press mount button, and then explore button, and you will be directed to lampp folder
    
## Steps:
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
* Go to your browser, and type localhost:8080 at the URL