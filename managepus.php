<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$pus=new abc();
	$pus->pus($db,"postion");
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
</head>
<style>
	table{
		width:600px;
		border-collapse: collapse;
		border:1px solid #000;
		margin:0 auto;
	}
	th,td{
		width:200px;height:30px;
		border:1px solid #000;
		text-align: center;
	}
</style>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>名称</th>
			<th>操作</th>
		</tr>
		<?php
			echo $pus->str;
		?>
	</table>
</body>
</html>