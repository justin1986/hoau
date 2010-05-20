<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$question = new table_class('hoau_question');
	if(isset($id)){
		$question->find($id);
		$db = get_db();
		$item = $db->query("select * from hoau_question_item where question_id=$id");
		$item_count = count($item);
	}else{
		$item_count = 0;
	}
	$p_id = $_REQUEST['p_id'];
  	$post_url="question_list.php?id={$p_id}&reload=".rand_str(5);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('admin');
	?>
</head>
<?php
	rights($_SESSION["hoaurights"],'7');
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="question.post.php">
		<tr class=tr1>
			<td colspan="2">　
				<?php if(isset($id)){
					echo "编辑问题";
				}else{echo "添加问题";}?>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>标题：</td>
			<td width=645 align="left"><input type="text" name="post[name]" style="width:600px;" value="<?php echo $question->name;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>优先级：</td>
			<td width=645 align="left"><input type="text" name="post[priority]" value="<?php echo $question->priority;?>" class="number"></td>
		</tr>
		<?php for($i=0;$i<$item_count;$i++){?>
		<tr class=tr3>
			<td width=150>选项：</td>
			<td width=645 align="left"><input type="text" name="item[name][]" style="width:600px;" value="<?php echo $item[$i]->name;?>">
			<input type="hidden" name="item[id][]" value="<?php echo $item[$i]->id;?>"></td>
		</tr>
		<?php }?>
		<?php for($i=0;$i<8-$item_count;$i++){?>
		<tr class=tr3>
			<td width=150>选项：</td>
			<td width=645 align="left"><input type="text" style="width:600px;" name="item[new_name][]"></td>
		</tr>
		<?php }?>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="p_id" value="<?php echo $p_id;?>"> 
	</form>
	</table>
</body>
</html>
