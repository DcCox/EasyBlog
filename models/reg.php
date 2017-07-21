<?
function reg_user($link, $login, $password){
	
    if(empty(trim($login)) || !preg_match("/^[a-zA-Z0-9]+$/",$login)){
		$err = print("Хьюстон, у нас проблемы... кто-то экспериментирует О_о");
	} 
	else{
    $sql = $link->prepare("SELECT user_login FROM users WHERE users.user_login=?");
	$sql->bindParam(1, $login);
	$sql->execute();
    
    if ($row = $sql->fetch() > 0) {
    echo ("Хьюстон, у нас проблемы... клоны нападают!");
	
	$sql = null;	
        
    }else{
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = $link->prepare("INSERT INTO users SET user_login=?, user_password=?");
	$sql->bindParam(1, $login);
	$sql->bindParam(2, $pass);
	$sql->execute();
	
	$pass = null;
	$hash = null;
	$sql = null;
	$link = null;
    }
}     
}
?>