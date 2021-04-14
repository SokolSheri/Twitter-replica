<?php

include('dbh.php');
session_start();

$otherUser = $_POST['following'];
$active= $_SESSION['userid'];

$sqlL ="SELECT * FROM userFollows WHERE whotheyfollow = $otherUser AND 
userid = $active;";
$resultL = mysqli_query($conn,$sqlL);
$count = mysqli_num_rows($resultL);

if($count===1){
$sqlD ="DELETE FROM userFollows
WHERE whotheyfollow = $otherUser AND 
userid = $active;";
$resultD = mysqli_query($conn,$sqlD);
$_SESSION['dofollow']=0;
echo "<button id='followBtn' value=".$otherUser." style='width:80px; height:40px; border-radius:20px; font-weight:bold; background-color: rgb(21,33,43);border:1px solid rgb(30,162,241);color:rgb(30,162,241);' onclick='follow(this.value)'>Follow</button>";
}else{
$sqlI ="INSERT INTO userFollows
(userid,whotheyfollow) VALUES
('$active','$otherUser')";
$resultI = mysqli_query($conn,$sqlI);
$_SESSION['dofollow']=1;
echo "<button id='followBtn' value=".$otherUser." style='background-color:#1EA2F1;color:#FFFFFF;font-weight:bold;height:40px;border:none; border-radius:20px;' onclick='follow(this.value)'>Following</button>";

}


?>