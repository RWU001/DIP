<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DIP Crowdsourcing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />
	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->
	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
			<div id="boxRequester" class="popupbox" style="background-color: #D3D3D3;">
					<center>HI Requester!</center>
					<form name="login" action="../php/login-requester.php" method="post">
						<center>Username:</center>
						<center><input name="username" size="14" required/></center>
						<center>Password:</center>
						<center><input name="password" type="password" size="14" required/></center>
						<center><input type="submit" name="login" value="login" /></center>
						<center onclick="loginRequester('hide')" class="buttonClose">x</center> 
						<center><input type="submit" name="register" value="Sign Up" /></center>
					</form>
				</div> 
		<div id="boxWorker" class="popupbox" style="background-color: #D3D3D3;">
			<center>HI Worker!</center>
			<form name="login" action="../php/login-worker.php" method="post">
				<center>Username:</center>
				<center><input name="username" size="14" required/></center>
				<center>Password:</center>
				<center><input name="password" type="password" size="14" required/></center>
				<center><input type="submit" name="login" value="login" /></center>
				<center onclick="loginWorker('hide')" class="buttonClose">x</center> 
				<center><input type="submit" name="register" value="Sign Up" /></center>
			</form>
		</div> 
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container-wrap">
			<div class="top-menu">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html">Crowdsourcing</a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#requester">Requester</a></li>
							<li><a href="#worker">Worker</a></li>
							<li><a href="#aboutUs">About</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(../images/img_bg_1.jpg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1>Money can't buy happiness</h1>
										<h2>but money can make your life easier<br>Join us today as a <b style="color:#66D37E">requester</b></h2>
										<p><a class="btn btn-primary btn-demo" onclick="loginRequester('show')" href="#boxRequester"></i> Login</a> <a class="btn btn-primary btn-learn" href="#requester">Learn More</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(../images/img_bg_2.jpg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1>Start earning money from where you are</h1>
										<h2>Start earning money from where you are<br>Join us today as a <b style="color:#66D37E">worker</b></a></h2>
										<p><a class="btn btn-primary btn-demo" onclick="loginWorker('show')" href="#boxWorker"></i> Login</a> <a class="btn btn-primary btn-learn" href="#worker">Learn More</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(../images/img_bg_3.jpg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1><b>Project DIP Crowdsourcing</b></h1>
										<h2>EE3080 Design and Innovative Project</h2>
										<p><img src="http://www3.ntu.edu.sg/cao3/careerfair2017/website/img/logo_ntu_new.png"></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li> 	
			  	</ul>
		  	</div>
		</aside>
		<div id="fh5co-services">
			<div class="row">
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-diamond"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Our Goal</a></h3>
							<p>To create a website for crowdsourcing purpose. By starting from scratch, we built a HTML, CSS, Javascript based website with PHP as our backend.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-lab2"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Challanges</a></h3>
							<p>Separating tasks as backend and frontend, we successfully built this website with help from our professor and our supervisors.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-settings"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Extras</a></h3>
							<p>This website is using template from internet called Neat, anyway you wont read this paragraph right. We would like to appreciate the creator of this template.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="requester" class="fh5co-light-grey">
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1 fh5co-heading" style="font-size:16px;">
					<h2 style="font-size:30px;" class="text-center">As a Requester</h2>
					<p>There are tons of people who want to earn money from their home but due to lack of accessibility of the current working environment, it become dreams for them. I am inviting you to make their dreams come true and help them financially by joining us as a requester.</p>
					<ul>
						<li>Prepare your task images and compress all the images to a zip file.</li>
						<li>Define all possible classes with their corresponding features that you desired for worker to work on</li>
						<li>Uploada your task at our database and wait for your task until complete</li>
						<li>You can check your task status at your own dashboard</li>
						<li>Download the task after the task finished by clicking the download button</li>
					</ul>
					<p style="float:right;margin-bottom:0;">What are you waiting for? Be a requester today!<br></p><br>
					<p style="float:right"><a class="btn btn-primary btn-demo" onclick="loginRequester('show')" href="#boxRequester"></i> Login</a></p>
				</div>
			</div>
		</div>
		
		<br>

		<div id="worker" class="fh5co-light-grey">
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1 fh5co-heading" style="font-size:16px;">
					<h2 style="font-size:30px;" class="text-center">As a Worker</h2>
					<p>Nowdays, earning money is difficult and it is relatable for those who keep failed for their full-time application. Fret not, we are here to help you earning money wherever you are and whenever you want.</p>
					<ul>
						<li>Register for an account by pressing the login button</li>
						<li>Select a task that you want to work on</li>
						<li>Set the number of question that you want to work on</li>
						<li>Finish the task and get the money according to the price each question</li>
						<li>You can check your worker status such as money earned and total question answered at your own dashboard</li>
					</ul>
					<p style="float:left;margin-bottom:0;">What are you waiting for? Be a requester today!<br></p><br>
					<p style="float:left"><a class="btn btn-primary btn-demo" onclick="loginWorker('show')" href="#boxWorker"></i> Login</a></p>
				</div>
			</div>
		</div>

		<div id="fh5co-counter" class="fh5co-counters">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center animate-box">
					<p>We proudly present our statistic about total task uploaded, number of requester, and number of workers</p>
					</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<div class="row">
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="1274" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Task Uploaded</span>
						</div>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="234" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Number of Requesters</span>
						</div>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="834" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Number of Workers</span>
						</div>
						<div class="col-md-3 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Done Projects</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="aboutUs" class="fh5co-light-grey" style="padding-top:20px;">
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1 fh5co-heading" style="font-size:16px;">
					<h2 style="font-size:40px;" class="text-center">ABOUT US</h2>
					<p>This module is EE3080, Design and Innovative Project, with the title of the project "Sequential Task for Crowd Sourcing". This project started at week 3 and conducted for 10 weeks by our group. And lo and behold, our group members:</p>
					<ul>
						<li>Our Professor: Mr. Tay Wee Peng</li>
						<li>Our Supervisor: Mr. Tang Wenchang</li>
						<li>Our Supervisor: Mr. Kang Qiyu</li>
						<li>Wu Ruiha (Frontend Leader)</li>
						<li>Alfred Datui</li>
						<li>Cheam Yen Kait Nicholas</li>
						<li>Muhammad Shamir Bin Kamaluddin</li>
						<li>Benny Ng Zi Hao</li>
						<li>Ong Wee Meng (Backend Leader)</li>
						<li>Teo Yee Shan Clarissa</li>
						<li>Yap Choon Mei</li>
						<li>Hong Jing Yee</li>
						<li>Ong Kim Hua</li>
					</ul>
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->

	<div class="container-wrap" style="font-size:18px">
		<footer id="fh5co-footer" role="contentinfo">
			<div class="row">
				<div class="col-md-4 fh5co-widget">
					<h4>About NTU</h4>
					<p>NTU provides students with a broad and holistic education which incorporates residential living, international experience and an early immersion in business and industry.</p>
				</div>

				<div class="col-md-4 col-md-push-1">
					<h4>Links</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Home</a></li>
						<li><a href="#requester">Requester</a></li>
						<li><a href="#worker">Worker</a></li>
						<li><a href="#aboutUs">About</a></li>
					</ul>
				</div>

				<div class="col-md-4" id="contact">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
						<li>Nanyang Technological University</li>
						<li>50 Nanyang Ave, 639798</li>
						<li><a href="tel://1234567920">+65 6791 1744</a></li>
						<li><a href="www.ntu.edu.sg/">www.ntu.edu.sg/</a></li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						Check our link by clicking the logo below!
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="https://www.facebook.com/NTUsg/" target="_blank"><i style="font-size:40px;" class="icon-facebook"></i></a></li>
							<li><a href="https://github.com/RWU001/DIP" target="_blank"><i style="font-size:40px;" class="icon-github" stlye="font-size:40px"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</footer>
	</div><!-- END container-wrap -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>
	<?php
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		echo "<script>alertMessage('$message');</script>";
	}
	session_destroy();
	?>
	</body>
</html>

