<?php
require_once ("connection/db.php");
require_once ("models/posts.php");
require_once ("models/check_auth.php");
require_once ("models/comments.php");

$post = posts_get($link, $_GET["id"]);
$comments = comments_all($link, $_GET["id"]);

$link = null;
	
include ("views/post.php");
?>