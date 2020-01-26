<?php  
include 'database.class.php';
var_dump($_POST);
infoUpdate($database, $_POST['infoId'], $_POST['title'], $_POST['img'], $_POST['content']);
header('Location: ../news.php');
    exit();