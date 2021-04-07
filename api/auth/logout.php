<?php
include "../../config/database.php";
session_start();
session_destroy();

header("location: $BASE_URL/main_menu.php");