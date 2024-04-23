<?php
function DB_connection()
{
	$port="3306";
	$user="root";
	$pass="ujjwal";
	$host="localhost";
	$dbname="brokernater";
	$tabelname="userinfo";
    $conn = new mysqli($host,$user,$pass,$dbname,$port) or die("Connect failed: %s\n". $conn -> error);
	return $conn;
}
?>

