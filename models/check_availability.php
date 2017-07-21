<?php
require_once ("../connection/db.php");
$link = db_connect();

$login = $_POST["login"];

if(empty(trim($login))){
	echo "<span class='status-not-available'> Login can't be empty!</span>";
}
else if(trim($login) == ' '){
	echo "<span class='status-not-available'> Login can't be empty! (alt+255)</span>";
}
else if(!preg_match("/^[a-zA-Z0-9]+$/",$login)){
	echo "<span class='status-not-available'> Only Latin characters and numbers!</span>";
}
else{
	$sql = $link->prepare("SELECT user_login FROM users WHERE users.user_login=?");
    $sql->bindParam(1, $login);
	$sql->execute();
						  
	if ($row = $sql->fetch() > 0) {
		echo "<span class='status-not-available'> Username Not Available.</span>";
	}
	else{
		return 1;
	}
	
	$sql = null;
	$link = null;
}
?>