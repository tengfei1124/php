<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$tree=new abc();
	$tree->tree(0,"-",$db,"category");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="addcategoryIfo.php" method="post">
		上级目录:<select name="pid" id="">
					<option value="0">
						一级分类
					</option>
					<?php
						echo $tree->str;
					?>
				</select><br><br>
		添加分类:<input type="text" name="cname"><br><br>
		<input type="submit" >
	</form>
</body>
</html>