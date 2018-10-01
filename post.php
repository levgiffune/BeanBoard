<?php
	// Include config file
	require_once "config.php";
	$timestamp = date("D, d M Y H:i:s");
	
	$query = "CREATE DATABASE IF NOT EXISTS ".$db;
	mysqli_query($conn, $query);
	$query = "USE ".$db;
	mysqli_query($conn, $query);
	$query = "CREATE TABLE IF NOT EXISTS posts(ID int NOT NULL AUTO_INCREMENT, loggedin BOOLEAN, name varchar(20), timestamph varchar(30), post TEXT, PRIMARY KEY (ID))";
	mysqli_query($conn, $query);
	if(isset($_POST['submit'])){
		$loggedin = (strlen($_COOKIE['token']) < 20 ? 1 : 0)/* <-- see index.html line 34*/;
		$token = mysqli_real_escape_string($conn, $_COOKIE['token']);
		$message = mysqli_real_escape_string($conn, htmlspecialchars($_POST["message"], ENT_QUOTES));
		$query = 'INSERT INTO posts (loggedin,name,timestamph,post) VALUES ('.$loggedin.',"anonyomous'.$token.'","'.$timestamp.'","'. $message.'")';
		mysqli_query($conn, $query);
	}
	header('Location: index.html');
	exit;
	
?>