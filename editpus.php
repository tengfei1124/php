<?php
	include "bd.php";
	$id=$_GET["id"];
	$sql="select * from postion where pid=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$pname=$row["pname"];
	$pid=$row["pid"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
</head>
<body>
	<form action="editpusInfo.php">
		修改推荐位：<input type="text" name="pname" value="<?php echo $pname ?>"/><br><br>
		<input type="submit" value="提交"/>
		<input type="hidden" name="pid" value="<?php echo $pid ?>"/>
	</form>
</body>
</html>