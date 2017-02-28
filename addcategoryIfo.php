<?php
	include "bd.php";
	$pid=$_POST["pid"];
	$cname=$_POST["cname"];
	$db->query("insert into category(pid,cname) values('$pid','$cname')");
	if($db->affected_rows>0){
		$masseige="添加成功";
		$url="addcategory.php";
		include "mess.html";
	};
?>