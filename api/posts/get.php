<?php
include "../../config/database.php";

$s = $_GET['s'];

$page = 0;
$skip = 0;
$limit = 12;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $skip = ($page - 1) * $limit;
}




$postList = $db->query("SELECT post.id, post.title, post.cover, post.description, post.views, post.likes,
post.category_id, category.category FROM post INNER JOIN category ON post.category_id = category.id 
WHERE post.title LIKE '%$s%' OR post.description 
LIKE '%$s%' OR post.recipe LIKE '%$s%' ORDER BY id DESC 
LIMIT $skip, $limit;
");

$pageQuery = $db->query("SELECT COUNT(post.id) as all_pro FROM post");
$pageRes = $pageQuery->fetch_object();
$totalPages = $pageRes->all_pro / 12;

$result = [
    'posts' => []
];

while ($post = $postList->fetch_object()) {
    array_push($result['posts'], $post);
}

$result['totalPages'] = ceil($totalPages);

echo json_encode($result);