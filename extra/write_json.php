<?php
	if(isset($_POST['jsonToSend']))
	{
		$jsonToSend = $_POST['jsonToSend'];

		$myfile = @fopen("data.json", "w") or die("-100");
		
		if(fwrite($myfile, $jsonToSend)) {
			echo 1;
		} else {
			echo 0;
		}

		fclose($myfile);
	}
	else
	{
		echo -1;
	}
?>