<?php 
include 'template/header.php';
include 'php/Database.class.php';
$infoId = $_GET['id'];
$info = infoToEdit($database, $infoId);
include 'pages/infoEdit.page.php'; 
include 'template/footer.php'; 