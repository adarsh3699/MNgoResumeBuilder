<?php
	if(isset($_POST['jsonToSend']))
	{
		$jsonToSend = $_POST['jsonToSend'];
		
		// print_r($jsonToSend);

		$myfile = fopen("data.json", "w") or die("Unable to open file!");
		fwrite($myfile, $jsonToSend);
		// fwrite($myfile, $txt);
		fclose($myfile);
	}

//getting data from sent in form of json from frontend
	// $data = json_decode(file_get_contents("php://input"), TRUE);
	// print_r($data);
	// if(is_array($data))
	// {
	// 	print_r($data);
	// }
?>