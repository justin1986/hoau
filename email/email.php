<?php
	require_once('../frame.php');
	$db = get_db();
	$sql = "select id,title,created_at,address,is_adopt from hoau_email order by created_at";
	$records = $db->query($sql);
	close_db();
	$count = count($records);
	rights($_SESSION["hoaurights"],'4');
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
			<td colspan="5" width="795">　电子邮件管理　<a href="email_add.php" style="color:#0000FF">添加邮件</a></td>
		</tr>
		<tr class="tr2">
			<td width="350">标题</td><td width="180">发表时间</td><td width="250">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="email_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->title;?></a></td>
			<td><?php echo date_format($records[$i]->created_at,"Y-m-d");?></td>
			<td>
				<span style="color:#FF0000;cursor:pointer" name="<?php echo $records[$i]->id;?>" class="send">发送</span>
				<a href="email_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_email">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php //paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	$(function(){
		$(".send").click(function(){
			$.post('send_mail.php',{
				'mail_id':$(this).attr('name')
			},function(date){
				alert(date);
			})
		})
	})
</script>
