<?php
	// Include config file
	require_once "config.php";
		$timestamp = date("D, d M Y H:i:s");
	// Create connection
	$conn = mysqli_connect($sqlserver, $sqluser, $sqlpass);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = "USE ".$db;
	mysqli_query($conn, $query);
	$query = "SELECT * FROM posts";
	$table = mysqli_query($conn, $query);
	
	if($table){
		echo '<div style="color:green">last refreshed on: '.$timestamp.'</div></br></br>';
		while($row = mysqli_fetch_array($table)){   //Creates a loop to loop through results
			echo $row['name'] . " at ".$row['timestamph']." -</br></br>" . $row['post']."</br><hr size=1px>";
		}
	}
?>