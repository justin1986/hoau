<?php
	require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['title'];
	$category = $_REQUEST['category'];
	$title = format_mssql($title);
	$sql = "select t1.id,t1.short_title,t1.created_at,t1.priority,t1.is_adopt,t2.name as c_name from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1";
	if($title!=''){
		$sql = $sql." and (title like '%".$title."%' or short_title like '%".$title."%' or keywords like '%".$title."%' or description like '%".$title."%' or news_content like '%".$title."%')";
	}
	if($category!=''){
		$sql = $sql." and t1.category_id=$category";
	}
	$sql = $sql." order by t1.priority asc,created_at desc";
	$records = $db->paginate($sql,20);
	$count = count($records);
	rights($_SESSION["hoaurights"],'1');
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
			<td colspan="5" width="795">　新闻管理　<a href="news_add.php" style="color:#0000FF">发布新闻</a>　
			搜索　<input id=title type="text" value="<? echo $_REQUEST['title']?>">　
			类别<select id="category">
				<option value=""></option>
				<?php 
					$category = $db->query("select * from hoau_category");
					for($i=0;$i<count($category);$i++){
				?>
				<option value="<?php echo $category[$i]->id?>"><?php echo $category[$i]->name;?></option>
				<?php
					}
				?>
			</select>
			　<input type="button" value="搜索" id="hoau_search" style="border:1px solid #0000ff; height:21px"></td>
		</tr>
		<tr class="tr2">
			<td width="430">短标题</td><td width="100">所属类别</td><td width="150">发布时间</td><td width="65">优先级</td><td width="150">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="news_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->short_title;?></a></td>
			<td><?php echo $records[$i]->c_name;?></td>
			<td><?php echo date_format($records[$i]->created_at,"Y-m-d H:i:s");?></td>
			<td><input type="text" class="priority"  name="<?php echo $records[$i]->id;?>"  value="<?php if('100'!=$records[$i]->priority){echo $records[$i]->priority;};?>" style="width:40px;"></td>
			<td>	
				<?php if($records[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $records[$i]->id;?>">撤消</span>
				<?php }?>
				<?php if($records[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $records[$i]->id;?>">发布</span>
				<?php }?>
				<a href="news_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_news">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	$(function(){
		$("#hoau_search").click(function(){
			window.location.href="?title="+encodeURI($("#title").val())+'&category='+$("#category").val();
		})
		
		$("#title").keypress(function(event){
				if (event.keyCode == 13) {
					window.location.href="?title="+encodeURI($("#title").val())+'&category='+$("#category").val();
				}
		});
	})
</script>