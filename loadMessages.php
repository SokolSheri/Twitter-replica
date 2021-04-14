<html>
<?php
include('dbh.php');
session_start();

$active=$_SESSION['userid'];
$secondary = $_POST['userMsg'];


$sqlL ="SELECT * FROM msg WHERE userid = $active AND usermsgid =$secondary OR userid = $secondary AND usermsgid =$active;";
$resultL = mysqli_query($conn,$sqlL);

$checkSeen ="UPDATE msg SET seen=1 WHERE userid=$secondary AND usermsgid=$active";
$sresult=mysqli_query($conn,$checkSeen);


echo "<div id='allChat'>";
while($rowL=mysqli_fetch_assoc($resultL)){

    if($rowL['userid']==$active){
        echo "<div class='myMsg'>".$rowL['msgC']."</div><p class='myMsgTm'>".$rowL['clockt']."</p>";
    }else{

    echo "<div class='otherMsg'>".$rowL['msgC']."</div><p class='otMsgTm'>".$rowL['clockt']."</p>";
}
}

echo "</div>";
?>




