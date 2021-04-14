<?php
include('mainInclude.php');

?>
<head>
  <meta charset="utf-8">
  <title>Results</title><?php
include('headerInclude.php');


?>

  </head>
<body>
<?php
include('leftInc.php');


?>

<div id='middleC'>

  <?php
  echo "<div id='userr'>";
$arr = explode(' ',trim($_GET['searchBar']));
$first = strtoupper($arr[0]);

$sql = "SELECT * FROM users WHERE firstName = '$first'";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  if($count>0){

    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

          if($row['picc']==1){
            $picy = 'images/one.jpg';
          }else if($row['picc']==2){
            $picy = 'images/two.png';
            
          }else{
            $picy = 'images/three.jpg';
            
          }

    $inputty = 'profVal'.$row['userid'];
   
      echo "<form action='othersPage.php' id='".$inputty."' method='get' onclick='submitForm(this.id)'><img class='smallH' style='margin-right:1em;' src='".$picy."'>".ucwords(strtolower($row['firstName'])." ".strtolower($row['lastName']))."<input type='hidden' id='profVal' name='profVal' value=".$row['userid']."></form>"; 
      }
      }

      echo "<hr class='notihr'>";
      echo "</div>";
    }else{
      echo "<h1 style='position:relative;left:4em;'>No users found</h1>";

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