<?php
function posts_all($link){
	
	$posts = array();
	
    $pall = $link->prepare("SELECT * FROM posts ORDER BY id DESC");
	$pall->execute();
	
    while($row = $pall->fetch()){
		$posts[] = $row;
	}
	
	$pall = null;
	$link = null;
	
	return $posts;
}
function posts_new($link, $login, $title, $date, $text){

    $title = trim($title);
    $text = trim($text);
	
	if(empty($title))
		return false;

	$psnew = $link->prepare("INSERT INTO posts (author, title, date, text) VALUES (?, ?, ?, ?)");
	$psnew->bindParam(1, $login);
	$psnew->bindParam(2, $title);
	$psnew->bindParam(3, $date);
	$psnew->bindParam(4, $text);
	$psnew->execute();
	
	$psnew = null;
	$link = null;
	
    return true;

}

function posts_get($link, $id_post){
	
    $psget = $link->prepare("SELECT * FROM posts WHERE id=?");
    $psget->bindParam(1, $id_post);
	$psget->execute();
    $posts = $psget->fetch();
	
	$psget = null;
    $link = null;
	
    return $posts;
}

function posts_edit($link, $id, $title, $date, $text){
	
    $title = trim($title);
    $text = trim($text);
    $date = trim($date);
    $id = (int)$id;
    
    if (empty($title))
        return false;
    
    $psedit = $link->prepare("UPDATE posts SET title=?, date=?, text=? WHERE id=?");
   
	$psedit->bindParam(1, $title);
	$psedit->bindParam(2, $date);
	$psedit->bindParam(3, $text);
	$psedit->bindParam(4, $id);
    $psedit->execute();
	
	$psedit = null;
	$link = null;
}

function posts_del($link, $id){
	
    $id = (int)$id;
    
    if (empty($id))
        return false;
    
    $pdel = $link->prepare("DELETE FROM posts WHERE id=?");
    $pdel->bindParam(1, $id);
	$pdel->execute();
	
	$pdel = null;
	$link = null;
}

function posts_intro($text, $len = 200){
     if (mb_strlen($text) >= $len) {
                preg_match("/.{500}[^.!;?]*[.!;?]/si", $text.". ", $matches);
                $cuttext=$matches[0] .= "..";
                return $cuttext;
        }
        else return $text;
}
?>