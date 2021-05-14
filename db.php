<?php
/*
Author: CTTHANH
Website: https://ctthanh.com
*/

// Enter your Host, username, password, database below.

// Khai bao thong tin Database 

// I left password empty because i do not set password on localhost.

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "cart";
$conn = new mysqli($servername, $username, $password, $dbname);
$con = mysqli_connect("localhost","root","mysql","cart");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>