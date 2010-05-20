<?php
	require_once('../frame.php');
	$db = get_db();
	$sql = "select * from hoau_yd_config";
	$records = $db->query($sql);
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
		rights($_SESSION["hoaurights"],'3');
	?>
</head>

<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="10" width="795">　　
				运单追踪显示管理
			</td>
		</tr>
		<tr class="tr2">
			<td>用户类型</td><td>操作</td>
		</tr>
		<?php for($i=0;$i<count($records);$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->type;?></a></td>
			<td><a href="edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a></td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_yd_config">
</body>
</html>