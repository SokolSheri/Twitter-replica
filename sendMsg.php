<html>
<?php
include('dbh.php');
session_start();

$active=$_SESSION['userid'];
$secondary = $_POST['userMsg'];
$msg= $_POST['contents'];

$sql = "INSERT INTO msg(userid,usermsgid,msgC,seen) VALUES ('$active','$secondary','$msg',0)";
$result = mysqli_query($conn,$sql);

$sqlL ="SELECT * FROM msg WHERE userid = $active AND usermsgid =$secondary OR userid = $secondary AND usermsgid =$active;";
$resultL = mysqli_query($conn,$sqlL);


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

<script>

upScroll();

</script>
