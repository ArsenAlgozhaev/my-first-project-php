        <div class="modal-window-log-in">
            <div class="login-block">
                <form action="api/auth/signin.php" method="POST" class="login-form">
                    <h3>Login</h3>
                    <input name="myEmail" type="email" class="login-input" placeholder="Enter your Email">
                    <input name="myPassword" type="password" class="login-input" placeholder="Enter your Password">
                    <button>Sign in</button>
                    <a href="#" class="btn-open-register">Don't have an account yet?</a>
                    <div id="close-btn-modal">X</div>
                </form>
            </div>
        </div>

        <div class="modal-window-register">
            <div class="register-block">
                <form action="api/auth/signup.php" method="POST" class="login-form">
                    <h3>Registration</h3>
                    <input name="myName" type="name" class="login-input" placeholder="Enter your Name">
                    <input name="mySurname" type="name" class="login-input" placeholder="Enter your Surname">
                    <input name="myPhoneNumber" type="tel" class="login-input" id="phone" placeholder="Enter your Phone-number">
                    <input name="myEmail" type="email" class="login-input" placeholder="Enter your Email">
                    <input name="myPassword" type="password" class="login-input" placeholder="Enter your Password">
                    <button>Register</button>
                    <div id="close-btn-modal-register">X</div>
                </form>
            </div>
        </div>


        <div class="modal-window-new-post">
            <div class="register-block">
                <form method="POST" class="login-form new-post" onsubmit="addPost(event)" enctype="multipart/form-data">
                    <h3>Add New Post</h3>
                    <label for="addTitle">Title</label>
                    <input name="title" id="addTitle" type="text" placeholder="Enter Title" required>
                    <label for="addDescription">Description</label>
                    <textarea name="description" id="addDescription" cols="30" rows="5" placeholder="Enter description" required></textarea>
                    <label for="addRecipe">Recipe</label>
                    <textarea name="recipe" id="addRecipe" cols="30" rows="5" placeholder="Enter the recipe as 5 grams of flour, 10 grams of sugar ..." required></textarea>
                    <label for="addCategory">Category</label>
                    <select name="category" id="addCategory">
                            <?php
                                $categories = $db->query("SELECT * FROM category;");
                                while ($row = $categories->fetch_object()) {
                            ?>
                                <option value='<?= $row->id ?>'> <?= $row->category ?> </option>
                            <?php
                                }
                            ?>
                    </select>
                    <input name="post-img" id="addImg" value="Add Image" type="file">
                    <button>Add Post</button>
                    <input type="hidden" name="uid" value="<?= $_SESSION['suser_id'] ?>" id="addUser">
                    <input type="hidden" name="postNum" value="1" id="addPostNum">
                    <div id="close-btn-modal-new-post">X</div>
                </form>
            </div>
        </div>


        <?php
            if (isset($_GET['editid'])) {
                $pid = $_GET['editid'];
                $postsEdit = $db->query("SELECT * FROM post WHERE id = $pid;");
                $edit = $postsEdit->fetch_object();
        ?>


        <div class="modal-window-new-post active">
            <div class="register-block edit-block">
                <form action="api/posts/update.php" method="POST" class="login-form new-post">
                    <h3>Edit Post</h3>
                    <label for="new-title">Title</label>
                    <input name="newTitle" id="update-title" type="text" value="<?=$edit->title?>"  placeholder="Enter Title">
                    <label for="update-description">Description</label>
                    <textarea id="neupdate-description" name="newDescription" cols="30" rows="5" placeholder="Enter description"><?=$edit->description?></textarea>
                    <label for="update-recipe">Recipe</label>
                    <textarea id="update-recipe" name="newRecipe"cols="30" rows="5" placeholder="Enter the recipe as 5 grams of flour, 10 grams of sugar ..."><?=$edit->recipe?></textarea>
                    <label for="update-category">Category</label>
                    <select name="newCategory" id="addCategory">
                            <?php
                                $categories = $db->query("SELECT * FROM category;");
                                while ($row = $categories->fetch_object()) {
                            ?>
                                <option value='<?= $row->id ?>'> <?= $row->category ?> </option>
                            <?php
                                }
                            ?>
                    </select>
                    <!-- <input name="post-img" id="addImg" value="Add Image" type="file"> -->
                    <button>Edit</button>
                    <input type="hidden" name="pid" value="<?= $edit->id ?>">
                    <a href="<?=$BASE_URL?>/profile.php" id="close-btn-modal-new-post">X</a>
                </form>
            </div>
        </div>

        <?php
            }
        ?>





        <div class="modal-window-subscribe">
            <div class="register-block subscribe-block">
                <h3 class="heading-suscribers">Subscribers</h3>
                <?php
                if ($_GET['pid']){
                    $pid = $_GET['pid'];
                    $sub = $db->query("SELECT sub_id FROM subscribers WHERE us_id = $pid;");
                    while ($row = $sub->fetch_object()) {
                        $subscriber = $db->query("SELECT * FROM account WHERE id = $row->sub_id");
                        $subscriberRow = $subscriber->fetch_object();
                ?>
                <div class="subscriber">
                    <img src="image/wigets/user-img.png" alt="">
                    <div class="subscriber-name">
                        <p><?=$subscriberRow->name?>    <?=$subscriberRow->surname?></p>
                    </div>
                </div>
                <?php
                }
                    }
                ?>
                <div id="close-btn-modal-subscribe">X</div>
            </div>
        </div>




        <header class="header modal">
            <section class="modal-menu show">
                <div class="nav-menu-modal">
                    <a href="main_menu.php" class="effect-5"><span>Home</span></a>
                    <a href="#" class="effect-5"><span>About</span></a>
                    <a href="recipe.php" class="effect-5"><span>Recipes</span></a>
                    <a href="#" class="effect-5"><span>Contact</span></a>
                </div>
            </section>
        </header>