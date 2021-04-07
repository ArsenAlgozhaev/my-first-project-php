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

    <?php
        $pid = $_GET['pid'];
        $query = $db->query("SELECT * FROM account WHERE id = $pid");
        $user = $query->fetch_object();
        $sumLikes=$db->query("SELECT SUM(likes) FROM post WHERE author_id=$pid")->fetch_array()[0];
        $sumPosts=$db->query("SELECT SUM(postNum) FROM post WHERE author_id=$pid")->fetch_array()[0];
    ?>

    <section class="profile conteiner indent">
        <div class="info-profile">
            <img src="image/wigets/user-img.png" alt="" class="profile-img">
        </div>
        <div class="profile-data">
            <div class="profile-name">
                <h3><?=$user->name?>    <?=$user->surname?></h3> 
            </div>
            <div class="profiler-follower wrap">
                <div class="profile-subscribers" id="btn-open-subscribe">
                    <p id="num-profile-follower"><?=$user->subscriber?></p>
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
            <?php
                    if(isset($_SESSION['suser_id'])) {
                ?>
                <form action="api/subscribe/subscribe.php" method="POST">
                <button
                <?php
                $sub_id = $_SESSION['suser_id'];
                $post = $db->query("SELECT * FROM post WHERE author_id = $pid;");
                $postRow = $post->fetch_object();
                $subcribersRow = $db->query("SELECT * FROM subscribers WHERE us_id = '$postRow->author_id' AND sub_id = '$sub_id';");
                if ($subcribersRow->num_rows > 0) {
                ?>
                    style="color: #fff; background-color: #2c2424;"
                <?php
                } else {
                ?>
                    style="color: #2c2424; background-color: #fff;"
                <?php
                }
                ?>
                class="subscribe">
                <?php
                if ($subcribersRow->num_rows > 0) {
                ?>
                    Unsubscribe
                <?php
                } else {
                ?>
                    Subscribe
                <?php
                }
                ?>
                </button>
                <input name ="sub_id" type="hidden" value="<?=$sub_id?>">
                <input name ="uid" type="hidden" value="<?=$user->id?>">
                </form>
                <?php
                    }
                ?>
        </div>
    </section>


    <section class="conteiner indent posts wrap">


            <?php
                $posts = $db->query("SELECT * FROM post WHERE author_id = $pid;");
                while ($row = $posts->fetch_object()) {
                        $userId = $row->category_id;
                        $user = $db->query("SELECT * FROM category WHERE id = $userId");
                        $userIdPost = $user->fetch_object();

            ?>


        <div class="post">
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
                </div>
                <a href="detail.php?pid=<?=$row->id?>" class="heading-posts"><?= $row->title; ?></a>
                <div class="title-posts">
                    <p><?= substr($row->description, 0, 190) . "..."; ?></p>
                </div>
                <div class="types-food">
                    <h3><?=$userIdPost->category?></h3>
                </div>
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