<?php
	session_start();
	if (!isset($_SESSION['username'])){
		$direct = header("Location: ../html/homepage.php");
	}
?>