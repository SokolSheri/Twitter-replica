
<br><br><br>
<?php

include('dbh.php');
session_start();

$active=$_SESSION['userid'];
$posty = $_POST['postId'];

$sqlL ="SELECT * FROM posts WHERE postid = $posty;";
$resultL = mysqli_query($conn,$sqlL);
$count = mysqli_num_rows($resultL);
$rowL=mysqli_fetch_assoc($resultL);

$retweetsL="SELECT * FROM retweets WHERE userid=$active AND postid=$posty;";
$retweetsR = mysqli_query($conn,$retweetsL);
$countRt = mysqli_num_rows($retweetsR);




if($countRt <= 0){
$rt=$rowL['msg']."ID=".$posty;
$rtnum=$rowL['rts']+1;

$sqlI = "INSERT INTO posts (userid,msg,likes,rts) VALUES ('$active','$rt',0,0)";
    $resultI = mysqli_query($conn,$sqlI);
    
$incr ="UPDATE posts SET rts=$rtnum WHERE postid=$posty;";
$ri = mysqli_query($conn,$incr);

$insRts ="INSERT INTO retweets (userid,postid) VALUES ('$active','$posty')";
$resultRt = mysqli_query($conn,$insRts);

}else{

$rtnum=$rowL['rts']-1;

$delRt ="DELETE FROM retweets WHERE userid=$active AND postid=$posty;";
$dResult =mysqli_query($conn,$delRt);

$decr ="UPDATE posts SET rts=$rtnum WHERE postid=$posty;";
$di = mysqli_query($conn,$decr);

$allposts ="SELECT * FROM posts WHERE userid=$active;";
$allResults = mysqli_query($conn,$allposts);


$compy = "ID=".$posty;
$nPos = $posty+1;

if(mysqli_num_rows($allResults)>0){
    while($row=mysqli_fetch_assoc($allResults)){

$stry = $row['msg'];
$newStr=substr($stry,strrpos($stry,"I"));
$newP= "ID=".$posty;
if($newStr==$compy){
    $delPost ="DELETE FROM posts WHERE userid=$active AND msg LIKE '%$newP';";
    $dpResult =mysqli_query($conn,$delPost);
}
    }
}

}


$sql ="SELECT DISTINCT rts,timey,msg,postid,likes,posts.userid FROM posts INNER JOIN userFollows ON posts.userid = userFollows.whotheyfollow WHERE userFollows.userid='$active' OR posts.userid='$active' ORDER BY posts.timey DESC";
//$sql ="SELECT * FROM posts INNER JOIN userFollows ON posts.userid = userFollows.whotheyfollow WHERE userFollows.userid='$active' OR posts.userid='$active' ORDER BY timey DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
$formId = "postValue".$row['postid'];
$profVal=$row['userid'];
$findName = "SELECT * FROM users WHERE userid=$profVal;";
$resultName = mysqli_query($conn,$findName);
$personRow=mysqli_fetch_assoc($resultName);
$atname=strtolower($personRow['firstName'])."".strtolower($personRow['lastName']);
$postName =ucwords(strtolower($personRow['firstName'])." ".strtolower($personRow['lastName']));
$pName=$postName;
$postidd=$row['postid'];
$findComments ="SELECT * FROM comments WHERE postid=$postidd;";
$resultComments = mysqli_query($conn,$findComments);
$countC=mysqli_num_rows($resultComments);
if($countC>0){
  $countC=$countC-1;
}

$didlk= "SELECT postid FROM likes WHERE userid=$active AND liked=1;";
$didlkr=mysqli_query($conn,$didlk);
$didlkarr=mysqli_fetch_assoc($didlkr);
$cLk=mysqli_num_rows($didlkr);

$didrt= "SELECT * FROM retweets WHERE userid=$active;";
$didrtr=mysqli_query($conn,$didrt);
$didrtarr=mysqli_fetch_assoc($didrtr);
$cRt=mysqli_num_rows($didrtr);

$lkArr=[];
while($didlkarr=mysqli_fetch_assoc($didlkr)){
  array_push($lkArr,$didlkarr['postid']);
  }

$rtArr=[];
while($didrtarr=mysqli_fetch_assoc($didrtr)){
  array_push($rtArr,$didrtarr['postid']);
  }


$timee=explode("-", $row['timey']);

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


echo "<div id='oneP' style='position:relative; height:inherit;margin-top:-60px;'>";
if($personRow['picc']==1){
  $picy = 'images/one.jpg';
}else if($personRow['picc']==2){
  $picy = 'images/two.png';
  
}else{
  $picy = 'images/three.jpg';
  
}

$og = $row['msg'];
$newG=substr($og,strrpos($og,"I"));
$comG=substr($og,strrpos($og,"="));
$comG = "ID".$comG;

if($newG==$comG){

$newG=substr($og,strrpos($og,"I")+1);

$oL = strlen($row['msg']);
$mins = strrpos($og,"I");
$theSub = $oL-$mins;
$searchG= substr($og,strrpos($og,"=")+1);

$otP ="SELECT DISTINCT * FROM posts WHERE postid=$searchG;";
$rez = mysqli_query($conn,$otP);
$otPa=mysqli_fetch_assoc($rez);

$formId = "postValue".$searchG;
$profVal=$otPa['userid'];
$findName = "SELECT * FROM users WHERE userid=$profVal;";
$resultName = mysqli_query($conn,$findName);
$personRow=mysqli_fetch_assoc($resultName);
$atname=strtolower($personRow['firstName'])."".strtolower($personRow['lastName']);
$postName =ucwords(strtolower($personRow['firstName'])." ".strtolower($personRow['lastName']));
$postidd=$searchG;
$findComments ="SELECT * FROM comments WHERE postid=$postidd;";
$resultComments = mysqli_query($conn,$findComments);
$countC=mysqli_num_rows($resultComments);
if($countC>0){
  $countC=$countC-1;
}

if($personRow['picc']==1){
  $picy = 'images/one.jpg';
}else if($personRow['picc']==2){
  $picy = 'images/two.png'; 
}else{
  $picy = 'images/three.jpg';
}

echo "<p style='positon:relative;left:-500px;' class='message'><a id='aPic' href='othersPage.php?profVal=".$profVal."'><span style='position:absolute;top:-16px; left:76px; font-size:12px; color:#8898A6;'><i class='fas fa-retweet' style='font-size:12px;color:#8898A6;'></i> ".$pName." Retweeted</span><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".$postName."</span>&nbsp;&nbsp;<span style='position:absolute;top:0px; color:#8898A6;'>&middot;&nbsp;&nbsp;".$timee[1]." ".$timee[2]." ".$timee[0]."</span>
<form action='comment.php' method='post' id=".$formId."> 
<div 
style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' value=".$otPa['postid']."><span onclick='viewPost(".$otPa['postid'].")'>".$otPa['msg']."</span>
</div></p><br>";
echo '<div style="z-index:100;position:relative; top:-70px;">';
echo "<button type='button' class='comBtn' value=".$otPa['postid']."><i class='fab fa-rocketchat' id='comit'></i></button><span style='color:#8898A6'>".$countC."</span>";

if($row['userid']==$active){
  echo "<button type='button' class='rt'><i class='fas fa-retweet' id='rtBtn' style='color:lightgreen;'>&nbsp;".$otPa['rts']."</i>
  </button>";
  }else{
    echo "<button type='button' class='rt'><i class='fas fa-retweet' id='rtBtn'>&nbsp;".$otPa['rts']."</i>
  </button>";
  }

  if(in_array($otPa['postid'],$lkArr)){
    echo "<button type='button' class='thumbs' value=".$otPa['postid']."><i class='far fa-heart' id='likeit' style='color:red;'></i></button><span style='color:#8898A6'>".$otPa['likes']."</span>";
  
  }else{
  echo "<button type='button' class='thumbs' value=".$otPa['postid']."><i class='far fa-heart' id='likeit'></i></button><span style='color:#8898A6'>".$otPa['likes']."</span>";
  }
echo '</div>';
echo "</form>";
echo "<hr class='notihr' style='top:-80px;'>";
echo "</div>";

}else{
  echo "<p style='positon:relative;left:-500px;' class='message'><a id='aPic' href='othersPage.php?profVal=".$profVal."'><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".$postName."</span>&nbsp;&nbsp;<span style='position:absolute;top:0px; color:#8898A6;'>&middot;&nbsp;&nbsp;".$timee[1]." ".$timee[2]." ".$timee[0]."</span>
  <form action='comment.php' method='post' id=".$formId."> 
  <div 
  style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' value=".$row['postid']."><span onclick='viewPost(".$row['postid'].")'>".$row['msg']."</span>
  </div></p><br>";
  echo '<div style="z-index:100;position:relative; top:-70px;">';
echo "<button type='button' class='comBtn' value=".$row['postid']." onclick='comment(this.value)'><i class='fab fa-rocketchat' id='comit'></i></button><span style='color:#8898A6'>".$countC."</span>";
if(in_array($row['postid'],$rtArr)){
  echo "<button type='button' class='rt'><i class='fas fa-retweet' onclick='rt(".$row['postid'].")' id='rtBtn' style='color:lightgreen;'>&nbsp;".$row['rts']."</i>
</button>";
}else{
echo "<button type='button' class='rt'><i class='fas fa-retweet' onclick='rt(".$row['postid'].")' id='rtBtn'>&nbsp;".$row['rts']."</i>
</button>";
}

if(in_array($row['postid'],$lkArr)){
  echo "<button type='button' class='thumbs' value=".$row['postid']." onclick='likeIt(this.value,".$row['likes'].",".$profVal.")'><i class='far fa-heart' id='likeit' style='color:red;'></i></button><span style='color:#8898A6'>".$row['likes']."</span>";
}else{
  echo "<button type='button' class='thumbs' value=".$row['postid']." onclick='likeIt(this.value,".$row['likes'].",".$profVal.")'><i class='far fa-heart' id='likeit'></i></button><span style='color:#8898A6'>".$row['likes']."</span>";
}

echo '</div>';
echo "</form>";
echo "<hr class='notihr' style='top:-80px;'>";
echo "</div>";
}
}

}


?>




