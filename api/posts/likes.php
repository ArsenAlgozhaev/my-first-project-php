<?php
include "../../config/database.php";


    $pid = $_POST['pid'];
    $uid = $_POST['uid'];



    $like = $db->query("SELECT likes FROM post WHERE id = $pid;");
    $row = $like->fetch_object();

    $likes = $row->likes;

    $likesRow = $db->query("SELECT * FROM likes WHERE post_id = '$pid' AND like_user_id = '$uid';");
    if ($likesRow->num_rows > 0) {
        
        $dislike = $likes - 1;
        $db->query("DELETE FROM likes WHERE post_id = '$pid' AND like_user_id = '$uid'");
        $db->query("UPDATE post SET likes = '$dislike' WHERE id = '$pid'");
    } else {
        $likesPost = $likes + 1;
        $db->query("UPDATE post SET likes = '$likesPost' WHERE id = '$pid'");
        $db->query("INSERT INTO likes (post_id, like_user_id) VALUE ('$pid', '$uid')");
    }


    header("Location: $BASE_URL/detail.php?pid=$pid");