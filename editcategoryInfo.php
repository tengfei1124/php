<?php
  include "session.php";
  include "bd.php";
  $cid=$_POST["cid"];
  $cname=$_POST["cname"];
  $pid=$_POST["pid"];
  $sql="update category set cname='$cname',pid='$pid' where cid=".$cid;
  $db->query($sql);
  if($db->affected_rows>0){
      $masseige="修改成功";
      $url="manage.php";
      include "mess.html";
  }else{
      $masseige="修改失败或未做修改";
      $url="manage.php";
      include "mess.html";
  }
?>