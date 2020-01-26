<?php 
include 'database.class.php';
infoRemove ($database, $_GET['id']);
header('Location: ../news.php');
	exit();