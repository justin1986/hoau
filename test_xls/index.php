<?php require_once('../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
	?>
</head>
<?php rights($_SESSION["hoaurights"],'6');?>
<body style="background:#E1F0F7">
	<form id="news_add" enctype="multipart/form-data" action="test.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　数据导入(请上传不大于2M的excel)</td>
		</tr>
		<tr class=tr3>
			<td width="130">网点表</td>
			<td width="695" align="left">
				<input type="file" name="yywd">	
			</td>
		</tr>
		<tr class=tr3>
			<td width="130">城市表</td>
			<td width="695" align="left">
				<input type="file" name="city">	
			</td>
		</tr>
		<tr class=tr3>
			<td width="130">省份表</td>
			<td width="695" align="left">
				<input type="file" name="province">	
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布"></td>
		</tr>
		<input type="hidden" name=id value=<?php echo $id;?>>
	</table>
	</form>
</body>
</html>