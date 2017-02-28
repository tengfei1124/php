<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$id=$_GET["id"];
	$delpus=new abc();
	$delpus->delpus($id,$db,"postion");
?>