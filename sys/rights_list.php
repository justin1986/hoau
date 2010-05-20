<?php
	require_once('../frame.php');
	$rights = new table_class('hoau_rights');
	$records = $rights->find('all',array('order' => 'id asc'));
	$count = count($records);
	rights($_SESSION["hoaurights"],'0');
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
		js_include_tag('admin_pub');
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　权限管理　<a href="rights_add.php" style="color:#0000FF">添加权限</a></td>
		</tr>
		<tr class="tr2">
			<td width="305">权限名</td><td width="280">序号</td><td width="250">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="rights_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->name;?></a></td>
			<td><?php echo $i+1;?></td>
			<td>	
				<a href="rights_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
		<input type="hidden" id="db_table" value="hoau_rights">
	</table>
</body>
</html>

