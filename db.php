<?php
/*
Author: CTTHANH
Website: https://ctthanh.com
*/

// Enter your Host, username, password, database below.

// Khai bao thong tin Database 

// I left password empty because i do not set password on localhost.

$servername = "sql6.freesqldatabase.com";
$username = "sql6413955";
$password = "397Td9ahPL";
$dbname = "sql6413955";
$conn = new mysqli($servername, $username, $password, $dbname);
$con = mysqli_connect("sql6.freesqldatabase.com","sql6413955","397Td9ahPL","sql6413955");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>
