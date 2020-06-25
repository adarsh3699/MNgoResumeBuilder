<?php
	//referenmce link: https://www.html2pdfrocket.com/

// Set parameters
	$apikey = '64f08e9b-22d8-491a-b878-69a9c1d94211';

	$filename = "Resume.pdf";

	$value = 'http://mngo.in/resume/pdf.html';
	// $value = 'http://localhost:8080/MNgoResumeBuilder'; // can aso be a url, starting with http..
	 
// Convert the HTML string to a PDF using those parameters.  Note if you have a very long HTML string use POST rather than get.
	$result = file_get_contents( "http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&JavascriptDelay=" . "5000&DisableShrinking=true&FileName='" . $filename . "'&value=" . urlencode($value) );
	 
// Output headers so that the file is downloaded rather than displayed
// Remember that header() must be called before any actual output is sent
	header('Content-Description: MNGO Resume Builder\'s pdf');
	header('Content-Type: application/pdf');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . strlen($result));
	header('Content-disposition: inline; filename="' . $filename . '"');

// Make the file a downloadable attachment - comment this out to show it directly inside the 
	// web browser.  Note that you can give the file any name you want, e.g. alias-name.pdf below:
	// header('Content-Disposition: attachment; filename=' . 'Resume.pdf' );
	 
// Stream PDF to user
	echo $result;
?>