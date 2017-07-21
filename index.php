<?php
require_once ("connection/db.php");
require_once ("models/posts.php");
require_once ("models/check_auth.php");
require_once ("models/comments.php");

$posts = posts_all($link);

session_start();

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";

if(empty($action)){
	include ("views/posts.php");
}

if($action == "add"){
	if(empty($_SESSION['nick'])){
	header("Location: /reg/index.php?action=auth");
}else{
    if(!empty($_POST)){
		posts_new($link, $login, $_POST['title'], $_POST['date'], $_POST['text']);
        header("Location: index.php");
		
		$link = null;
    }
	include("views/createPost.php");
}
}

if($action == "addcom"){
	if(empty($_SESSION['nick'])){
	header("Location: /reg/index.php?action=auth");
}else{
    if(!empty($_POST)){
		$id = (int)$_GET['id'];
		comments_new($link, $id, $login, $_POST['text']);
        header("Location: ".$_SERVER['HTTP_REFERER']);
		
		$link = null;
    }
	}
}
?>