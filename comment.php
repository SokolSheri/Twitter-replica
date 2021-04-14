<html>
<?php
include('dbh.php');
session_start();
$active=$_SESSION['userid'];

if($_SERVER["REQUEST_METHOD"] == "GET") {
$active=$_SESSION['userid'];
    $postid=$_GET['sendPost'];
    $message=mysqli_real_escape_string($conn,$_GET['sendComment']);
    
	$sqlI = "INSERT INTO comments(postid,messages,userid) VALUES ('$postid','$message','$active')";
    $resultI = mysqli_query($conn,$sqlI);
    $sqlN ="SELECT * FROM comments WHERE postid=$postid AND userid=$active;";
    $resultN = mysqli_query($conn,$sqlN);
    $rowN =mysqli_fetch_assoc($resultN);
    $sendNot= $rowN['commentid'];
    $sqlFP="SELECT * FROM posts WHERE postid=$postid";
    $resultFP = mysqli_query($conn,$sqlFP);
    $rowFP =mysqli_fetch_assoc($resultFP);
    $secondaryU=$rowFP['userid'];
    $sqlNI ="INSERT INTO notif(userid,seconduser,postid,notType,seen,pinpoint) 
    VALUES('$secondaryU','$active','$postid',2,0,'$sendNot');";
    $resultNI = mysqli_query($conn,$sqlNI);
}else{
    $active=$_SESSION['userid'];
    $postid=$_POST['postValue'];
}

?>


<head>
  <meta charset="utf-8">
  <title>Comments</title>
  <?php
include('headerInclude.php');


?>
  </head>

  <?php
include('leftInc.php');


?>
<body id='chn'> 

<div id='middleC'>


<?php


$sqlL ="SELECT * FROM posts WHERE postid = $postid;";
$resultL = mysqli_query($conn,$sqlL);
$rowL=mysqli_fetch_assoc($resultL);

$s=$rowL['userid'];
$nq="SELECT * FROM users WHERE userid=$s;";
$rq=mysqli_query($conn,$nq);
$rn=mysqli_fetch_assoc($rq);



$sqlLC ="SELECT * FROM comments WHERE postid = $postid;";
$resultLC = mysqli_query($conn,$sqlLC);

$findComments ="SELECT * FROM comments WHERE postid=$postid;";
$resultComments = mysqli_query($conn,$findComments);
$countC=mysqli_num_rows($resultComments);
if($countC>0){
  $countC=$countC-1;
}


$timee=explode("-", $rowL['timey']);

$newA= str_split($timee[2],2);
$timee[2]=$newA[0];

if($timee[1]==='01'){
  $timee[1]='Jan';
}else if($timee[1]==='02'){
  $timee[1]='Feb';
}else if($timee[1]==='03'){
  $timee[1]='March';
}else if($timee[1]==='04'){
  $timee[1]='Apr';
}else if($timee[1]==='05'){
  $timee[1]='May';
}else if($timee[1]==='06'){
  $timee[1]='June';
}else if($timee[1]==='07'){
  $timee[1]='July';
}else if($timee[1]==='08'){
  $timee[1]='Aug';
}else if($timee[1]==='09'){
  $timee[1]='Sept';
}else if($timee[1]==='10'){
  $timee[1]='Oct';
}else if($timee[1]==='11'){
  $timee[1]='Nov';
}else{
  $timee[1]='Dec';
}



if($rn['picc']==1){
  $picy = 'images/one.jpg';
}else if($rn['picc']==2){
  $picy = 'images/two.png';
  
}else{
  $picy = 'images/three.jpg';
  
}



echo "<p class='message'><a id='aPic' href='othersPage.php?profVal=".$s."'><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".ucwords(strtolower($rn['firstName'])." ".strtolower($rn['lastName']))."</span>&nbsp;&nbsp;<span style='position:absolute;top:0px; color:#8898A6;'>&middot;&nbsp;&nbsp;".$timee[1]." ".$timee[2]." ".$timee[0]."</span>

<div 
style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' value=".$rowL['postid']."><span onclick='viewPost(".$rowL['postid'].")'><br>".$rowL['msg']."</span>
</div></p><br><br>";
echo '<div style="z-index:100;position:relative; top:-70px;">';
echo "<button type='button' class='comBtn' value=".$rowL['postid']." onclick='comment(this.value)'><i class='fab fa-rocketchat' id='comit'></i></button><span style='color:#8898A6'>".$countC."</span>";
echo "<button type='button' class='rt'><i class='fas fa-retweet' onclick='rt(".$rowL['postid'].")' id='rtBtn'>&nbsp;".$rowL['rts']."</i>
</button>";
echo "<button type='button' class='thumbs' value=".$rowL['postid']." onclick='likeIt(this.value,".$rowL['likes'].",".$s.")'><i class='far fa-heart' id='likeit'></i></button><span style='color:#8898A6'>".$rowL['likes']."</span>";
echo '</div>';
echo "<hr class='notihr' style='top:-80px;'>";
echo "</div><br><br><br><br><br><br><br><br><br><br><br><br>";



$sqlL ="SELECT * FROM posts WHERE postid = $postid;";
$resultL = mysqli_query($conn,$sqlL);
$rowLL=mysqli_fetch_assoc($resultL);

$sqlLC ="SELECT * FROM comments WHERE postid = $postid;";
$resultLC = mysqli_query($conn,$sqlLC);
$rowLC =mysqli_fetch_assoc($resultLC);

  if(mysqli_num_rows($resultLC)>0){
    while($rowLC=mysqli_fetch_assoc($resultLC)){
        $userIDD = $rowLC['userid'];
        $sqlLN ="SELECT * FROM users WHERE userid = $userIDD";
$resultLN = mysqli_query($conn,$sqlLN);
$rowLN=mysqli_fetch_assoc($resultLN);

if($rowLN['picc']==1){
  $picy = 'images/one.jpg';
}else if($rowLN['picc']==2){
  $picy = 'images/two.png';
  
}else{
  $picy = 'images/three.jpg';
  
}


echo "<div style='width:42%;position:relative; left:25%;height:inherit;'>";
if(isset($message)){
  
if($rowLC['messages']==$message){
  echo "<div style='position:relative; top:0px;margin-top:-50px;'>";

  echo "<p class='message' style='positon:relative; top:0px;' ><a id='aPic' href='othersPage.php?profVal=".$rowLN['userid']."'><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".ucwords(strtolower($rowLN['firstName'])." ".strtolower($rowLN['lastName']))."</span>

  <div 
  style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' >".$rowLC['messages']."
  </div></p><br>";
  
}else{
  echo "<div style='position:relative; top:0px;margin-top:-50px;'>";
  echo "<p class='message' style='positon:relative;top:0px;' ><a id='aPic' href='othersPage.php?profVal=".$rowLN['userid']."'><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".ucwords(strtolower($rowLN['firstName'])." ".strtolower($rowLN['lastName']))."</span>

  <div 
  style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' >".$rowLC['messages']."
  </div></p><br>";
}
  }else{
    echo "<div style='position:relative; top:0px;margin-top:-50px;'>";
    echo "<p class='message' style='positon:relative;top:0px;' ><a id='aPic' href='othersPage.php?profVal=".$rowLN['userid']."'><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".ucwords(strtolower($rowLN['firstName'])." ".strtolower($rowLN['lastName']))."</span>

    <div 
    style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' >".$rowLC['messages']."
    </div></p><br>";

  }


echo '<div style="z-index:100;position:relative; top:-70px;">';
echo "<button type='button' class='comBtn'><i class='fab fa-rocketchat' id='comit'></i></button>";
echo "<button type='button' class='rt'><i class='fas fa-retweet' id='rtBtn'>&nbsp;</i>
</button>";
echo "<button type='button' class='thumbs'><i class='far fa-heart' id='likeit'></i></button><span style='color:#8898A6'></span>";
echo "<hr style='background-color:#37464D;'>";
echo '</div>';
echo "</div>";
echo "</div>";


  
}
  }
echo "</div>";
?>

</div>

<?php
include('rightInc.php');


?>

<script src='script.js'>



</script>


</body>

</html>

