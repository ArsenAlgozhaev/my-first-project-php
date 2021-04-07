<?php
include "../../config/database.php";

$pid = $_POST['pid'];

$title = $_POST['newTitle'];
$description = $_POST['newDescription'];
$recipe = $_POST['newRecipe'];
$category = $_POST['newCategory'];

$db->query("UPDATE post SET title='$title', description='$description', recipe='$recipe', category_id='$category' WHERE id = $pid; ");


header("Location: $BASE_URL/profile.php");