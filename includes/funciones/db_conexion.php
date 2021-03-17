<?php
	$conn = new mysqli('127.0.0.1:3306', 'root', '113415', 'gdlwebcamp');

	if($conn->connect_error) {
		echo $error -> $conn->connect_error;
	}
?>