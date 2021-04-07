<?php
include "../../config/database.php";

$name = $_POST['myName'];
$surname = $_POST['mySurname'];
$phoneNumber = $_POST['myPhoneNumber'];
$email = $_POST['myEmail'];
$password = $_POST['myPassword'];
$hashPassword = sha1($password);
session_start();

$exist = $db->query("SELECT * FROM account WHERE email = '$email';");

if ($exist->num_rows > 0) {
    $userDb = $exist->fetch_object();
    if ($userDb->password == $hashPassword) {
        $_SESSION['suser_id'] = $userDb->id;
            header("location: $BASE_URL/main_menu.php");
    } else {
        header("location: $BASE_URL/main_menu.php?error=not_match");
    }
} else {
    header("location: $BASE_URL/main_menu.php?error=not_found");
}
