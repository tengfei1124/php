<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$id=$_GET["id"];
	$delshows=new abc();
	$delshows->delshows($id,$db,"shows");
?>