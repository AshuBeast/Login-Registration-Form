<?php
//Since port has been changed on XAMPP, change MySQL server connections.
$server = 'localhost';
$username = '';
$password = '';
$database = 'Employee';

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}
