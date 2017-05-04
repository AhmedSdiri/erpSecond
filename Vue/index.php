<?php

//include_once ("../Controleur/ControllerLogin.php");
include '../Vue/vueLogin.php';

$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}

session_start();
echo 'test';

if($_POST['username'] != "" && $_POST['password'] != "") {
    extract($_POST);
    
    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $pass_encrypt = mysqli_real_escape_string($mysqli,$_POST['password']);

    $fetch = $mysqli->query("SELECT * FROM `users` WHERE username='$username' AND `password` = '$pass_encrypt'");

    $row = mysqli_fetch_array($fetch);
    
    if (password_verify($pass_encrypt, $row['passowrd'])) {
        $_SESSION['login_username'] = $row['username'];
		$d=mktime(11, 14, 54, 8, 12, 2014);
		$_SESSION['log_time'] = date("Y-m-d h:i:sa", $d);
        echo 1;
        echo "<script>alert(\"db connected\")</script>";
    } else {
        echo 0;
        echo "<script>alert(\"not connected\")</script>";
    }

        } else {

    header("Location:../Vue/index.php");
}
	echo 'testfin';

?>