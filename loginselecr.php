<?php
	include "bd.php";
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$sql="select * from username";
	$result=$db->query($sql);
	while($row=$result->fetch_assoc()){
		if($row["username"]==$username&&$row["password"]==$password){
				session_start();
				$_SESSION["ok"]="yes";
				$_SESSION["is_login"]="yes";
				$_SESSION["username"]=$username;
				$masseige="登录成功";
				$url="main.php";
				include "mess.html";
				exit;
		}else if($row["username"]!=$username&&$row["password"]!=$password){
				$masseige="登录失败";
				$url="login.php";
				include "mess.html";
		}
	}
?>