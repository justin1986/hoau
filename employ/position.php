<?php
	require_once('../frame.php');
	$db = get_db();
	$records = $db->query("select * from hoau_position order by priority asc");
	$count = count($records);
	rights($_SESSION["hoaurights"],'5');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　职位管理　<a href="position_add.php" style="color:#0000FF">添加职位</a></td>
		</tr>
		<tr class="tr2">
			<td width="400">职位名</td><td width="95">优先级</td><td width="300">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->name;?></td>
			<td><input type="text" class="priority"  name="<?php echo $records[$i]->id;?>"  value="<?php if('100'!=$records[$i]->priority){echo $records[$i]->priority;};?>" style="width:40px;"></td>
			<td>	
				<a href="position_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_position">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button></td>
			</tr>
		</table>
	</div>
</body>
</html>

