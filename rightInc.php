<div id="right">




<form id="searchForm" name="searchForm" action="results.php" method="get">



<input type="text" id="searchBar" name="searchBar" placeholder="Search Friends">

<div id="whatHap">

<p id='headerW'>What's Happening</p>

<ul>
<li class='underWli'>
  <p class='title'>MLB - Trending</p>
  <p class="meat">
Astros at Rays
</p>
</li >
<li class='underWli'>
<p class='title'>NBA - Trending</p>
<p class="meat">

LeBron</p>


</li>

<li class='underWli'>
<p class='title'>Miami - 17k Tweets</p>
<p class="meat">
Miami Heat</p>


</li>

<li class='underWli'>
<p class='title'>Trending with Travis Scott</p>
<p class="meat">
Kanye West
</p>


</li>

<li class='underWli'>
<p class='title'>Trending in USA</p>
<p class="meat">
Monday Night Football
</p>


</li>
<li class='underWli'>
<p class='title'>Trending in USA</p>
<p class="meat">
The Bachelorette
</p>


</li>
</ul>
</div>


</form>

<div id="msgPop">
<span id="hideMsg">Messages  </span>
<i onclick='goBack()' class='material-icons' id='goBArr'>arrow_back</i>
<i class='fas fa-arrow-up' id="upArrow" onclick="popToggle('a')"></i>
<i class='fas fa-arrow-down' id="downArrow" onclick="popToggle('b')"></i>

<div id="showMsgHere">

<hr style='width:92%;background-color:#37454D;position:absolute;left:15px;'><br>

</div>


<?php



$sqlL = "SELECT usermsgid,userid FROM msg WHERE userid=$active OR usermsgid=$active ORDER BY clockt DESC;";
$resultL = mysqli_query($conn,$sqlL);

$count = mysqli_num_rows($resultL);

if($count>0){

if(mysqli_num_rows($resultL)>0){
  $usersArr = array();
  while($rowL=mysqli_fetch_assoc($resultL)){
    if($rowL['usermsgid']==$active){
      $usermsg =$rowL['userid'];
    }else{
      $usermsg =$rowL['usermsgid'];
    }
    array_push($usersArr,$usermsg);
   
  }

 $usersArr=array_unique($usersArr);
 $usersArr=array_values($usersArr);
 
}

echo "<div id='listNames'>";
echo "<br>";
//echo "<hr style='width:92%;background-color:#37454D;position:absolute;left:15px;'><br>";

for($x = 0; $x < count($usersArr); $x++){
$userL =$usersArr[$x];

  $sqlLU = "SELECT * FROM users WHERE userid=$userL;";
    $resultLU = mysqli_query($conn,$sqlLU);
    $checkSeen ="SELECT * FROM msg WHERE userid=$userL AND usermsgid=$active AND seen=0";
    $sresult=mysqli_query($conn,$checkSeen);
    $counts = mysqli_num_rows($sresult);
    $rowSeen=mysqli_fetch_assoc($sresult);
    $rowLU =mysqli_fetch_assoc($resultLU);
    $newId="show".$userL;
    $newId2="hide".$userL;
    $sendMsg="sendMsg".$userL;

   

    if($counts>0){
      echo "<div class='convoNames' style='color:#1EA2F1;'id=".$newId2." onclick='viewConvo(".$userL.")'>".ucwords(strtolower($rowLU['firstName'])." ".strtolower($rowLU['lastName']))."</div>";

    }else{
    echo "<div class='convoNames' id=".$newId2." onclick='viewConvo(".$userL.")'>".ucwords(strtolower($rowLU['firstName'])." ".strtolower($rowLU['lastName']))."</div>";
    }
    echo "<div id=".$newId." style='visibility:hidden; position:absolute; top:1400%;'>";
    echo "<input class='inlineSend' type='text' placeholder='Start a new message' id=".$sendMsg.">";
    echo "<button class='inlineBtn' onclick='insertMsg(".$userL.")'><i id='sPlane' class='material-icons'>send</i>
    </button>";
    echo "</div>";
    

    
    
}

echo "</div>";


}



?>

  </div>

</div>
