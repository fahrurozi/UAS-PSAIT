<?php

/**
* Author : https://roytuts.com
*/

require_once 'server.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
	$sql = "DELETE FROM pasiens WHERE id_pasien = " . mysqli_real_escape_string($dbConn, $_GET['id']);
	dbQuery($sql);
}

//End of file