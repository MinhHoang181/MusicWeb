<?php
	$servername = "localhost";
	// admin ben t la root
	$username = "root";
	$password = "";
	$dbname = "listmusic";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>