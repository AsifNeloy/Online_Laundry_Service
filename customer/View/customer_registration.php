<?php
include("../control/process.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<h1>Customer Registration</h1><hr>
<form action="" method="POST" enctype="multipart/form-data">
<table>
    <tr><td>Full Name</td> 
    <td><input type="text" placeholder="" name="f_name"></td>
    <td> <?php
            echo $Error_f_name;
       ?>
       </td></tr>
       <tr><td>Username</td>
       <td><input type="text" placeholder="" name="u_name"></td>
       <td> <?php
            echo $Error_username;
       ?>
       </td></tr>
       <tr><td>Email</td>
       <td><input type="text" placeholder="" name="mail"></td>
       <td> <?php
            echo $Error_email;
       ?>
       </td></tr>
       <tr><td>Phone Number</td> 
       <td><input type="tel" placeholder="" name="phn_number" pattern="^\d{11}$"></td>
       <td> <?php
            echo $Error_number;
       ?>
       </td></tr>
       <tr><td>Password</td>
       <td><input type="password" placeholder="" name="pass"></td>

       <td> <?php
            echo $Error_pass;
       ?>
        </td></tr>
       <tr><td>Confirm Password</td>
       <td><input type="password" placeholder="" name="confirm_pass"></td>
       <td> <?php
            echo $Error_pass_cmp;
       ?>
        </td></tr>
       <tr><td>Gender</td>
       <td><input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other</td>
        <td> <?php
            echo $Error_gender;
       ?>
      </td></tr>
</table>
<br><input type="submit" name="submit" value="Register">
       <input type="Reset" name="Reset" value="Reset">
</form>
</body>
</html>
