<?php
	session_start();
	require_once('../frame.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('admin');
	 	use_jquery();
	?>
</head>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post">
		<tr class=tr1>
			<td colspan="2">　修改密码</td>
		</tr>
		<tr class=tr3>
			<td width=150>新密码：</td>
			<td width=645 align="left"><input type="password" id="password" class="required"></td>
		</tr>
		<tr class=tr3>
			<td>重复密码：</td>
			<td align="left"><input type="password"  id="password2" class="required"><input type="hidden"  id=username value="000000"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button id=pwd_btn type="button">提 交</button></td>
		</tr>
	</form>
	<table>
</body>
</html>

<script>
$(function(){
		$("#password").focus();
		
		$('#password2').keypress(function(e){
			if(e.keyCode == 13){update();}
		});
	
		$("#pwd_btn").click(function(){
			update();
		});
		
		
		function update(){
			var password=$("#password").attr('value');
			var password2=$("#password2").attr('value');
			var username=$("#username").attr('value');
			if(password==""||password2=="")
			{
				alert("请填写密码");
				return false;
			}
			else if(password!=password2)
			{
				alert("重复密码错误");
				return false;				
			}
			else
			{
				$.post('/pub/pub.post.php',{'type':'pwd','password':password,'username':username},function(data){
					if(data=="ok"){alert("密码修改成功");}
					}					
				)

					
			}
		}
		
});
</script>