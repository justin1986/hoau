<?php
require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		use_jquery();
		css_include_tag('admin');
	?>
</head>
<body>
	<div id=main>
		<div id=login  style="background:none">
			<div id=title>天地华宇平台</div>
			<div id=box>
				<div id=name>用户名　　<input type="text" id=login_text name=login_text style="width:145px; height:17px;" class="required"></div>
				<div id=pwd>密　码　　<input type="password" id=password_text name=password_text style="width:145px; height:17px;"></div>
				<div id=btn><input id="login_btn" type="button" value="登录" class="botton"></div>	
			</div>
		</div>
	</div>
	
</body>
</form>
<script>
$(function(){
		$("#login_text").focus();
	
		$("#login_btn").click(function(){
			login();
		});
		
		$('#password_text').keypress(function(e){
			if(e.keyCode == 13){login();}
		});
		
		function login()
		{
			var login_text=$("#login_text").attr('value');
			var password_text=$("#password_text").attr('value');
			if(login_text==""||password_text=="")
			{
				alert("用户名或密码不能为空");
				return false;
			}
			else
			{

				$.post('/login/login.post.php',{'type':'login','login_text':login_text,'password_text':password_text},function(data){
					if(data=="ok"){location.href="/admin.php";}
					else{alert("用户名或者密码错误");}
					}					
				)
			}		
		}
		
		
});
</script>

</html>
