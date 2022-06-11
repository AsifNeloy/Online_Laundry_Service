<?php
$Error_f_name = "";
$Error_username = "";
$Error_email = "";
$Error_number = "";
$Error_pass = "";
$Error_pass_cmp = "";
$Error_gender = "";
$customer_gender = "";
$counter = 0;

//customer Registration php validation
if (isset($_REQUEST["submitReg"])) {
    $full_name = $_REQUEST['f_name'];
    $customer_username = $_REQUEST['u_name'];
    $customer_email = $_REQUEST['mail'];
    $customer_number = $_REQUEST["phn_number"];
    $customer_password = $_REQUEST['pass'];
    $Customer_confirm_password = $_REQUEST['confirm_pass'];

    if (empty($_REQUEST['f_name']) || strlen($_REQUEST['f_name']) < 3 || preg_match('~[0-9]+~', $_REQUEST['f_name'])) {
        $Error_f_name = "Please enter a valid name. numeric value is not allowed !";
    } else {
        $full_name = $_REQUEST['f_name'];
        $counter++;
    }

    if (!preg_match('/^[a-zA-Z0-9]{3,}$/', $customer_username)) {
        $Error_username = "username allows only alphanumeric & longer than 2 chars !";
    } else {
        $customer_username = $_REQUEST['u_name'];
        $counter++;
    }

    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $Error_email = "Invalid email Address !";
    } else {
        $customer_email = $_REQUEST['mail'];
        $counter++;
    }
    if (!preg_match('/^[0-9]{11}+$/', $customer_number)) {
        $Error_number = "Enter valid phone number !";
    } else {
        $customer_number = $_REQUEST["phn_number"];
        $counter++;
    }
    $uppercase = preg_match('@[A-Z]@', $customer_password);
    $lowercase = preg_match('@[a-z]@', $customer_password);
    $number    = preg_match('@[0-9]@', $customer_password);
    $specialChars = preg_match('@[^\w]@', $customer_password);
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($customer_password) < 8) {
        $Error_pass = 'Password should be at least 8 characters in length and should include at least one upper & lower case letter, one number, and one special character.';
    } else {
        $customer_password = $_REQUEST['pass'];
        $counter++;
    }
    if ($customer_password != $Customer_confirm_password) {
        $Error_pass_cmp = "Incorrect confirm password !";
    } else {
        $Customer_confirm_password = $_REQUEST['confirm_pass'];
        $counter++;
    }
    if (isset($_POST["gender"])) {
        $customer_gender = $_POST["gender"];
        $counter++;
    } else {
        $Error_gender = "Please select gender !";
    }

    if ($counter == 7) {
        $customer_data = array(
            'Full_name' => $full_name,
            'User_name' => $customer_username,
            'Email' => $customer_email,
            'Phone_number' => $customer_number,
            'Password' => $customer_password,
            'Confrim_password' => $Customer_confirm_password,
            'Gender' => $customer_gender,
        );

        //json work
        $existing_Data = file_get_contents('../data/data.json');
        $customer_JsonData = json_decode($existing_Data);

        $customer_JsonData[] = $customer_data;
        $jsondata = json_encode($customer_JsonData, JSON_PRETTY_PRINT);
        if (file_put_contents("../data/data.json", $jsondata)) {

            echo "<br>Registration successful !";
            echo "<html> <a href='login_page.php'> Click Here </a> </html>";
        }
    } else {
        echo "Registration failed !";
    }
}

//customer login 
session_start();
$customer_data = file_get_contents('../data/data.json');
$decoded_data = json_decode($customer_data);

if (isset($_POST["submitlog"])) {
    foreach ($decoded_data as  $key => $udata) {


        if ($udata->User_name == $_POST["uname"] || ($udata->Email==$_POST["uname"]) && $udata->Password == $_POST["password"]) {

            $_SESSION["User_name"] = $_POST["uname"];
            $_SESSION["Password"] = $_POST["password"];
            header("location: ../View/customer_dashboard.php");
        }
    }

    echo "<h4>Your username or password is incorrect !<h4>";
}
?>