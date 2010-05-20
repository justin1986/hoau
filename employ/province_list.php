<?php
	require_once('../frame.php');
	$menu_table="hoau_province";
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
<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">　省市管理　<a href="province_add.php?id=0">添加省份</a></td>
		</tr>
		<tr class="tr2">
			<td width="300">省市名称</td><td width="100">优先级</td><td width="395">操作</td>
		</tr>
		<?php
			$db = get_db();
			$record = $db->paginate("select id,name,priority from hoau_province where parent_id=0 order by priority asc",20);
			$record2 = $db->query("select id,name,parent_id,priority from hoau_province where parent_id>0 order by priority asc,id desc");
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><img style="cursor:pointer" name="<?php echo $record[$i]->name;?>" src="/images/plus.gif"><?php echo $record[$i]->name;?></td>
					<td><input type="text" class="priority" name="<?php echo $record[$i]->id;?>" value="<?php if($record[$i]->priority!=100){echo $record[$i]->priority;}?>" style="width:30px;"></td>
					<td><a href="province_add.php?id=<?php echo $record[$i]->id;?>">添加城市</a>　<a href="province_edit.php?id=<?php echo $record[$i]->id;?>" target="admin_iframe">编辑</a>　<a class="del" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer">删除</a></td>
				</tr>
		<?php
				//----------
				for($j=0;$j<count($record2);$j++){
					if($record2[$j]->parent_id==$record[$i]->id){
		?>
					<tr class=tr3 style="display:none;" id=<?php echo $record2[$j]->id;?> name="<?php echo $record[$i]->name;?>">
						<td><li style="color:#0000ff;"><?php echo $record2[$j]->name;?></li></td>
						<td><input type="text" class="priority" name="<?php echo $record2[$j]->id;?>" value="<?php if($record2[$j]->priority!=100){echo $record2[$j]->priority;}?>" style="width:30px;"></td>
						<td><a href="province_edit.php?id=<?php echo $record2[$j]->id;?>" target="admin_iframe">编辑</a>　<a class="del" name="<?php echo $record2[$j]->id;?>" style="color:#ff0000; cursor:pointer">删除</a></td>
					</tr>
		<?php
					}
				}
				//----------
			}
			//--------------------
		?>
		<input type="hidden" id="db_table" value="<?php echo $menu_table;?>">
	</table>
	<table width="795" border="0">
		<tr colspan="5" class=tr3>
			<td><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
		</tr>
	</table>
</body>
</html>
<script>
$(function(){
		$("tr td img").click(function(){
			var main_id = $(this).attr('name');
			if($("tr[name*='"+main_id+"']").css('display')=='none'){
				$(this).attr('src','/images/moners.gif');
				$("tr[name*='"+main_id+"']").show();
			}else{
				$(this).attr('src','/images/plus.gif');
				$("tr[name*='"+main_id+"']").hide();
			}
			
		});
});
</script>