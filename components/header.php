    <a id="btn-up">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <header class="header show">
            <div class="bar-container  open-menu" onclick="modalMenu(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <a href="main_menu.php" class="logo">Cook-It</a>
            <?php
                if (isset($_SESSION['suser_id'])) {
            ?>
            <?php
            $uid = $_SESSION['suser_id'];
            $query = $db->query("SELECT * FROM account WHERE id = $uid");
            $userDb = $query->fetch_object();
            ?>
            <div class="user-menu change">
                <div class="user">
                    <i class="fas fa-user"></i>
                    <div class="user-name">
                        <p><?=$userDb->name?></p>
                        <p><?=$userDb->surname?></p>
                    </div>
                </div>
                <div class="profile-nav">
                    <a class="effect-5 black btn-open-new-post"><i class="far fa-plus-square"></i><span>Add New Post</span></a>
                    <a href="profile.php?pid=<?php echo $_SESSION['suser_id'] ?>" class="effect-5 black"><i class="far fa-address-card"></i><span>Profile</span></a>
                    <a href="api/auth/logout.php" class="effect-5 black"><i class="fas fa-sign-out-alt"></i><span>Exit</span></a>
                </div>
            </div>
            <?php } else { ?>
            <button class="log-in"><i class="fas fa-sign-in-alt"></i>Log-in</button>
            <?php } ?>
    </header>
