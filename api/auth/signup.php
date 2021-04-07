<?php
include "../../config/database.php";

$name = $_POST['myName'];
$surname = $_POST['mySurname'];
$phoneNumber = $_POST['myPhoneNumber'];
$email = $_POST['myEmail'];
$password = $_POST['myPassword'];
$hashPassword = sha1($password);

$exist = $db->query("SELECT * FROM account WHERE email = '$email';");

if ($exist->num_rows > 0) {
    header("location: $BASE_URL/main_menu.php?error=exist_account");
} else {
    $db->query("INSERT INTO account (name, surname, email, phoneNumber, password) VALUES ('$name', '$surname', '$email', '$phoneNumber', '$hashPassword');");
    header("location: $BASE_URL/main_menu.php");
}
