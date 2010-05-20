<?php
	require_once('../frame.php');
	$db = get_db();
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
			<td colspan="5" width="795">　使用日志</td>
		</tr>
		<tr class="tr2">
			<td width="305">用户名</td><td width="530">登录时间</td>
		</tr>
		<?php
		
			$sql = 'SELECT f.*,u.* FROM hoau_log_user f left join hoau_user u on f.userid=u.id where 1=1 order by f.id desc';
			$record=$db -> paginate($sql,20);
		?>
				
		<?php for($i=0;$i<count($record);$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $record[$i]->username;?></td>
			<td><?php echo date_format($record[$i]->logindatetime,"Y-m-d H:i:s");?></td>
		</tr>
		<? }?>
	</table>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

