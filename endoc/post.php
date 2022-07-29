<?php

	include("inc.php");

	$remove = 'doc/'.$_POST['remove'];
	if(strlen($remove) > strlen('doc/') + 1 && file_exists($remove))
	{
		$status=unlink($remove);  
	}

	$fname = 'doc/'.md5($_POST['title']);
	$myfile = fopen($fname, "w+") or die("Unable to open file!");

	$content = $_POST['editor-markdown-doc'];
	fwrite( $myfile, $_POST['title'] );
	fwrite( $myfile, "\n" );
	fwrite( $myfile, $content );
	fclose($myfile);

	header('Location:index.php'); 

?>