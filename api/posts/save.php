<?php
include "../../config/database.php";

$title = $_POST['title'];
$description = $_POST['description'];
$recipe = $_POST['recipe'];
$uid = $_POST['uid'];
$postNum = $_POST['postNum'];
$category = $_POST['category'];
$img_path = null;




if (isset($_FILES["post-img"]) && isset($_FILES["post-img"]["name"])) {
    $temp = explode(".", $_FILES["post-img"]["name"]); // png, jpg, pdf, jpeg, svg
    $file_name = time() . "." . end($temp); // 164515723.png
    move_uploaded_file($_FILES["post-img"]["tmp_name"], "../../image/posts/$file_name");
    $img_path = "image/posts/$file_name";
}

$db->query("INSERT INTO post (title, description, author_id, views, recipe, postNum, category_id, cover) VALUES ('$title', '$description', '$uid', 0, '$recipe', '$postNum', '$category', '$img_path');");

$result = [
    'sucess' => true
];


echo json_encode($result);