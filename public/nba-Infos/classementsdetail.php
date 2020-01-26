<?php include 'template/header.php';
$id = $_GET['id'];
if ($id =="1" || $id =="2" || $id =="3" || $id =="4" || $id =="5" || $id =="8" || $id =="9" || $id =="10" || $id =="13" || $id =="15" || $id =="17" || $id =="19" || $id =="21" || $id =="22" || $id =="30") {
    $conf = "Conference Est";
}
else{
    $conf = "Conference Ouest";
}
include 'php/database.class.php';
$classement = readClassement($conf, $database);
$selectedTeam = readTeam($id, $database);
include 'pages/classementsdetail.page.php'; 
include 'template/footer.php'; 