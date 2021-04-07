<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <?php 
        include "components/head.php" 
    ?>
</head>
<body>
    <?php
        include "components/header.php"
    ?>
    
    <section class="profile conteiner indent">
        <div class="info-profile">
            <img src="image/wigets/user-img.png" alt="" class="profile-img">
            

            <h3>Phone-number:<span class="phone-num-profile"><?=$userDb->phoneNumber?></span></h3>
            <h3>Email-address:<span class="email-address-profile"><?=$userDb->email?></span></h3>
        </div>
        <div class="profile-data">
        <?php
            $uid = $_SESSION['suser_id'];
            $query = $db->query("SELECT * FROM account WHERE id = $uid");
            $userDb = $query->fetch_object();
            $sumLikes=$db->query("SELECT SUM(likes) FROM post WHERE author_id=$uid")->fetch_array()[0];
            $sumPosts=$db->query("SELECT SUM(postNum) FROM post WHERE author_id=$uid")->fetch_array()[0];
        ?>
            <div class="profile-name">
                <h3><?=$userDb->name?> <?=$userDb->surname?></h3>
            </div>
            <div class="profiler-follower wrap">
                <div class="profile-subscribers" id="btn-open-subscribe">
                    <p id="num-profile-follower">
                    <?=$userDb->subscriber?>
                    </p>
                    <p>subscribers</p>
                </div>
                <div class="profile-likes">
                    <p id="num-profile-follower">
                        <?php 
                            if ($sumLikes == 0) {
                                echo "0";
                            } else {
                                echo $sumLikes;
                            }
                        ?>
                    </p>
                    <p>likes</p>
                </div>
                <div class="profile-publications">
                    <p id="num-profile-follower">
                                <?php 
                                    if ($sumPosts == 0) {
                                        echo "0";
                                    } else {
                                        echo $sumPosts;
                                    }
                                ?>
                    </p>
                    <p>publications</p>
                </div>
            </div>
        </div>
    </section>


    <section class="conteiner indent posts wrap">
            <?php
                $posts = $db->query("SELECT * FROM post WHERE author_id = $uid;");
                while ($row = $posts->fetch_object()) {
                        $userId = $row->category_id;
                        $user = $db->query("SELECT * FROM category WHERE id = $userId");
                        $userIdPost = $user->fetch_object();

            ?>

        <div class="post block my-profile">
            <a href="detail.php?pid=<?=$row->id?>">
                <img src="
                <?php
                            if (isset($row->cover)) {
                            ?>
                            <?=$row->cover?>
                            <?php
                                } else {
                            ?>
                            image/posts/template.png
                            <?php
                                }
                            ?>
                "
                    alt="">
            </a>
            <div class="post-recipe">
                <div class="about-posts">
                    <div class="likes-posts"><?=$row->likes?><i class="far fa-thumbs-up"></i></div>
                    <div class="view-posts"><?=$row->views?><i class="far fa-eye"></i></div>
                    <div class="rating-posts">5.6</div>
                </div>
                <a href="detail.php?pid=<?=$row->id?>" class="heading-posts"><?= $row->title; ?></a>
                <div class="title-posts">
                    <p><?= substr($row->description, 0, 190) . "..."; ?></p>
                </div>
                <div class="types-food">
                    <h3><?=$userIdPost->category?></h3>
                </div>
                <a href="profile.php?editid=<?=$row->id?>" id="nav-post">Edit</a>
                <a href="api/posts/delete.php?pid=<?=$row->id?>" id="nav-post">Delete</a>
            </div>
        </div>
        
        <?php 
            }
        ?>

    </section>

        <?php
            include "components/body-libs.php"
        ?>
    
</body>
</html>