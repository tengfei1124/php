<?php
session_start();//开启
$_SESSION["ok"]="yes";
if(!isset($_SESSION["is_login"])){
	$masseige="请登录";
	$url="login.php";
	include "mess.html";
	exit;
}	
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<script src="jquery.js"></script>
</head>
<style>
	*{
		box-sizing:border-box;
	}
	html,body{
		width:100%;height:100%;
	}
	.box{
		width:100%;height:100%;
	}
	.header{
		width:100%;height:20%;
		border-bottom: 2px solid #000;
		text-align: center;
		line-height:50px;
	}
	.bottom{
		width:100%;height:80%;
	}
	.left{
		width:20%;height:100%;
		border-right:2px solid #000;
		float:left;
	}
	.right{
		width:80%;height:100%;
		float:left;
	}
	iframe{
		width:100%;height:100%;
	}
</style>
<script>
	$(function(){
		$(".par").click(function(){
			$(this).find(".son").toggle(100)
		})
		$(".son").click(function(e){
			e.stopPropagation();
		})
	})
</script>
<body>
	<div class="box">
		<div class="header">
			<h1><?php echo $_SESSION["username"]?>,欢迎来到内容管理系统<br/>
				<a href="loginout.php">退出</a>
			</h1>

		</div>
		<div class="bottom">
			<div class="left">
				<ul class="par">
					<li>用户管理
						<ul class="son">	
							<li><a href="" target="right">添加用户</a></li>
							<li><a href="" target="right">管理用户</a></li>
						</ul>
					</li>
				</ul>
				<ul class="par">
					<li>分类管理
						<ul class="son">
							<li><a href="addcategory.php" target="right">添加分类</a></li>
							<li><a href="manage.php" target="right">管理分类</a></li>
						</ul>
					</li>
				</ul>
				<ul class="par">
					<li>内容管理
						<ul class="son">
							<li><a href="addshows.php" target="right">添加内容</a></li>
							<li><a href="manageshows.php" target="right">管理内容</a></li>
						</ul>
					</li>
				</ul>
				<ul class="par">
					<li>推荐位管理
						<ul class="son">
							<li><a href="addpus.php" target="right">添加推荐位</a></li>
							<li><a href="managepus.php" target="right">管理推荐位</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="right" target="right">
				<iframe src="" frameborder="0" name="right"><iframe>
			</div>
		</div>
		
	</div>
</body>
</html>

