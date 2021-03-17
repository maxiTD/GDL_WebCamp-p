<?php
	$conn = new mysqli('us-cdbr-east-03.cleardb.com', 'be0b28e2f31a0e', 'ed159e06', 'heroku_cb3ab3c7e6aa44f');

	if($conn->connect_error) {
		echo $error -> $conn->connect_error;
	}
?>