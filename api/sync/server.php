<?php

/**
* Author : https://roytuts.com
*/
	
$dbConn = mysqli_connect('192.168.56.69', 'user1', '123', 'sait_webservice_rs') or die('MySQL connect failed. ' . mysqli_connect_error());

function dbQuery($sql) {
	global $dbConn;
	$result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
	return $result;
}

function dbFetchAssoc($result) {
	return mysqli_fetch_assoc($result);
}

function closeConn() {
	global $dbConn;
	mysqli_close($dbConn);
}
	
//End of filefile
