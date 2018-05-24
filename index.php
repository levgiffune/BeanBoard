<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post" name="guest">
	Username (optional):    
	
	<input type="text" name="name"/>

	</br>
	</br>
	</br>

	Message:

	<textarea cols="50" name="message" rows="10"> </textarea>

	</br>
	</br>

	<input type="submit" value="post" name="submit"/>
</form>
<?php
	date_default_timezone_set('America/New_York');
	$timestamp = date("D, d M Y H:i:s");
    $file = "posts.txt";
	if (!is_file($file)){
		$f = fopen($file, "w") or die ("cannot create file: posts.txt");
		fclose($file);
		chmod($file, 0777); 
	}
	
	if ( isset( $_POST['submit'] ) ) { 
			$name = $_POST["name"];
			$message = $_POST["message"];
			$numid = rand(00000, 99999);
			if ($name == ""){
				$name = "anonymous".$numid;
			}
			$f = fopen($file, "a");
			fwrite ($f, "$name at $timestamp\n");
			fwrite ($f, "$message\n");
			fclose ($f);
	}
	$f = fopen("posts.txt", "r") or die("cannot open file: posts.txt");
	
	if ($f) {
		$x = -1;
	    while (($line = fgets($f)) !== false) {
			print $line;
			
			if ($x == 1){
				print "</br></br><hr size=1px>";
			}else {
				print "-</br>";}
			$x *= -1;
	    }

	    fclose($f);
		sleep (1);
	}
	
?>