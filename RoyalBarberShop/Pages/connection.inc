<?php
$conn = new mysqli("localhost", "root", "", "RoyalBarber");
mysqli_query($conn, "SET CHARACTER SET utf8");
if($conn->connect_error){
echo "connection error";
}
?>