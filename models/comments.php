<?php
function comments_new($link, $id, $login, $text){

    $text = trim($text);
	
	if(empty($text))
		return false;

	$comnew = $link->prepare("INSERT INTO comments (id_post, author, text) VALUES (?, ?, ?)");
	$comnew->bindParam(1, $id);
	$comnew->bindParam(2, $login);
	$comnew->bindParam(3, $text);
	$comnew->execute();
	
	$comnew = null;
	$link = null;
	
    return true;

}

function comments_all($link, $id_post){
	
	$comments = array();
	
    $comall = $link->prepare("SELECT * FROM comments WHERE id_post=? ORDER BY date DESC");
	$comall->bindParam(1, $id_post);
	$comall->execute();
	
    while($row = $comall->fetch()){
		$comments[] = $row;
	}
	
	$comall = null;
	$link = null;
	
	return $comments;
}
?>