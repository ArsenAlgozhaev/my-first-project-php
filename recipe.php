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
    
    <div class="nav-recipe wrap">

    </div>
            <form method="GET" class="search" onsubmit="searchPosts(event)">
                <input name="search" type="search" id="search" placeholder="Search">
                <i class="fas fa-search"></i>
            </form>

<div class="conteiner indent main-recipe posts">
    <div class="recipe wrap">
    
    </div>

    <div class="pagination indent">
            <ul id="all_pages">
                
            </ul>
        </div>
</div>

    <?php
        include "components/body-libs.php"
    ?>

    
</body>
</html>