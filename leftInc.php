<div id="left">


<div id="navi">


<ul>
<li>
<i class='fab fa-twitter' id="twit"></i>
</li>
<li>
<a href="main.php"><i class='fas fa-home' id="firstLi"></i>
Home</a>

</li>


<li>
<a href="noti.php"><i class='fas fa-bell' id="secondLi"></i>
Notifications</a> <?php 
$sqlNo ="SELECT * FROM notif WHERE userid = $active AND seconduser <> $active AND seen=0;";
$resultNo = mysqli_query($conn,$sqlNo);
$rowNo=mysqli_fetch_assoc($resultNo); 
$countNo=mysqli_num_rows($resultNo);
if($countNo>0){

echo "<span style='color:#1EA2F1;'>&nbsp;".$countNo."</span>";

}

?>
</li>
<li>
<a href="messages.php"><i class='fas fa-inbox' id="thirdLi"></i>
Messages</a>
</li>

<li>
<i class='far fa-bookmark' id="bookLi"></i>
Bookmarks
</li>
<li>

<?php 

echo "<a href='othersPage.php?profVal=".$active."'>";

?><i class='fas fa-thumbtack' id="fourthLi"></i>



Profile</a>

</li>



<li>
<i class='far fa-list-alt' id="moreLi"></i>

More
</li>

<li>


<button id="sidePost">Tweet</button>


</li>



<li id="bottomMe">
<a href="logOut.php">Log Out</a>
</li>
</ul>

</div>




  </div>