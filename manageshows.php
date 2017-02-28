<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$tatle=new abc();
	$tatle->tatle($db,"shows");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
</head>
<style>
	table{
		width:800px;
		border-collapse: collapse;
		border:1px solid #000;
		margin:0 auto;
	}
	th,td{
		height:30px;
		border:1px solid #000;
	}
</style>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>标题</th>
			<th>内容</th>
			<th>父id</th>
			<th>发布时间</th>
			<th>发布人</th>
			<th>操作</th>
		</tr>
		<?php
			echo $tatle->str;
		?>
	</table>
</body>
</html>