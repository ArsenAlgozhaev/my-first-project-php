<?php
include "../../config/database.php";

$id = $_GET['pid'];

$db->query("DELETE FROM post WHERE id = $id;");

header("Location: $BASE_URL/profile.php");