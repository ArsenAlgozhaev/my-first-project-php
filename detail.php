<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail</title>
    <?php 
        include "components/head.php" 
    ?>
</head>
<body>
    <?php
        include "components/header.php"
    ?>

    <section class="detail conteiner indent">
        <?php
            $pid = $_GET['pid'];
            $query = $db->query("SELECT * FROM post WHERE id = $pid");
            $revPost = $db->query("SELECT * FROM review INNER JOIN account ON review.uid = account.id WHERE post_id = $pid");
            $revRev = $db->query("SELECT * FROM review WHERE post_id = $pid");
            $revIsset = $revRev->fetch_object();
            $post = $query->fetch_object();
            $category = $db->query("SELECT * FROM category WHERE id = $post->category_id");
            $categoryRow = $category->fetch_object();
            if (isset($_SESSION['suser_id']) != $post->author_id) {
                $db->query("UPDATE post SET views = views + 1 WHERE id = $pid");
            }
            $userId = $post->author_id;
            $user = $db->query("SELECT * FROM account WHERE id = $userId");
            $userIdPost = $user->fetch_object();
        ?>
        <div class="detail-block">
            <h3 class="heading-detail"> <?= $post->title; ?> </h3>
            <div class="recipe-detail">
                <img src="
                <?php
                            if (isset($post->cover)) {
                            ?>
                            <?=$post->cover?>
                            <?php
                                } else {
                            ?>
                            image/posts/template.png
                            <?php
                                }
                            ?>
                " alt="">
                <div class="recipe-food">
                    <ul>
                        <li><?= $post->recipe; ?></li>
                    </ul>
                </div>
            </div>
            <div class="about-posts detail-posts">
                <?php
                    if(isset($_SESSION['suser_id'])) {
                ?>
                <form action="api/posts/likes.php" method="POST">
                <button
                <?php
                $likesRow = $db->query("SELECT * FROM likes WHERE post_id = '$pid' AND like_user_id = '$uid';");
                if ($likesRow->num_rows > 0) {
                ?>
                    style="color: #fff; background-color: #2c2424;"
                <?php
                }
                ?>
                class="likes-posts"><?=$post->likes?><i class="far fa-thumbs-up"></i></button>
                <input name ="uid" type="hidden" value="<?=$_SESSION['suser_id']?>">
                <input name ="pid" type="hidden" value="<?=$post->id?>">
                </form>
                <?php
                    }
                ?>
            </div>
            <div class="about-recipe-detail">
                <p>
                    <?= $post->description; ?>
                </p>
            </div>
            <div class="types-food">
                <h3><?=$categoryRow->category?></h3>
            </div>
            <div class="by-author">
                <h3>By: <a href="users-profile.php?pid=<?=$post->author_id?>"><?=$userIdPost->surname?>    <?=$userIdPost->name?></a></h3>
            </div>
        </div>
    </section>


    <section class="reviews conteiner
    
    <?php
        if (isset($_SESSION['suser_id'])) {
    ?>
    indent
    <?php
        }
    ?>
    ">


    <?php
        if (isset($_SESSION['suser_id'])) {
    ?>
        <h3 class="heading">Reviews</h3>
        <?php
            }
        ?>




        <?php
            while ($rev = $revPost->fetch_object()) {
        ?>
        <div class="review">
            <div class="about-reviewer">
                <div class="review-data">
                    <a href="users-profile.php?pid=<?=$rev->id?>" class="review-img">
                        <img src="image/wigets/user-img.png" alt="">
                    </a>
                    <a href="users-profile.php?pid=<?=$rev->id?>" class="reviewer-name">
                    <?=$rev->name?> <?=$rev->surname?>
                    </a>
                </div>
                <p style="font-size: 15px; margin-top: 10px;"><?=$rev->date?></p>
            </div>
            <div class="review-text">
                    <p><?=$rev->content?></p>
            </div>
        </div>
        
        <?php
            }
        ?>

        <?php
            if (isset($_SESSION['suser_id'])) {
                
        ?>
        <form method="POST" action="api/review/save.php">
        <label for="review" style="font-size: 19px; font-weight: bold; margin-left: 148px;">Enter Your review</label>
        <div class="form-review">
        <img src="image/wigets/user-img.png" alt="">
            <div class="input-review">
                <textarea id="review" cols="60" rows="5" name="content"></textarea>
                <input type="hidden" name="pid" value="<?=$pid?>">
                <input type="hidden" name="uid" value="<?=$_SESSION['suser_id']?>">
                <button class="btn-review">send</button>
            </div>
            </div>
        </form>
        <?php
            }
        ?>
    </section>

        <?php
            include "components/body-libs.php"
        ?>

</body>
</html>