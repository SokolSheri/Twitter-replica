<?php

include('dbh.php');
session_start();

$active=$_SESSION['userid'];
$secondary = $_POST['sendFirstMsg'];
$msg= $_POST['sendMsg'];




$sql = "INSERT INTO msg(userid,usermsgid,msgC,seen) VALUES ('$active','$secondary','$msg',0)";
$result = mysqli_query($conn,$sql);

header("location:othersPage.php?profVal=".$secondary);
?>