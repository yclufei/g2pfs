<?php
    $fname = 'doc/'.$_GET['data'];

	if(strlen($fname) > strlen('doc/') + 1 && file_exists($fname))
	{
		$status=unlink($fname);    

		if($status){  

			echo "File deleted successfully";  
			header('location:'.getenv("HTTP_REFERER"));

		}else{  

			echo "Sorry!";    

		}  
	
	}
?>