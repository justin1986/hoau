<?php
	require_once('../frame.php');
	$db = get_db();
	$key = $_REQUEST['key'];
	$sql = "select id,userName,companyName from hoau_dkh where 1=1";
	if(!empty($key)){
		$sql = $sql." and userName like '%{$key}%' or companyName like '%{$key}%'";
	}
	$record = $db->query($sql);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>大客户</title>
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
			<td colspan="5" width="795">　　　<a href="dkh_edit.php" style="color:#0000FF">添加一个大客户</a>
			<span style="margin-left:20px; font-size:13px"><input id="search_text1" type="text" value="<? echo $key;?>"></span>
			<input type="button" value="搜索" id="project_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="250">客户名称</td><td width="250">公司名称</td><td width="290">操作</td>
		</tr>
		<? for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo $record[$i]->userName;?></td>
			<td><?php echo $record[$i]->companyName;?></td>
			<td><span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
				<a href="dkh_edit.php?id=<?php echo $record[$i]->id;?>">编辑</a>
			</td>
		</tr>
		<?  }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_dkh">
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
	$("#project_search").click(function(){
				window.location.href="?key="+$("#search_text1").attr('value');
	});
	
	$('#search_text1').keydown(function(e){
		if(e.keyCode == 13){
			window.location.href="?key="+$("#search_text1").attr('value');
		}
	});
	
</script>