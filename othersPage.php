<?php
include('mainInclude.php');
$val = $_GET['profVal'];

$sqlName ="SELECT * FROM users WHERE userid= $val";
$resultName = mysqli_query($conn,$sqlName);
$name = mysqli_fetch_assoc($resultName);

?>

<head>
  <meta charset="utf-8">
  <title><?php echo ucwords(strtolower($name['firstName']." ".$name['lastName']));?></title>
  <?php
include('headerInclude.php');


?>
  </head>
<body>

<?php
include('leftInc.php');



$didlk= "SELECT postid FROM likes WHERE userid=$val AND liked=1;";
$didlkr=mysqli_query($conn,$didlk);
$didlkarr=mysqli_fetch_assoc($didlkr);
$cLk=mysqli_num_rows($didlkr);

$didrt= "SELECT * FROM retweets WHERE userid=$val;";
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

?>

<div id='middleC'>
<h5 id="midHome"><?php
echo ucwords(strtolower($name['firstName']." ".$name['lastName']));

?></h5>


<div id="coverPage2">

</div>
<div id="cmtBack2">
<div id="makeComment2">

<p id='exit' onclick='xCmtt()'>X</p>
<hr class='changeColor'>

<form id="sendMessage" action="message.php" method="post">
<textarea name="sendMsg" id="sendMsg" placeholder="Send Message"></textarea>
<input type="hidden" value="" id="sendFirstMsg" name="sendFirstMsg">
<button id='firstMsg'>Send</button>
</form>

</div>
</div>
<hr class='notihr'>


<div style='position:relative;top:-20px;left:-20px;height:360px;width:820px;border-bottom:1px solid #37454D;'>
<div id='backSplash' style='height:200px;width:820px;background-color:#3D5465;'>

<?php

if($name['picc']==1){
  $picy = 'images/one.jpg';
  echo '<img style="position:relative; top:120px;left:1em;border:4px solid #15212B; border-radius:100%;height:140px;width:140px;" src="'.$picy.'">';

}else if($name['picc']==2){
  $picy = 'images/two.png';
  echo '<img style="position:relative; top:120px;left:1em;border:4px solid #15212B; border-radius:100%;height:140px;width:140px;" src="'.$picy.'">';
  
}else{
  $picy = 'images/three.jpg';
  echo '<img style="position:relative; top:120px;left:1em;border:4px solid #15212B; border-radius:100%;height:140px;width:140px;" src="'.$picy.'">';

}

?>

<h5 style="position:relative;top:122px; left:22px; font-weight:bold;">

<?php


echo ucwords(strtolower($name['firstName']." ".$name['lastName']));

$sqlFollowing ="SELECT * FROM userFollows WHERE userid = $val AND whotheyfollow != $val";
$resultFollowing = mysqli_query($conn,$sqlFollowing);
$following = mysqli_num_rows($resultFollowing);

$sqlFollow ="SELECT * FROM userFollows WHERE whotheyfollow = $val";
$resultFollow = mysqli_query($conn,$sqlFollow);
$follow = mysqli_num_rows($resultFollow);

?>
</h5>

<p style="position:relative;top:120px; left:21px;">

<span style='font-weight:bold; color:#FFFFFF;'>
<?php echo "<i id='crnrM' onclick='startMsg(".$val.")' class='material-icons'>mail_outline</i>";
?>
<?php
echo $following;

?>
</span>
<span style="color:#8898A6;">
Following
</span>
&nbsp;&nbsp;
<span style='font-weight:bold; color:#FFFFFF;'>
<?php
echo $follow;

?>

</span>
<span style="color:#8898A6">
Followers
</span>



</p>
<?php


echo "<div id='space'>";

$sqlL ="SELECT * FROM userFollows WHERE whotheyfollow = $val AND 
userid = $active;";
$resultL = mysqli_query($conn,$sqlL);
$count = mysqli_num_rows($resultL);

if($val!=$active){
if($count ===1){
  echo "<button id='followBtn' value=".$val." style='background-color:#1EA2F1;color:#FFFFFF;font-weight:bold;height:40px;border:none; border-radius:20px;' onclick='follow(this.value)'>Following</button>";
}else{
  echo "<button id='followBtn' value=".$val." style='width:80px; height:40px; border-radius:20px; font-weight:bold; background-color: rgb(21,33,43);border:1px solid rgb(30,162,241);color:rgb(30,162,241);' onclick='follow(this.value)'>Follow</button>";
}

}else{
  echo "<button id='followBtn' style='right:-480px;width:inherit; padding-left:1em;padding-right:1em; height:40px; border-radius:20px; font-weight:bold; background-color: rgb(21,33,43);border:1px solid rgb(30,162,241);color:rgb(30,162,241);''>Edit profile</button>";

}
echo "</div>";


?>
</div>





</div>
<br>
<br>
<br>
<div id='putNewLikes'>
<?php






$sql = "SELECT * FROM posts WHERE userid = '$val' ORDER BY posts.timey DESC";
  $result = mysqli_query($conn,$sql);
  $c = mysqli_num_rows($result);
  

  if($c<1){
    echo "<h1 style='position:relative;left:1em;'>".ucwords(strtolower($name['firstName']." ".$name['lastName']))." hasn't posted yet</h1>";

  }else{
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

          $formId = "postValue".$row['postid'];
$profVal=$row['userid'];
$findName = "SELECT * FROM users WHERE userid=$profVal;";
$resultName = mysqli_query($conn,$findName);
$personRow=mysqli_fetch_assoc($resultName);
$atname=strtolower($personRow['firstName'])."".strtolower($personRow['lastName']);
$postName =ucwords(strtolower($personRow['firstName'])." ".strtolower($personRow['lastName']));
$postidd=$row['postid'];
$findComments ="SELECT * FROM comments WHERE postid=$postidd;";
$resultComments = mysqli_query($conn,$findComments);
$countC=mysqli_num_rows($resultComments);
if($countC>0){
  $countC=$countC-1;
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


            $og = $row['msg'];
$newG=substr($og,strrpos($og,"I"));
$comG=substr($og,strrpos($og,"="));
$comG = "ID".$comG;

            if($newG!=$comG){
              echo "<div id='oneP' style='position:relative; height:inherit;margin-top:-60px;'>";
              echo "<p style='positon:relative;left:-500px;' class='message'><a id='aPic' href='othersPage.php?profVal=".$profVal."'><img class='smallH' style='margin-right:1em;' src='".$picy."'></a><span style='font-weight:bold;position:relative;top:-16px;'>".$postName."</span>&nbsp;&nbsp;<span style='position:absolute;top:0px; color:#8898A6;'>&middot;&nbsp;&nbsp;".$timee[1]." ".$timee[2]." ".$timee[0]."</span>
              <form action='comment.php' method='post' id=".$formId."> 
              <div 
              style='width:500px; color:#FFFFFF; position:relative;top:-50px; left:75px;'><input type='hidden' name='postValue' id='postValue' value=".$row['postid']."><span onclick='viewPost(".$row['postid'].")'>".$row['msg']."</span>
              </div></p><br>";
              echo '<div style="z-index:100;position:relative; top:-70px;">';
              echo "<button type='button' class='comBtn' value=".$row['postid']." onclick='comment(this.value)'><i class='fab fa-rocketchat' id='comit'></i></button><span style='color:#8898A6'>".$countC."</span>";
              
              if(in_array($row['postid'],$rtArr)){
                echo "<button type='button' class='rt'><i class='fas fa-retweet' id='rtBtn' style='color:lightgreen;'>&nbsp;".$row['rts']."</i>
              </button>";
              }else{
              echo "<button type='button' class='rt'><i class='fas fa-retweet' id='rtBtn'>&nbsp;".$row['rts']."</i>
              </button>";
              }
             
              if(in_array($row['postid'],$lkArr)){
                echo "<button type='button' class='thumbs' value=".$row['postid']." onclick='likeIt2(this.value,".$row['likes'].",".$profVal.")'><i class='far fa-heart' id='likeit' style='color:red;'></i></button><span style='color:#8898A6'>".$row['likes']."</span>";
              }else{
                echo "<button type='button' class='thumbs' value=".$row['postid']." onclick='likeIt2(this.value,".$row['likes'].",".$profVal.")'><i class='far fa-heart' id='likeit'></i></button><span style='color:#8898A6'>".$row['likes']."</span>";
              }
              echo '</div>';
              echo "</form>";
              echo "<hr class='notihr' style='top:-80px;'>";
              echo "</div>";

            }
      }
      }
    }




?>
</div>
</div>
<div id="coverPage">

</div>
<div id="cmtBack">
  <div id="makeComment">

  <p id='exit' onclick='xCmt()'>X</p>
  <hr class='changeColor'>

<div id="putPostHere"></div>

<hr class='changeColor'>
<form id="sendCommentForm" action="comment.php" method="get">

<textarea name="sendComment" id="sendComment" onkeydown="showColor2()" placeholder="Tweet your reply"></textarea>
<input type="hidden" value="" id="sendPost" name="sendPost">
<button id='replyBtn'>Reply</button>
</form>

</div>
</div>

</div>

<!--
<div id='coverPage3'>
<form action='upload.php' method='POST' enctype='multipart/form-data'>
<input type='file' name='file'>
<button type='submit' name='submit'> UPLOAD </button>
  </form>

  </div>
  -->

<?php
include('rightInc.php');


?>
<script src='script.js'>


</script>

</body>

</html>