<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="ajax.js"></script>
	<script src="jquery.js"></script>
</head>
<style>
	*{
		padding: 0;
		margin: 0;
		list-style: none;
		/*text-decoration: none;*/
	}
	.box{
		width: 300px;
		height: 200px;
		position: fixed;
		left: 0;
		top: 0;
		bottom: 0;
		right: 0;
		margin: auto;
		border: 2px solid #000;
		text-align: center;
	}
	.message{
		font-size: 14px;;
	}
</style>
<script>
	$(function(){
		var btn=$("input[type=submit]");
		var reg=/^\w{5,10}$/;
		$("input[name=username]").keyup(function(){
			var val=$(this).val();
			if(!reg.test(val)){
				$(".message").eq(0).html("格式有误").css("color","red");
				btn.attr("disabled","disabled");
			}else{
				ajax({
					url:"selecrUser.php",
					data:{username:val},
					success:function(e){
						// console.log(e)
						if(e=="ok"){
							$("input[name=username").attr("ok","ok");
							$(".message").eq(0).html("此用户名可用").css("color","green");
							if($("input[name=password]").attr("ok")=="ok") {
			                        btn.removeAttr("disabled");
	                    	}
	                    }
						// }else if(e=="error"){
      //                       $(".message").eq(0).html("用户名已经存在").css("color","red");
      //                       $("input[name=username]").removeAttr("ok");

      //                   }
					}
				})
			}
		})

      $("input[name=password]").keyup(function(){
          var val=($(this).val());
          if(!reg.test(val)){
              $(".message").eq(1).html("格式有误").css("color","red");
              btn.attr("disabled","true");
              $("input[name=password]").removeAttr("ok");
          }else{
              $("input[name=password]").attr("ok","ok");
              $(".message").eq(1).html("格式正确").css("color","green");
              if($("input[name=username]").attr("ok")=="ok") {
                  btn.removeAttr("disabled");
              }
          }
      })
      
	})
</script>
<body>
	<div class="box">
      <h3>注册页</h3>
      <form action="add.php" method="post" >
          用户名:<input name="username" type="text"><br>
          	<span class="message"></span><br>
          密&nbsp;&nbsp;&nbsp;码:<input name="password" type="text" autocomplete="off"><br>        
          	<span class="message"></span><br>
          <input value="注册" type="submit" disabled="true">
      </form><br>
    已有用户名,<a href="login.php">点击登录</a>
</div>
</body>
</html>