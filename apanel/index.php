<?php
require_once ("../connection/db.php");
require_once ("../models/posts.php");
require_once ("../models/check_auth.php");

$link = db_connect();

session_start();

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";

if($action == "add"){
	if(empty($_SESSION['nick'])){
	header("Location: /reg/index.php?action=auth");
}else{
    if(!empty($_POST)){
		posts_new($link, $login, $_POST['title'], $_POST['date'], $_POST['text']);
        header("Location: index.php");
		
		$link = null;
    }
    include("../views/postAdmin.php");
    
}
}else if($action == "edit"){
     if(!isset($_GET['id']))
         header('Location: index.php');
    
    $id = (int)$_GET['id'];
    if(!empty($_POST) && $id > 0) {
        posts_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['text']);
        header("Location: index.php");
    }
    
    $post = posts_get($link, $id);
    include("../views/postAdmin.php");
   
}else if($action == "del"){
    $id = $_GET['id'];
    $post = posts_del($link, $id);
    header("Location: index.php");
}
else{
    $posts = posts_all($link);
    include ("../views/postsAdmin.php");
}
?>