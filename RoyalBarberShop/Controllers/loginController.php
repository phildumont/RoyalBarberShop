<?php
include("../Pages/connection.inc");

$email=$_POST["email"];
$password=$_POST["password"];

$loginSql="SELECT email, password FROM customer WHERE email='".$email."'";
 
$loginres=$conn->query($loginSql) or die("cant connect");
$user=mysqli_fetch_array($loginres);

if($user['email']==$email && $user['password']==$password){
	header("Location:../Pages/home.php");
	exit();
}
?>