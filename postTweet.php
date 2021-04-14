<?php

include('dbh.php');
session_start();
$active=$_SESSION['userid'];
?>
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
<body>

  <?php


$posty = mysqli_real_escape_string($conn,$_POST['thePost']);


if(strlen($posty)<1){
  header("location:main.php");
}else{
$sql = "INSERT INTO posts (userid,msg,likes,rts) VALUES ('$active','$posty',0,0)";
  $result = mysqli_query($conn,$sql);

  $sql2="SELECT * FROM posts WHERE timey=(SELECT MAX(timey) FROM posts WHERE userid='$active');";
  $result2 = mysqli_query($conn,$sql2);
  $row=mysqli_fetch_assoc($result2);
  $post1=$row['postid'];
    
  $sql3 = "INSERT INTO comments (postid,messages,userid) VALUES ('$post1','hi','$active');";
	$result3 = mysqli_query($conn,$sql3);
   header("location:main.php");
}


?>

</body>

</html>