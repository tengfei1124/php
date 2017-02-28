<?php
	include "session.php";
	include "bd.php";
	$sid=$_POST["sid"];
	$stitle=$_POST["stitle"];
	$scon=$_POST["scon"];
	$cid=$_POST["cid"];
	$stime=$_POST["stime"];
	$sql="update shows set stitle='$stitle',scon='$scon',cid='$cid',stime='$stime' where sid=".$sid;
	$db->query($sql);
	if($db->affected_rows>0){
      	$masseige="修改成功";
      	$url="manageshows.php";
      	include "mess.html";
  	}else{
      	$masseige="修改失败或未做修改";
      	$url="manageshows.php";
      	include "mess.html";
  	}
?>