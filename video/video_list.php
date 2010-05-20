<?php
	require_once('../frame.php');
	
	$title = $_REQUEST['title'];
	$is_adopt = $_REQUEST['adopt'];
	$db = get_db();
	$sql = "select * from hoau_video where 1=1";
	
	$records = $db->paginate($sql,20);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		rights($_SESSION["hoaurights"],'8');
	?>
</head>
<body>
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　视频管理　<a href="video_add.php" style="color:#0000FF">视频上传</a>　
			搜索　<input id=title type="text" value="<?php echo $title;?>">　<input type="button" value="搜索" id="hoau_search" style="border:1px solid #0000ff; height:21px"></td>
		</tr>
		<tr class="tr2">
			<td width="200">标题</td><td width="200">发布时间</td><td width="390">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->title;?></td>
			<td><?php echo date_format($records[$i]->created_at,"Y-m-d");?></td>
			<td>
				<?php if($records[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $records[$i]->id;?>">撤消</span>
				<?php }?>
				<?php if($records[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $records[$i]->id;?>">发布</span>
				<?php }?>
				<a href="video_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_video">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>
