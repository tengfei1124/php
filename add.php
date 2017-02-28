<?php
	include "bd.php";
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$db->query("insert into username(username,password) values('$username','$password')");
	if($db->affected_rows>0){
		$masseige="注册成功";
		$url="login.php";
		include "mess.html";
	}
?>