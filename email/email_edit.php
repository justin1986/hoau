<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$email = new table_class('hoau_email');
	$email->find($id);
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
	<form id="news_add" enctype="multipart/form-data" action="email.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　添加电子邮件</td>
		</tr>
		<tr class=tr3>
			<td width="130">标题</td><td width="695" align="left"><input type="text" value="<?php echo $email->title;?>" name="email[title]" class="required" id="news_title"></td>
		</tr>
		<tr class="normal_news tr3">
			<td height=265>内容</td><td><?php show_fckeditor('email[connent]','Admin',true,"265",$email->connent);?></td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布"></td>
		</tr>
		<input type="hidden" name=id value=<?php echo $id;?>>
	</table>
	</form>
</body>
</html>
