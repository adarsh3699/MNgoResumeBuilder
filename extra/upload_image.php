<?php
	$upload_address = "../images/"; //change this address when deplying somewhere else

	//creating the required folder if folder is not present	
	$fold_status = 0;	
	if (!file_exists($upload_address)) 
	{
		$oldmask = umask(0); //for giving all permission to the folder
	    if(mkdir($upload_address, 0777, true))
	    {
	    	umask($oldmask);

	    	$fold_status = 1;
	    }		    			   
	}
	else
		$fold_status = 1;

//uploading file	
	if($fold_status == 1)//folder where file is to be uploaded exists
	{
		if($_FILES['file']["name"] != '')
		{
			$name = trim( $_FILES['file']["name"]);
			$file_extension = strtolower(substr(strrchr($name, '.'), 1) ); //extension name of the file

		//getting new name of the file
			$new_name = "image." . "png";
			$upload_location = $upload_address . $new_name;

		//adding uploaded file info in db
			if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_location))
			{
				echo 1;
			}
			else
				echo 0;
		}	
		else
		{
			echo 0; //file uploading failed
		}		
	}
	else
	{
		echo -2; //file uploading directory not present in server
	}
?>