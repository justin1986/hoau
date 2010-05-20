<?php
	require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['title'];
	$title = format_mssql($title);
	if($title!=''){
		$sql = "select * from hoau_information where 1=1 and (name like '%".$title."%') order by created_at desc";
	}else{
		$sql = "select * from hoau_information where 1=1 order by created_at desc";
	}
	$records = $db->paginate($sql,20);
	$count = count($records);
	rights($_SESSION["hoaurights"],'2');
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
			<td colspan="5" width="795">　资料管理　<a href="information_add.php" style="color:#0000FF">资料上传</a>　
			搜索　<input id=title type="text" value="<? echo $_REQUEST['title']?>">　<input type="button" value="搜索" id="hoau_search" style="border:1px solid #0000ff; height:21px"></td>
		</tr>
		<tr class="tr2">
			<td width="350">名称</td><td width="180">时间</td><td width="250">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="information_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->name;?></a></td>
			<td><?php echo date_format($records[$i]->created_at,"Y-m-d");?></td>
			<td>
				<?php if($records[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $records[$i]->id;?>">撤消</span>
				<?php }?>
				<?php if($records[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $records[$i]->id;?>">发布</span>
				<?php }?>
				<a href="information_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">修改</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_information">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	$(function(){
		$("#hoau_search").click(function(){
			window.location.href="?title="+encodeURI($("#title").val());
		})
		
		$("#title").keypress(function(event){
				if (event.keyCode == 13) {
					window.location.href="?title="+encodeURI($("#title").val());
				}
		});
	})
</script>
