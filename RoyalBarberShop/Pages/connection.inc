<?php
$conn = new mysqli("localhost", "root", "", "RoyalBarber");
if($conn->connect_error){
echo "connection error";
	}
?>