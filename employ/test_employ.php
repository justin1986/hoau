<?php
	require_once('../frame.php');
  	$post_table="hoau_employ";
	$db = get_db();
	$sql = "select id,name from hoau_position order by priority";
	$position = $db->query($sql);
	$pos_count = count($position);
	$province = $db->query("select id,name from hoau_province where parent_id=0 order by priority");
	$pro_count = count($province);
  	$post_url='index.php?reload='.rand_str(5);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		use_jquery();
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" enctype="multipart/form-data" method="post" action="test_employ.post.php">
		<tr class=tr1>
			<td colspan="2">　简历上传测试页面</td>
		</tr>
		<tr class=tr3>
			<td width=150>职位名：</td>
			<td width=645 align="left">
				<select name="post[position_id]" class="required">
					<?php for($i=0;$i<$pos_count;$i++){?>
						<option value="<?php echo $position[$i]->id; ?>"><?php echo $position[$i]->name;?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>城市名：</td>
			<td width=645 align="left">
				<select id="s_city">
					<option value=''></option>
					<?php for($i=0;$i<$pro_count;$i++){
					?>
					<option value="<?php echo $province[$i]->id;?>"><?php echo $province[$i]->name;?></option>
					<?php
					} ?>
				</select>
				<span id="show_city">
					<input type="hidden" id="city_id" value="0">
				</span>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>上传简历：</td>
			<td width=645 align="left">
				<input type="hidden" name="MAX_FILE_SIZE" value="5000000000"><input name="url" id="url" type="file">
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button id="submit" type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
	</form>
	</table>
</body>
</html>

<script>
	$(function(){
		$("#s_city").change(function(){
			$.post('/employ/show_city.php',{'id':$(this).val()},function(data){
				$("#show_city").html(data);
			});
		})
		
		$("#submit").click(function(){
			if($("#city_id").val()==0){
				alert("请选择城市！");
				return false;
			}
			if($("#url").val()==''){
				alert("请上传简历！");
				return false;
			}
		})
	})
</script>