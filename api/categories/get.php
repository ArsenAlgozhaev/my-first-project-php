<?php
include "../../config/database.php";

$categoryList = $db->query("SELECT * FROM category;");

$result = [];

while ($category = $categoryList->fetch_object()) {
    array_push($result, $category);
}

echo json_encode($result);