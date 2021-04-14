<html>
<?php
include('dbh.php');
session_start();
$active=$_SESSION['userid'];
$_SESSION['viewed']=0;
?>


<head>
  <meta charset="utf-8">
  <title>Notifications</title>

  <?php
include('headerInclude.php');


?>
  </head>

  
<body> 

<?php
include('leftInc.php');


?>


<div id='middleC'>

<h5 id="midHome">Notifications</h5>
<hr class='notihr'>
<?php
$sql="SELECT * FROM notif WHERE userid=$active ORDER BY timey DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
$second=$row['seconduser'];
$posty=$row['postid'];
    $s="SELECT * FROM users WHERE userid=$second";
    $r = mysqli_query($conn,$s);
    $row1=mysqli_fetch_assoc($r);
    $s1="SELECT msg FROM posts WHERE postid=$posty";
    $r1=mysqli_query($conn,$s1);
    $row2=mysqli_fetch_assoc($r1);

    if($row1['picc']==1){
      $picy = 'images/one.jpg';
    }else if($row1['picc']==2){
      $picy = 'images/two.png';
      
    }else{
      $picy = 'images/three.jpg';
      
    }

    if($row1['userid']!=$active){
    if($row['seen']==0){
      echo "<div style='background-color: #39424D;margin:-1em; padding-top:1em;'>";
      echo "<a href='othersPage.php?profVal=".$second."'>";
   echo '<img class="smallH" src="'.$picy.'"><h6 class="boldName" style="padding-left:.5em; background-color: #39424D;">'.ucwords(strtolower($row1['firstName']." ".$row1['lastName'])).'</h6>';
    }else{
      echo "<div style='margin:-1em; padding-top:1em;'>";
      echo "<a href='othersPage.php?profVal=".$second."'>";
      echo '<img class="smallH" src="'.$picy.'"><h6 class="boldName" style="padding-left:.5em;">'.ucwords(strtolower($row1['firstName']." ".$row1['lastName'])).'</h6>';
    }
   
   echo "</a>";
    if($row['notType']==1){
        echo "<p style='padding-left:1em;'>Liked your post</p>";
        
    }else {
      $target=$row['pinpoint'];
      $findComment="SELECT * FROM comments WHERE commentid=$target";
      $fcresult = mysqli_query($conn,$findComment);
      $fcrow= mysqli_fetch_assoc($fcresult);
        echo "<p style='padding-left:1em;'>Commented on your post - ".$fcrow['messages']."</p>";
    }
    echo "<p style='padding-left:2em;'>'".$row2['msg']."'</p>";
   echo "<hr class='notihr'>";
   echo "</div>";

}
}

}

if($_SESSION['viewed']==0){
    $sqlU="UPDATE notif SET seen=1 WHERE userid=$active";
    $rU=mysqli_query($conn,$sqlU);
    $_SESSION['viewed']=1;
}


?>

</div>

<?php
include('rightInc.php');


?>


<script src='script.js'>



</script>

</body>





</html>

