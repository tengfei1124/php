<?php
	include "bd.php";
	$cid=$_POST["cid"];
	$stitle=$_POST["stitle"];
	$scon=$_POST["scon"];
	$imgurl=$_POST["imgurl"];
	$susername=$_POST["susername"];
	$db->query("insert into shows(cid,stitle,scon,susername,imgurl) values('$cid','$stitle','$scon','$susername','$imgurl')");
	if($db->affected_rows>0){
		$masseige="添加成功";
		$url="addshows.php";
		include "mess.html";
	};
?>