<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$rights = new table_class('hoau_rights');
	$post_table='hoau_rights'; 
	$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
	$record = $rights->find("all",array('conditions' => 'id='.$id));
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
<?php
	validate_form("rights_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="rights_form" method="post" action="/pub/pub.post.php">
		<tr class=tr1>
			<td colspan="2">　编辑权限</td>
		</tr>
		<tr class=tr3>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="post[name]" value="<?php echo $record[0]->name;?>"  class="required" ></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>"> 
		<input type="hidden" name="db_table" value="<?php echo $post_table;?>">
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
		<input type="hidden" name="post_type" value="edit">
	</form>
	<table>
</body>
</html>