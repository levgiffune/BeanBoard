<?php
	date_default_timezone_set('America/New_York');
	$timestamp = date("D, d M Y H:i:s");
    $file = "posts.txt";
	//bc I dont want to keep posts.txt in the git repo I guess idk
	if (!is_file($file)){
		$f = fopen($file, "w") or die ("cannot create file: posts.txt");
		fclose($f);
		chmod($file, 0777); 
	}
	
	if ( isset( $_POST['submit'] ) ) { 
			$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
			$message = htmlspecialchars($_POST["message"], ENT_QUOTES);
			//Anonymous names so that there's never a blank name field
			$numid = rand(00000, 99999);
			if ($name == ""){
				$name = "anonymous".$numid;
			}
			//no blank message bc why?
			if ($message){
				//idrk what this does bc I'm too lazy to know what I'm doing but it works
			    $context = stream_context_create();
			    $orig_file = fopen($file, 'r', 1, $context);
				//so new messages are on top
			    $temp_filename = tempnam(sys_get_temp_dir(), 'php_prepend_');
			    file_put_contents($temp_filename, "$name on $timestamp\n");
				file_put_contents($temp_filename, "$message\n", FILE_APPEND);
			    file_put_contents($temp_filename, $orig_file, FILE_APPEND);

			    fclose($orig_file);
			    unlink($file);
			    rename($temp_filename, $file);
			}
	}
	header('Location: index.html');
	exit;
	
?>