<?php
include 'config1.php';

$msg = "";
$user_msg = "";
$email_msg = "";
$psw_msg = "";

if (isset($_POST['submit'])) {

    if (isset($_POST['name']) && $_POST['name'] != '') {
        $user_name = $_POST['name'];
    } else {
        $user_msg = "Please enter User Name";
    }
    if (isset($_POST['email']) && $_POST['email'] != '') {
        $email = $_POST['email'];
    } else {
        $email_msg = "Please enter Email";
    }
    if (isset($_POST['psw']) && $_POST['psw'] != '') {
        $password = md5($_POST['psw']);
    } else {
        $psw_msg = "Please enter Password";
    }
    $obj = new database();
    $obj->insert('user', ['user_name' => $user_name, 'email' => $email, 'password' => $password, 'account_type' => 'SUB_ADMIN']);
//    print_r($obj->getresult());
    if ($obj->getresult()) {
        header('location: sub-admin.php');
    } else {
        $msg = 'this is oops unable to insert data';
    }


}


?>
