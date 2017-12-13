<?php
$conn = new mysqli("localhost", "root", "", "royalbarberdb");
if($conn->connect_error){
echo "connection error";
	}
?>