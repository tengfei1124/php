<?php
	include "session.php";
	include "bd.php";
	$pid=$_GET["pid"];
	$pname=$_GET["pname"];
	$sql="update postion set pname='$pname' where pid=".$pid;
	$db->query($sql);
	if($db->affected_rows>0){
      	$masseige="修改成功";
      	$url="managepus.php";
      	include "mess.html";
  	}else{
      	$masseige="修改失败或未做修改";
      	$url="managepus.php";
      	include "mess.html";
  	}
?>