<?php
	session_start();//开启
	$_SESSION["ok"]="yes";
	if(!isset($_SESSION["is_login"])){
	$masseige="添加成功";
	$url="main.php";
	include "mess.html";
	exit;
}	
?>