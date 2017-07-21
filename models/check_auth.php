<?
$link = db_connect();

session_start();

$id = $_SESSION['id'];

$sql = $link->prepare("SELECT * FROM users WHERE user_id=? LIMIT ?");
$limitf = 1;
$sql->bindParam(1, $id);
$sql->bindParam(2, $limitf, PDO::PARAM_INT);
$sql->execute();
$data = $sql->fetch();

$sql = null;
$link - null;

	if(($data['user_hash'] !== $_SESSION['hash']) or ($data['user_id'] !== $id)){
		
		session_destroy();
	}
	else{
		$login = $data['user_login'];
		$_SESSION["nick"] = $login;
	}

$data = null;
?>