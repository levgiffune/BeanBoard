<?php
	$file = "posts.txt";
	if (!is_file($file)){
		$f = fopen($file, "w") or die ("cannot create file: posts.txt");
		fclose($f);
		chmod($file, 0777); 
	}
	$f = fopen("$file", "r") or die("cannot open file: posts.txt");
	
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
	}
?>