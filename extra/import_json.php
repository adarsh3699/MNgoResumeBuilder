<?php
	if(isset($_FILES['file'])) {
		if($_FILES['file']["name"] != '')
		{
		//reading that file
			$myfile = @fopen($_FILES['file']['tmp_name'], 'r') or die ("-100");
			$dataJSON = fread($myfile, filesize($_FILES['file']['tmp_name']));
			fclose($myfile);

		//extracing json from file
			$dataArray = @json_decode($dataJSON, TRUE);
			if(json_last_error() == JSON_ERROR_NONE)
			{
			//verifying json
				if(count($dataArray) == 1) 
				{
					$upload_address = "../extra/"; //change this address when deplying somewhere else

				//creating the required folder if folder is not present	
					$fold_status = 0;	
					if (!file_exists($upload_address))  {
						$oldmask = umask(0); //for giving all permission to the folder
					    if(mkdir($upload_address, 0777, true))
					    {
					    	umask($oldmask);

					    	$fold_status = 1;
					    }		    			   
					}
					else {
						$fold_status = 1;
					}

				//uploading file	
					if($fold_status == 1)//folder where file is to be uploaded exists
					{
					//getting new name of the file
						$new_name = "data." . "json";
						$upload_location = $upload_address . $new_name;

					//upload json file
						if(@move_uploaded_file($_FILES['file']['tmp_name'], $upload_location)) {
							echo 1; //success
						}
						else {
							echo 0; //failed to import json file
						}
					}
					else {
						echo -2; //file uploading directory not present in server
					}
				}
				else {
					echo -3; //invalid json 
				}
			}
			else {
				echo -3;  //invalid json 
			}
		}	
		else {
			echo -1; //something went wrong
		}	
	} else {
		echo -1; //something went wrong
	}
?>