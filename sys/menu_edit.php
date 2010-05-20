<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$menu = new table_class('hoau_menu');
	$post_table='hoau_menu'; 
	$post_url=$_SERVER['HTTP_REFERER'].'?refrese='.rand_str(5).'&reload=1';
	$record = $menu->find("all",array('conditions' => 'id='.$id));
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
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="/pub/pub.post.php">
		<tr class=tr1>
			<td colspan="2">　编辑菜单</td>
		</tr>
		<tr class=tr3>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="post[name]"  class="required" value="<?php echo $record[0]->name;?>"></td>
		</tr>
		<tr class=tr3>
			<td>链接：</td>
			<td align="left"><input type="text" name="post[href]" id="href" value="<?php echo $record[0]->href;?>"></td>
		</tr>
		<tr class=tr3>
			<td>链接方式:</td>
			<td align="left"><input type="text" name="post[target]" value="<?php echo $record[0]->target;?>"> (admin_iframe,#,_blank)</td>
		</tr>
		<tr class=tr3>
			<td>描述：</td>
			<td align="left"><input type="text" name="post[description]"  value="<?php echo $record[0]->description;?>"></td>
		</tr>
		<tr class=tr3>
			<td>优先级：</td>
			<td align="left"><input type="text" name="post[priority]" id="priority" value="<?php if($record[0]->priority!=100){echo $record[0]->priority;}?>" class="number"></td>
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