<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$table=new abc();
	$table->table(0,"-",$db,"category");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<style>
	table{
		width:800px;height:auto;
		border-collapse: collapse;
		border:1px solid #000;
		margin:0 auto;
	}
	th,td{
		width:25%;height:30px;
		border:1px solid #000;
		/*text-align: center;*/
	}
</style>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>分类</th>
			<th>父id</th>
			<th>操作</th>
		</tr>
		<?php
			echo $table->str;
		?>
	</table>
</body>
</html>