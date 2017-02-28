<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$id=$_GET["id"];
	$del=new abc();
	$del->del($id,$db,"category");
?>