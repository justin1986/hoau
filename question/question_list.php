<?php
	require_once('../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	$key = $_REQUEST['key'];
	$problem = new table_class('hoau_problem');
	$problem->find($id);
	$sql = "select * from hoau_question where 1=1 and problem_id=$id";
	if(!empty($key)){
		$sql = $sql." and name like '%{$key}%'";
	}
	$sql = $sql." order by priority";
	$record = $db->query($sql);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>问卷调查</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		rights($_SESSION["hoaurights"],'7');
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　　　<a href="question_edit.php?p_id=<?php echo $id;?>" style="color:#0000FF">发布题目</a>　<?php echo $problem->name;?>　<a href="list.php">返回调查表列表</a>
			<span style="margin-left:20px; font-size:13px"><input id="search_text1" type="text" value="<? echo $key;?>"></span>
			<input type="button" value="搜索题目" id="project_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="500">题目名称</td><td width="50">优先级</td><td width="200">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo $record[$i]->name;?></td>
			<td><input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;"></td>
			<td>
				<span style="cursor:pointer" class="del_problem" name="<?php echo $record[$i]->id;?>">删除</span>
				<a href="question_edit.php?id=<?php echo $record[$i]->id;?>&p_id=<?php echo $id;?>">编辑</a>
			</td>
		</tr>
		<?php }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_question">
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
	$(".del_problem").click(function(){
		if(!window.confirm("确定要删除吗"))
			{
				return false;
			}
			else
			{
				$.post("delete.php",{'del_id':$(this).attr('name'),'post_type':'question'},function(data){
					$("#"+data).remove();
				});
			}
	});
	
	$("#project_search").click(function(){
				window.location.href="?key="+$("#search_text1").attr('value')+"&id=<?php echo $id?>";
	});
	
	$('#search_text1').keydown(function(e){
		if(e.keyCode == 13){
			window.location.href="?key="+$("#search_text1").attr('value')+"&id=<?php echo $id?>";
		}
	});
	
</script>