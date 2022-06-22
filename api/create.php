
<?php

/**
* Author : https://roytuts.com
*/

require_once 'db.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Access-Control-Allow-Headers', 'Content-Type,Accept');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	
	$sql = "INSERT INTO rumah_sakit(name, address) VALUES('" . mysqli_real_escape_string($dbConn, $data->name) . "', '" . mysqli_real_escape_string($dbConn, $data->address) . "')";
	dbQuery($sql);
}

//End of file