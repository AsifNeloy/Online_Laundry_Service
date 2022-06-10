<?php
$Error_f_name="";
$Error_username="";
$Error_email="";
$Error_number="";
$Error_pass="";
$Error_pass_cmp="";
$Error_gender="";
if(isset($_REQUEST["submit"]))
{
$full_name=$_REQUEST['f_name'];
$customer_username=$_REQUEST['u_name'];
$customer_email=$_REQUEST['mail'];
$customer_number=$_REQUEST["phn_number"];
$customer_password=$_REQUEST['pass'];
$Customer_confirm_password=$_REQUEST['confirm_pass'];

if($full_name=="" || strlen($full_name)<3 || preg_match('~[0-9]+~', $full_name))
{
    $Error_f_name="Please enter a valid name. numeric value is not allowed !";
}

if(!preg_match('/^[a-zA-Z0-9]{3,}$/', $customer_username))
{
    $Error_username= "username allows only alphanumeric & longer than 2 chars !";
}

if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) 
{
    $Error_email = "Invalid email Address !";
}
if(!preg_match('/^[0-9]{11}+$/', $customer_number))
{
     $Error_number="Enter valid phone number !";
}
$uppercase = preg_match('@[A-Z]@', $customer_password);
$lowercase = preg_match('@[a-z]@', $customer_password);
$number    = preg_match('@[0-9]@', $customer_password);
$specialChars = preg_match('@[^\w]@', $customer_password);
if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($customer_password) < 8)
{
    $Error_pass= 'Password should be at least 8 characters in length and should include at least one upper & lower case letter, one number, and one special character.';
}
else
{
    echo 'Strong password.';
}
if(!strcmp($customer_password, $Customer_confirm_password))
{
    $Error_pass_cmp = "Incorrect confirm password !";
}
$gender="";
if(isset($_POST["gender"]))
{
    $gender = $_POST["gender"];
}
else
{
    $Error_gender= "Please select gender !";
}

// $mydata = array(
//     'First_name'=>$first_name,
//     'Last_name'=>$last_name,
//     'Age'=>$user_age,
//     'Designation'=>$designation,
//     'Preferred_Language'=>$programming_language,
//     'Email'=>$user_email,
//     'password'=>$user_pass,
//     'file'=>$_FILES["myfile"]["name"]
// );

// //json work
//     $jsondata=json_encode($mydata, JSON_PRETTY_PRINT);
//     if(file_put_contents("../data/data.json",$jsondata))
//     {
//         echo "<br>Data saved";
//     }


}
?>