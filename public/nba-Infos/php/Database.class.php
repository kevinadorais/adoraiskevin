<?php  	

$database = new PDO('mysql:host=localhost;dbname=nbainfos', 'root' , '');

	function readClassement($conf, $database){
		
		$query = $database->prepare("SELECT * FROM team WHERE confName = ? ORDER BY `V 2018-2019` DESC");
		$query->execute ([$conf]);
		return $classement = $query->fetchAll();
	};

	function readTeam($id, $database){

		$query = $database->prepare("SELECT * FROM team WHERE teamId = ? ");
		$query->execute ([$id]);
		return $classement = $query->fetchAll();
	};

	function infoRead($database, $page){

		$limite = 6;
		$debut = ($page - 1) * $limite;
		
		$query = $database->prepare("SELECT * FROM info ORDER BY infoId DESC LIMIT :offset, :limite");
		$query->bindValue('limite', $limite, PDO::PARAM_INT);
		$query->bindValue('offset', $debut, PDO::PARAM_INT);
		$query->execute();

		$info = $query->fetchAll();
    	return $info;
	};

	function infoAdd($database){

	$title = $_POST['title'];
	$img = $_POST['img'];
	$content = $_POST['content'];

	$query = $database->prepare("INSERT INTO `info`(`title`, `img`, `content`) 
			VALUES (?, ?, ?)");
	$query->execute([$title, $img, $content]);
	};

	function infoRemove ($database, $info){

		$query = $database->prepare("DELETE FROM `info` WHERE infoId = ?");
		$query->execute([$info]);
	};

	function infoToEdit ($database, $id){

		$query = $database->prepare("SELECT * FROM `info` WHERE infoId = ?");
		$query->execute([$id]);
		return $info = $query->fetchAll();
	};

	function infoUpdate ($database, $id, $title, $img, $content){

		$query = $database->prepare("UPDATE `info` SET `title`= ?,`img`= ?,`content`= ? WHERE infoId = ?");
		$query->execute ([$title, $img, $content, $id]);
	};