<!DOCTYPE html>

<?php
session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/styles.css" rel="stylesheet">


</head>

<body>

<div id='formz'>
<form id="loginForm" action="login.php" method="post">
<br>
 <input type="text" id="email" name="emailLogin" placeholder="&nbsp;&nbsp;&nbsp;Email"><br>
    <input type="password" id="password" name="passLogin" placeholder="&nbsp;&nbsp;&nbsp;Password"><br>
    <button type="submit" value="submit" id="log">LOG IN</button><br><hr><br>
    <button type="notMember" value="create" id="log">Create New Account</button>
       
    </form>

    <div id="formDiv">
    
    
    </div>

    <form id="createAcc" action="createAcc.php" method="post">
    <h2>Sign Up</h2>
<hr>
<input type="text" id="firstName" name="firstName" placeholder="&nbsp;&nbsp;&nbsp;First Name"> <input type="text" id="lastName" name="lastName" placeholder="&nbsp;&nbsp;&nbsp;Last Name"><br>
 <input type="text" id="email" name="emailCreate" placeholder="&nbsp;&nbsp;&nbsp;Email"><br>
    <input type="password" id="password" name="passCreate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  placeholder="&nbsp;&nbsp;&nbsp;Password"><br>
    <button type="submit" value="submit" id="log">Create Account</button><br><br>
    
       
    </form>

    </div>

  
  <script src="js/script.js"></script>
</body>

<div>


</div>

</html>