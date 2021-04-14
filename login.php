<?php
include("dbh.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = mysqli_real_escape_string($conn,$_POST['emailLogin']);
	$password = sha1(mysqli_real_escape_string($conn,$_POST['passLogin']));
	$sql = "SELECT * FROM users WHERE email = '$email' and pass = '$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$active = $row['userid'];
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];
	$pic=$row['picc'];
	$count = mysqli_num_rows($result);
	
	
	if($count == 1){
    $_SESSION['email'] = $email;
	$_SESSION['userid']=$active;
	$_SESSION['name']=$firstName." ".$lastName;
	$_SESSION['picture']=$pic;
	header("location: main.php");
	}else{
	header("location: loginForm.php");
	}
}
  ?>