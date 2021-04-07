<?php
include "../../config/database.php";

$mainPostList = $db->query("SELECT post.id, post.title, post.cover, post.description, post.views, post.likes,
post.category_id, category.category FROM post INNER JOIN category ON post.category_id = category.id ORDER BY id DESC LIMIT 0, 6;");

$result = [];

while ($mainPost = $mainPostList->fetch_object()) {
    array_push($result, $mainPost);
}

echo json_encode($result);