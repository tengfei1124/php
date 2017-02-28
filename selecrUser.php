<?php
	include "bd.php";
	$username=$_GET["username"];
	$sql="select username from username";
	$result=$db->query($sql);
	while($row=$result->fetch_assoc()){
		if($row==$username){
			echo "error";
			exit;
		}
	}
	echo "ok";
?>