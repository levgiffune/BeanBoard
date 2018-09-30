<?php
	date_default_timezone_set('America/New_York');
	$timestamp = date("D, d M Y H:i:s");
	//config, change these to your own values for your db
	$sqlserver="127.0.0.1";
	$sqluser="root";
	$sqlpass="PervertedLem0n.exe";
	$db = "BoardDB";
	//end config
	
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
		echo "last refreshed at: ".$timestamp;
		while($row = mysqli_fetch_array($table)){   //Creates a loop to loop through results
			echo "</br></br><hr size=1px>" . $row['name'] . " at ".$row['timestamph']." -</br>" . $row['post'];  
		}
	}
?>