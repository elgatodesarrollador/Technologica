<?php

// Get IP
$ip = $_SERVER['REMOTE_ADDR'];
//$ip = "196.201.156.159";

// Break apart IP to convert to long decimal
$temp = explode(".", $ip);
$long = (((((($temp[0] * 256) + $temp[1]) * 256) + $temp[2]) * 256) + $temp[3]);

// Check IP is an Australian IP Address
$query = "SELECT * FROM country_ip_list WHERE '$long' BETWEEN start_decimal AND end_decimal";
$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {

	if ($row['short_country'] !== "AU") {
		print "Error: The site has been temporarily taken down.  This should be fixed shortly.  Please contact the administrator (fvirgato@c-direct.com.au) with any further questions.";
		exit;
	}
}

// If code reaches here user is in Australia so log their access
$host = gethostbyaddr($ip);
$url = $_GET['content'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$port = $_SERVER['REMOTE_PORT'];
$date = date("d/m/Y");
$time = date("H:i:s e");
$query = "INSERT INTO access_log (ip, host, url, agent, port, date, time) VALUES ('$ip', '$host', '$url', '$agent', '$port', '$date', '$time')";
$result = mysql_query($query);
?>