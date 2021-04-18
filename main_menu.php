

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cook-It</title>
    <?php 
        include "components/head.php" 
    ?>
</head>
<body>
    <?php
        include "components/header.php"
    ?>
    
    <section class="fullscreen-bg">
        <div class="overlay">
        </div>
        <video loop="" muted="" autoplay="" poster="image/backgrounds/cooking-bg.jpg" class="fullscreen-bg__video">
            <source src="video/Cooking Meat With Bell Pepper.mp4" type="video/mp4">
        </video>
        <h1 class="output-text"> <span id="outputText"></span> <span class="blink-cursor">|</span></h1>

    </section>
    <section class="conteiner about indent">
        <h3 class="heading">About Us</h3>
        <div class="about-us about-item">
            <img src="image/wigets/Без названия.jpg" alt="">
            <div class="about-item-text">
                <a href="#">About-us</a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam atque rem non pariatur maxime
                    beatae, aliquid odio aspernatur molestias minus amet tenetur reprehenderit dolorem nulla ab autem
                    repudiandae neque esse!
                    Dolores enim illo cupiditate mollitia explicabo nam corporis optio esse ipsam, alias cumque aperiam
                    qui tempora inventore vitae impedit voluptates possimus, soluta vel sint! Odio fugiat perferendis
                    aliquam temporibus voluptate!
                    Veniam totam omnis eos! Sunt accusantium ea odit labore ipsum. Dolore ipsa labore impedit voluptatem
                    dolores pariatur ut vero laborum corrupti eius quam possimus vitae, ea quis sint facilis unde.</p>
            </div>
        </div>
        <div class="about-item">
            <div class="about-site">
                <div class="about-item-text">
                    <a href="#">Abou-site</a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam atque rem non pariatur maxime
                        beatae, aliquid odio aspernatur molestias minus amet tenetur reprehenderit dolorem nulla ab
                        autem repudiandae neque esse!
                        Dolores enim illo cupiditate mollitia explicabo nam corporis optio esse ipsam, alias cumque
                        aperiam qui tempora inventore vitae impedit voluptates possimus, soluta vel sint! Odio fugiat
                        perferendis aliquam temporibus voluptate!
                        Veniam totam omnis eos! Sunt accusantium ea odit labore ipsum. Dolore ipsa labore impedit
                        voluptatem dolores pariatur ut vero laborum corrupti eius quam possimus vitae, ea quis sint
                        facilis unde.</p>
                </div>
                <img src="image/wigets/Без названия (1).jpg" alt="">
            </div>
        </div>
        <div class="about-recipe about-item">
            <img src="image/wigets/scone-varieties.jpg" alt="">
            <div class="about-item-text">
                <a href="#">About-recipe</a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam atque rem non pariatur maxime
                    beatae, aliquid odio aspernatur molestias minus amet tenetur reprehenderit dolorem nulla ab autem
                    repudiandae neque esse!
                    Dolores enim illo cupiditate mollitia explicabo nam corporis optio esse ipsam, alias cumque aperiam
                    qui tempora inventore vitae impedit voluptates possimus, soluta vel sint! Odio fugiat perferendis
                    aliquam temporibus voluptate!
                    Veniam totam omnis eos! Sunt accusantium ea odit labore ipsum. Dolore ipsa labore impedit voluptatem
                    dolores pariatur ut vero laborum corrupti eius quam possimus vitae, ea quis sint facilis unde.</p>
            </div>
        </div>
    </section>
    <section class="our-authors conteiner indent">
        <h3 class="heading">Our authors</h3>

        <div class="carousel">


            <?php
                $accounts = $db->query("SELECT * FROM account ORDER BY id DESC LIMIT 3, 3;");
                while ($acRow = $accounts->fetch_object()) {
                    $acId = $acRow->id;
                    $sumLikes=$db->query("SELECT SUM(likes) FROM post WHERE author_id=$acId")->fetch_array()[0];
                    $sumPosts=$db->query("SELECT SUM(postNum) FROM post WHERE author_id=$acId")->fetch_array()[0];
            ?>


            <div class="about-author">
                <div class="author-info">
                    <a href="users-profile.php?pid=<?=$acRow->id?>">
                        <img src="image/wigets/user-img.png" alt="" class="author-img">
                    </a>
                    <div class="author-data">
                        <div class="author-name">
                            <a href="users-profile.php?pid=<?=$acRow->id?>"> <?=$acRow->name?>      <?=$acRow->surname?> </a>
                        </div>
                        <div class="author-follower">
                            <div class="author-subscribers">
                                <p id="num-author-follower"><?=$acRow->subscriber?></p>
                                <p>subscribers</p>
                            </div>
                            <div class="author-likes">
                                <p id="num-author-follower">
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
                            <div class="author-publications">
                                <p id="num-author-follower">
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
                </div>
                <div class="author-posts wrap">


                    <?php
                        $acId = $acRow->id;
                        $acPosts = $db->query("SELECT * FROM post WHERE author_id=$acId LIMIT 0, 3;");
                        while ($acRowPosts = $acPosts->fetch_object()) {
                            $acUserId = $acRowPosts->category_id;
                            $acUser = $db->query("SELECT * FROM category WHERE id = $acUserId");
                            $acUserIdPost = $acUser->fetch_object();
                    ?>



                    <div class="post">
                        <a href="detail.php?pid=<?=$acRowPosts->id?>">
                            <img 
                            src="
                            <?php
                            if (isset($acRowPosts->cover)) {
                            ?>
                            <?=$acRowPosts->cover?>
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
                                <div class="likes-posts"><?=$acRowPosts->likes?> <i class="far fa-thumbs-up"></i></div>
                                <div class="view-posts"><?=$acRowPosts->views?><i class="far fa-eye"></i></div>
                            </div>
                            <a href="detail.php?pid=<?=$acRowPosts->id?>" class="heading-posts"><?=$acRowPosts->title?>.</a>
                            <div class="title-posts">
                                <p><?= substr($acRowPosts->description, 0, 190) . "..."; ?></p>
                            </div>
                            <div class="types-food">
                                <h3><?=$acUserIdPost->category?></h3>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>  
                    
                </div>
            </div>


                <?php
                    }
                ?>



        </div>
    </section>
    <section class="posts conteiner indent">
        <h3 class="heading">Last Posts</h3>
        <div class="wrap top-posts">

            
        </div>
    </section>
    <section class="sign-up conteiner indent">
        <div class="sign-up-block">
            <div class="sign-up-img">
                <img src="image/wigets/enews.png" alt="">
                <img src="image/wigets/cook-signup-footer.png" alt="">
            </div>
            <form class="login-form sign">
                <h3>Get News</h3>
                <input type="name" class="login-input" placeholder="Enter Your Name">
                <input type="email" class="login-input" placeholder="Enter Your Email Address">
                <button>Subscribe</button>
            </form>
            <div class="sign-up-img">
                <img id="display-none" src="image/wigets/cook-signup.png" alt="">
            </div>
        </div>
    </section>
        <?php
            include "components/body-libs.php"
        ?>
</body>
</html>
