<?php

include "variables.php";

$db = new mysqli('localhost', 'root', '', 'myprojectphp');

if ($db->connect_error) {
    echo $db->connect_error;
}