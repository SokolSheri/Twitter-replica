<?php
include("dbh.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['emailCreate'];
    $password = sha1($_POST['passCreate']);
    $fName = mysqli_real_escape_string($conn,strtoupper($_POST['firstName']));
    $lName = mysqli_real_escape_string($conn,strtoupper($_POST['lastName']));

    $sql1 = "SELECT * FROM users WHERE email = '$email'";
	$result1 = mysqli_query($conn,$sql1);
	$row = mysqli_fetch_assoc($result1);
	$count = mysqli_num_rows($result1);
	
	if($count == 1){
       echo "<script>alert('This email is already on file');</script>"; 
echo '<script>setTimeout(function(){
        window.location = "loginForm.php";
      }, 10); </script>';
    }else{
      $randy= rand(1,3);
	$sql = "INSERT INTO users(firstName,lastName,email,pass,picc) VALUES ('$fName','$lName','$email','$password','$randy')";
    $result = mysqli_query($conn,$sql);
    echo "<script>alert('Account Created!');</script>"; 
    echo '<script>setTimeout(function(){
            window.location = "loginForm.php";
          }, 10); </script>';
    }

}
  ?>