<?php

/**
* Author : https://roytuts.com
*/

require_once 'server.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	
	// $sql = "UPDATE pasiens SET name = '" . mysqli_real_escape_string($dbConn, $data->name) . "' WHERE id = " . $data->id;
	// $sql = "UPDATE pasiens SET name = '" . mysqli_real_escape_string($dbConn, $data->name) . "', address = '" . mysqli_real_escape_string($dbConn, $data->address) . "' WHERE id = " . $data->id;
	//update nim, nama, jenis_kelamin, alamat
	$sql = "UPDATE pasiens SET nim = '" . mysqli_real_escape_string($dbConn, $data->nim) . "', nama = '" . mysqli_real_escape_string($dbConn, $data->nama) . "', jenis_kelamin = '" . mysqli_real_escape_string($dbConn, $data->jenis_kelamin) . "', alamat = '" . mysqli_real_escape_string($dbConn, $data->alamat) . "' WHERE id_pasien = " . $data->id;
	dbQuery($sql);
}

//End of file