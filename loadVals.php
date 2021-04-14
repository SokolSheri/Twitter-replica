<?php
include('dbh.php');

$newV = $_POST['newVally'];

$changed =$_POST['changed'];
$mainID =$_POST['main'];

$sql ="UPDATE test
SET value = $newV
WHERE id = $mainID;";
$result = mysqli_query($conn,$sql);

$sql1 ="SELECT * FROM test";
$result2 = mysqli_query($conn,$sql1);

if(mysqli_num_rows($result2)>0){
  while($row=mysqli_fetch_assoc($result2)){
    $t= 'a'.$row['id'];
    $s='a'.$t;
    $c=$changed;
    echo "<p>";
    echo "<button class='thumbs' id=".$t." value=".$row['value']." style='opacity:1' onclick='funky(".$t.")'>&#128077; </button> ".$row['value'];
    echo "<input id=".$s." type='hidden' value=".$c.">";
    echo "</p>";
    
  }
}
?>



