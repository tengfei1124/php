<?php
	include "session.php";
	include "bd.php";
	$pname=$_GET["pname"];
	$sql="insert into postion (pname) values('$pname')";
	$db->query($sql);
	if($db->affected_rows>0){
		$masseige="添加成功";
		$url="addpus.php";
		include "mess.html";
	}
?>