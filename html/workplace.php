<!DOCTYPE html>
<html>
<head>
	<title>Workplace</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/NTU.png">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- Allow to use Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../css/workplace.css">
	<!-- <script type="text/javascript" src="../javascript/script.js"></script> -->
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Crowdsourcing DIP Project(EE3080)</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="requester-home.php">Requester Home</a></li>
      <li><a href="worker home.php">Worker Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
		<div id="container">
		<main>
				<div id="imagebox">
					<img src="https://i.pinimg.com/736x/63/0f/0e/630f0ef3f6f3126ca11f19f4a9b85243--dachshund-puppies-weenie-dogs.jpg" alt="cute dog" id="shownPicture">
				</div>
				<div id="questionbox">
					<p id="rejectButton">Reject Task : <button>Reject</button> </p>
					<p id="numberTask"> Number of task : 12/50 </p>
					<form method="post" action="answer.php">
						<div id="questions">
							<ol>
								<li class="eachQuestion">
									<p>Is the picture have <strong>long ears</strong> ?</p>
									<input type="radio" name="question1" value="yes">True<br>
									<input type="radio" name="question1" value="no">False
								</li>
								<li class="eachQuestion">
									<p>Is the picture have <strong>long ears</strong> ?</p>
									<input type="radio" name="question2" value="yes">True<br>
									<input type="radio" name="question2" value="no">False
								</li>
								<li class="eachQuestion">
									<p>Is the picture have <strong>long ears</strong> ?</p>
									<input type="radio" name="question3" value="yes">True<br>
									<input type="radio" name="question3" value="no">False
								</li>
							</ol>
							<div id="submitButton">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-danger">Reset</button>
							</div>
						</div>
					</form>
				</div>
		</main>			
	</div>
</body>

</html>