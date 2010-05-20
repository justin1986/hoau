<?php
	require_once('../frame.php');
	$db = get_db();
	$result = $db->query("select * from hoau_mail_config");
	rights($_SESSION["hoaurights"],'4');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>添加电子邮件</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("news_add");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="news_add" action="/pub/pub.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　编辑电子邮件信息</td>
		</tr>
		<tr class=tr3>
			<td width="130">SMTP用户名</td><td width="695" align="left"><input id=name type="text" name="post[stmp_user]" class="required" value="<?php echo $result[0]->stmp_user?>"></td>
		</tr>
		<tr class=tr3>
			<td width="130">密码</td><td width="695" align="left"><input type="password" name="post[stmp_password]" class="required" value="<?php echo $result[0]->stmp_password?>"></td>
		</tr>
		<tr class=tr3>
			<td width="130">邮件服务器</td><td width="695" align="left"><input type="text" name="post[stmp_host]" class="required" value="<?php echo $result[0]->stmp_host?>"></td>
		</tr>
		<tr class=tr3>
			<td width="130">邮箱地址</td><td width="695" align="left"><input type="text" name="post[mail_from]" class="required" value="<?php echo $result[0]->mail_from?>">（请写全，如web@hoau.net）</td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="保存"></td>
		</tr>	
	</table>
	<?php if(count($result)>0){?>
		<input name="id" type="hidden" value="<?php echo $result[0]->id;?>">
	<?php }?>
	<input name="db_table" type="hidden" value="hoau_mail_config">
	<input type="hidden" name="url" value="/email/email_config.php">
		<input type="hidden" name="post_type" value="edit">
	</form>
</body>
</html>

<script>
	$(function(){
		$("#name").focus();
	})
</script>