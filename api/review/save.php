<?php
include "../../config/database.php";

$content = $_POST['content'];
$uid = $_POST['uid'];
$pid = $_POST['pid'];

$db->query("INSERT INTO review (content, post_id, uid) VALUES ('$content', '$pid', '$uid');");

header("Location: $BASE_URL/detail.php?pid=$pid");


// $result = [
//     'sucess' => true
// ];

// echo json_encode($result);