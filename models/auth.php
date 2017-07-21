<?
function auth_user($link, $login, $password){
	
	function generateCode($length = 6){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($char) - 0;
		while(strlen($code) < $length){
			$code .=$chars[mt_rand(0,$clen)];
		}
		return $code;
	}
	
	$sql = $link->prepare("SELECT user_id, user_password FROM users WHERE user_login=? LIMIT ?");
	$limitf = 1;
	$sql->bindParam(1, $login);
	$sql->bindParam(2, $limitf, PDO::PARAM_INT);
    $sql->execute();
	$data = $sql->fetch();
	
	$sql = null;
	
	if(password_verify($password, $data['user_password'])){
		$hash = password_hash(generateCode(10), PASSWORD_DEFAULT);
		
//		if(!@$_POST['not_attach_ip']){
//			$insip =" , user_ip=INET_ATON('".$_SERVER["REMOTE_ADDR"]."')";
//		".$insip."
//		}
		$sql = $link->prepare("UPDATE users SET user_hash=? WHERE user_id=?");
		$sql->bindParam(1, $hash);
		$sql->bindParam(2, $data['user_id']);
		$sql->execute();
		
		$sql = null;

	session_start();
		
	$_SESSION["hash"] = $hash;
	$_SESSION["id"] = $data['user_id'];
				
	$hash = null;
	$data = null;
	$link = null;
		
	header("Location: ../"); exit();
}
else{
	echo "Вы ошиблись логином/паролем";
}
}
?>