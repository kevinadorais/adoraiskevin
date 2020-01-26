<?php 
$page = $_GET['page'];
if($page = null || $page == 0){
    $page = 1;
    header('Location: news.php?page=1');
    exit();
}
else{
    $page = $_GET['page'];
}
include 'template/header.php';
include 'php/database.class.php';
$info = infoRead($database, $page);
include 'pages/news.page.php'; 
include 'template/footer.php'; 