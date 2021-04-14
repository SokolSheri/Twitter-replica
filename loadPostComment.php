<?php

include('dbh.php');
session_start();

$active=$_SESSION['userid'];
$posty = $_POST['postId'];


$sqlL ="SELECT * FROM posts WHERE postid = $posty;";
$resultL = mysqli_query($conn,$sqlL);
$rowL=mysqli_fetch_assoc($resultL);
$second=$rowL['userid'];
$findName="SELECT * FROM users WHERE userid=$second;";
$resultN = mysqli_query($conn,$findName);
$rowN=mysqli_fetch_assoc($resultN);

if($rowN['picc']==1){
    $picy = 'images/one.jpg';
  }else if($rowN['picc']==2){
    $picy = 'images/two.png';
    
  }else{
    $picy = 'images/three.jpg';
    
  }
  
echo '<div class="replyPh"><img class="smallH" src="'.$picy.'"></div><div class="replyP"><p>'.ucwords(strtolower($rowN['firstName'])." ".strtolower($rowN['lastName'])).'</p></div>';
echo "<p class='message2'>".$rowL['msg']."</p><br>";

?>