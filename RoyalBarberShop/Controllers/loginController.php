<?php
include("../Pages/connection.inc");

$email=$_POST["email"];
$password=$_POST["password"];

$loginSql="SELECT email, password FROM customer WHERE email='".$email."' and password= ' ".$password."'";
 
$loginres=$conn->query($loginSql) or die("cant connect");
$user=$loginres->fetch_array();
//echo $loginSql;
if($user['email']==$email && $user['password']==$password){
	header("Location:../Pages/home.php");
	echo "nothing";
	echo "nothing";
	exit();
}

?>