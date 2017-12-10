<?php
	require('../php/directing.php');
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
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	
	
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
	<body onload="checkFileAPI();">

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container-wrap">
			<div class="top-menu">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="#"class="fontChoice">Welcome<span style="color:rgba(0,0,0,0)">&nbsp;</span><?php echo "<i>" . $_SESSION['username'] . "!</i>";?></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="homepage.php">Home</a></li>
							<li><a href="../php/querytask.php">Dashboard</a></li>
							<li><a href="upload-new-task.php">Upload New Task</a></li>
							<li onclick="myFunction()"><a id="topUpWalletHead">Top Up Wallet</a></li>
							<li><a href="homepage.php">Logout</a></li>
						</ul>
					</div>
				</div>
				<div>
					<?php
						$wallet = $_SESSION['wallet'];
						echo "<div style='float:right;font-size:14px; margin-top:10px;font-family: 'Lato', sans-serif;'><center>Your wallet is $" . $wallet . "</center></div><br>";
					?>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="container-wrap">
		<div id="requester" class="fh5co-light-grey">
			<div class="row animate-box">
				<div class="col-md-12 fh5co-heading" style="font-size:16px;">
					<h2 style="font-size:30px;" class="text-center">
            Upload New Task
          </h2>
					<br>
					<form enctype="multipart/form-data" method="post" action="../php/upload-new-task.php">
						<div class="col-md-6">
							<div class="taskQuestion" style="border-right: 2px solid black;">
								<label for="taskTitle">
									Task Title:
								</label>
								<input type="text" class="inputTask" id="taskName" name="taskTitle" required>

								<br><br>

								<label for="taskBudget">
									Budget: 
								</label>
								<div class="inputTask">
										$<input type="number" step="0.01" id="taskBudget" name="taskBudget" min="0" required>
								</div>

								<br><br>

								<label for="taskReward">
									Reward for each question: 
								</label>
								<div class="inputTask">
										$<input type="number" step="0.01" name="taskReward" id="taskReward" min="0" required>
								</div>

								<br><br>
								
								<label for="taskDescription">
									Description of task: <br>
								</label>
								<textarea name="taskDescription" id="taskDescription" maxlength="370" required></textarea>

								<label for="taskName" style="margin-top:20px;">
									Upload your images(in zip file): 
									<br>
									<input type="file" name="zip_file" id="zip_file" required>
								</label>
								<br><br><br><br>
								<div style="width:97%;">
									<center>
										<input type="submit" value="Create Task" style="width:100%;">
									</center>
								</div>
							</div>
						</div>
						
						<div class="col-md-6" style="padding:0;">

							<button type="button" onclick="helpButton()" style="float:right;margin-right:30px;">HELP</button>
							Upload a txt file to fill the form<br> <input type="file" onchange="readText(this)" id="classDetails"/>
							<br>
							<table id="detailClass" cellpadding="50" border="0px">
							<tr>
								<td>How many classes do you want:</td>
								<td><input type="number" name="classNumber" id="numberOfClasses"  required/></td>
							</tr>
							<!-- <tr>
								<td>How many features each classes have:</td>
								<td><input type="number" name="featureNumber" id="numberOfFeatures"  required/></td>
							</tr> -->
							<tr>
								<td></td>
								<td><button type="button" onclick="createListClass()" id="createDetails">Create Class Details</button></td>
							</tr>
							</table>
						</div>
					</form>

					<div id="myDIV" style="background-color: #D3D3D3;">
						<center>Top Up Wallet</center>
						<form name="wallet" action="../php/wallet.php" method="post">
							<center>Amount to top up:</center>
							<center><input type="number" name="number" size="14" min="0" required/></center>
							<center><input type="submit" name="wallet" value="Add Wallet" /></center>
						</form>
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
					<li><a href="#requester">Dashboard</a></li>
					<li><a href="upload-new-task.php">Upload New Task</a></li>
					<li><a href="homepage.php">Logout</a></li>
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
							<li><a href="https://www.facebook.com/NTUsg/"><i style="font-size:40px;" class="icon-facebook"></i></a></li>
							<li><a href="https://github.com/RWU001/DIP"><i style="font-size:40px;" class="icon-github" stlye="font-size:40px"></i></a></li>
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
	<script src="../js/wallet.js"></script>
	</body>
	<?php
    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
			echo "<script>alertMessage('$message');</script>";
			$_SESSION['message'] = NULL;
    }
  ?>
</html>

