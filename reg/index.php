<?php 
require_once ("../connection/db.php");
require_once ("../models/reg.php");
require_once ("../models/auth.php");

$link = db_connect();

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "";

session_start();

if(!empty($_SESSION['nick'])){
	
	header("Location: ".$_SERVER['HTTP_REFERER']); exit();
} 

if($action == "reg"){
	
	if(!empty($_POST)){
		reg_user($link, $_POST['login'], $_POST['password']);
		header("Location: index.php?action=auth");
	}
	include("../views/regUser.php");
}

if($action == "auth"){
	if(!empty($_POST)){
		auth_user($link, $_POST['login'], $_POST['password']);
//		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	include("../views/authUser.php");
}

$link = null;
?>