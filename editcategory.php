<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$tree=new abc();
	$id=$_GET["id"];
	$tree->tree(0,"-",$db,"category");
	
	$sql="select * from category where cid=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$cname=$row["cname"];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="editcategoryInfo.php" method="post">
		上级目录:<select name="pid">
					<option value="0">
						一级分类
					</option>
					<?php
						echo $tree->str;
					?>
				</select><br><br>
		修改分类:<input type="text" name="cname" value="<?php echo $cname ?>"><br><br>
			<input type="hidden" value="<?php echo $id?>" name="cid">
		<input type="submit" >
	</form>
</body>
</html>