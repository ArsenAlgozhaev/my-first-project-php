<?php
include "../../config/database.php";


$user_img_path = null;




if (isset($_FILES["user-img"]) && isset($_FILES["user-img"]["name"])) {
    $temp = explode(".", $_FILES["user-img"]["name"]); // png, jpg, pdf, jpeg, svg
    $user_file_name = time() . "." . end($temp); // 164515723.png
    move_uploaded_file($_FILES["user-img"]["tmp_name"], "../../image/users/$user_file_name");
    $user_img_path = "image/users/$user_file_name";
}

$db->query("UPDATE account SET img = '$user_img_path'");

header("location: $BASE_URL/profile.php");