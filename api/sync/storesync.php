
<?php

/**
* Author : https://roytuts.com
*/

require_once 'server.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
//header('Access-Control-Allow-Headers', 'Content-Type,Accept');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data/
	$data = json_decode(file_get_contents("php://input", true));
	
	$sql = "INSERT INTO pasiens(nim,alamat,jenis_kelamin,nama) 
    VALUES('" . mysqli_real_escape_string($dbConn, $data->nim) . "',
    '" . mysqli_real_escape_string($dbConn, $data->alamat) . "',
    '" . mysqli_real_escape_string($dbConn, $data->jenis_kelamin) . "',
    '" . mysqli_real_escape_string($dbConn, $data->nama) . "')";
	dbQuery($sql);
}

//End of file
