<?php
	require_once('../frame.php');
	$id=$_REQUEST['id'];
    $post_table="hoau_user";
    $post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		use_jquery();
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="user.post.php">
		<tr class=tr1>
			<td colspan="2">　添加用户</td>
		</tr>
		<tr class=tr3>
			<td width=150>姓名：</td>
			<td width=645 align="left"><input type="text" name="post[username]" id="name" class="required"></td>
		</tr>
		<tr class=tr3>
			<td>密码：</td>
			<td align="left"><input type="password" name="post[password]" class="required"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="db_table" value="<?php echo $post_table;?>">
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
		<input type="hidden" name="post_type" value="edit">
		
		<input type="hidden" name="post[regdatetime]" value="<?php echo now()?>">
	</form>
	</table>
</body>
</html>

<script>
	$(function(){
		$("#name").focus();
	})
</script>