<?php
	include "session.php";
	include "bd.php";
	include "functions.php";
	$tree=new abc();
	$id=$_GET["id"];
	$tree->tree(0,"-",$db,"category");
	
	$sql="select * from shows where sid=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$stitle=$row["stitle"];
	$scon=$row["scon"];
	$stime=$row["stime"];
	$imgurl=$row["imgurl"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
	<script src="upload.js"></script>
</head>
<script>
	window.onload=function(){
		var val=document.querySelector(".hid");
		var sub=document.querySelector(".sub");
		var obj=new upload("upload.php",".one",".progress","img");
		obj.up(function(e){
			obj.start=function(){
				val.value=e;
				sub.removeAttribute("disabled");
			}
			obj.start();
		});
	}
	
</script>
<style>
	img{
		border:0;
	}
	.box{
		width:200px;height:200px;
		border:1px solid #000;
		position:relative;
	}
	.img{
		width:100%;height:185px;
		border-bottom: 1px solid #eee;
	}
	.img img{
		width:100%;height:100%;
	}
	.progress{
		width:0;height:15px;
		background: red;
		font-size:12px;
		color:#fff;
		position:absolute;
		bottom:0;left:0;
	}
</style>
<body>
	<form action="editshowsInfo.php" method="post">
		文章分类:<select name="cid">
					<option value="0">
						一级分类
					<?php
						echo $tree->str;
					?>
					</option>
			</select><br><br>
		修改标题:<input type="text" name="stitle" value="<?php echo $stitle ?>"><br><br>内容:<br>
		<textarea name="scon" rows="10" cols="30"><?php echo $scon ?></textarea><br><br>
			<input type="file" class="one" name="file" /><br><br>
				<div class="box">
					<div class="img">
						<img src="" alt="" />
					</div>
					<div class="progress" ></div>
				</div><br>
					
					<span>推荐位选择：</span>
					<?php
						$sql="select * from postion";
						$result=$db->query($sql);
						while($row=$result->fetch_assoc()){
					?>
					<?php echo $row["pname"] ?><input type="radio" name="pid" value="<?php echo $row["pid"] ?>">
					<?php
						}	
					?><br><br>
		<input type="submit" value="更改文章" disabled="disabled" class="sub">
			<input type="hidden" name="susername" value="<?php echo $_SESSION["username"]?>" />
			<input type="hidden" value="<?php echo $id?>" name="sid" />
			<input type="hidden" name="stime" value="<?php echo $stime ?>" />
			<input type="hidden" name="imgurl" class="hid"/>
	</form>
</body>
</html>