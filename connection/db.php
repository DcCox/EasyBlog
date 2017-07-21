<?php



function db_connect(){

	

	define("MYSQL_USER", 'root');

	define("MYSQL_PASSWORD", '');

	

	$host = 'localhost';

	$db = 'blog';

	$charset = 'utf8';

	

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	$opt = [

		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

		];

	$link = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD, $opt);

	

	return $link;

}

$link = null;

?>