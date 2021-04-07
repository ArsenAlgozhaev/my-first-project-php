<?php
include "../../config/database.php";


    $sub_id = $_POST['sub_id'];
    $uid = $_POST['uid'];



    $sub = $db->query("SELECT subscriber FROM account WHERE id = $uid;");
    $row = $sub->fetch_object();

    $subcribers = $row->subscriber;

    $subcribersRow = $db->query("SELECT * FROM subscribers WHERE us_id = '$uid' AND sub_id = '$sub_id';");
    if ($subcribersRow->num_rows > 0) {
        $unsubcribeAccount = $subcribers - 1;
        $db->query("DELETE FROM subscribers WHERE us_id = '$uid' AND sub_id = '$sub_id'");
        $db->query("UPDATE account SET subscriber = '$unsubcribeAccount' WHERE id = '$uid'");
    } else {
        $subcribeAccount = $subcribers + 1;
        $db->query("UPDATE account SET subscriber = '$subcribeAccount' WHERE id = '$uid'");
        $db->query("INSERT INTO subscribers (us_id, sub_id) VALUE ('$uid', '$sub_id')");
    }


    header("Location: $BASE_URL/users-profile.php?pid=$uid");