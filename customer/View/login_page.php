<?php
include("../control/process.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<h1>Login</h1><hr>
<form action="" method="POST">
<table>
    <tr><td>Username</td> 
    <td><input type="text" name="uname" placeholder="Enter username or email" required></td></tr>
       <tr><td>Password</td>
       <td><input type="password"name="password" required></td></tr>
</table>
<input type="submit" name="submitlog" value="Login">
<input type="Reset" name="Reset" value="Reset"><br>
<p><a href="customer_registration.php"><p>Don't Have an Account? Register now!</p></a>
</form>
</body>
</html>