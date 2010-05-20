<?php
	require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['title'];
	$title = format_mssql($title);
	$s_province = $_REQUEST['s_province'];
	$s_city = $_REQUEST['s_city'];
	$e_province = $_REQUEST['e_province'];
	$e_city = $_REQUEST['e_city'];
	$sql = "select * from hoau_drd_price where 1=1";
	if($title!=''){
		$sql = $sql." and (startprovince like '%".$title."%' or startcity like '%".$title."%' or endprovince like '%".$title."%' or endcity like '%".$title."%' or timeinterval like '%".$title."%' or pickday like '%".$title."%' or pickampm like '%".$title."%' or heavyprice like '%".$title."%' or opendate like '%".$title."%')";
	}
	if($s_province!='0'&&$s_province!=''){
		$sql = $sql." and startprovince='$s_province'";
	}
	if($e_province!='0'&&$e_province!=''){
		$sql = $sql." and endprovince='$e_province'";
	}
	if($s_city!='0'&&$s_city!=''&&$s_city!='undefined'){
		$sql = $sql." and startcity='$s_city'";
	}
	if($e_city!='0'&&$e_city!=''&&$e_city!='undefined'){
		$sql = $sql." and endcity='$e_city'";
	}
	$sql = $sql." order by id desc";
	$records = $db->paginate($sql,20);
	$count = count($records);
	rights($_SESSION["hoaurights"],'3');
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
			<td colspan="9" width="795">定日达价格管理　<a href="drd_price_add.php" style="color:#0000FF">添加线路价格</a>
			搜索<input id=title type="text" style="width:100px;" value="<?php echo $_REQUEST['title'];?>">　
			始发<select id="s_city">
					<option></option>
					<?php 
						$record = $db->query("select * from hoau_province where parent_id=0 and is_drd_price=1");
						$count2 = count($record);
						for($i=0;$i<$count2;$i++){
					?>
						<option <?php if($record[$i]->name==$s_province){?>selected="selected"<?php }?> value="<?php echo $record[$i]->name;?>"><?php echo $record[$i]->name;?></option>
					<?php }?>
				</select>
				<span id="s_show_city">
					<?php if($s_city!='0'&&$s_city!=''){
					?>
					<select id="city_id">
						<option value="0"></option>
						<?php 
							$sql = "select t1.* from hoau_province t1 join hoau_province t2 on t1.parent_id=t2.id  where t1.is_drd_price=1 and t1.parent_id>0 and t2.parent_id=0 and t2.name='".$s_province."'";
							echo $sql;
							$record = $db->query($sql);
							$count2 = count($record);
							for($i=0;$i<$count2;$i++){
						?>
						<option <?php if($record[$i]->name==$s_city){?>selected="selected"<?php }?> value="<?php echo $record[$i]->name?>"><?php echo $record[$i]->name;?></option>
						<?php }?>
					</select>
					<?php }elseif($s_city=='0'){
					?>
					<select id="city_id">
						<option value="0"></option>
						<?php 
							$sql = "select t1.* from hoau_province t1 join hoau_province t2 on t1.parent_id=t2.id  where t1.is_drd_price=1 and t1.parent_id>0 and t2.parent_id=0 and t2.name='".$s_province."'";
							$record = $db->query($sql);
							$count2 = count($record);
							for($i=0;$i<$count2;$i++){
						?>
						<option <?php if($record[$i]->name==$s_city){?>selected="selected"<?php }?> value="<?php echo $record[$i]->name?>"><?php echo $record[$i]->name;?></option>
						<?php }?>
					</select>
					<?php }else{?>
					<span id="city_id">
					</span>
					<?php
					} ?>
				</span>
				结束<select id="e_city">
					<option></option>
					<?php 
						$record = $db->query("select * from hoau_province where parent_id=0  and is_drd_price=1");
						$count2 = count($record);
						for($i=0;$i<$count2;$i++){
					?>
						<option <?php if($record[$i]->name==$e_province){?>selected="selected"<?php }?> value="<?php echo $record[$i]->name;?>"><?php echo $record[$i]->name;?></option>
					<?php }?>
				</select>
				<span id="e_show_city">
					<?php if($e_city!='0'&&$e_city!=''){
					?>
					<select id="city_id2">
						<option value="0"></option>
						<?php 
							$sql = "select t1.* from hoau_province t1 join hoau_province t2 on t1.parent_id=t2.id  where t1.is_drd_price=1 and t1.parent_id>0 and t2.parent_id=0 and t2.name='".$e_province."'";
							echo $sql;
							$record = $db->query($sql);
							$count2 = count($record);
							for($i=0;$i<$count2;$i++){
						?>
						<option <?php if($record[$i]->name==$e_city){?>selected="selected"<?php }?> value="<?php echo $record[$i]->name?>"><?php echo $record[$i]->name;?></option>
						<?php }?>
					</select>
					<?php }elseif($e_city=='0'){
					?>
					<select id="city_id2">
						<option value="0"></option>
						<?php 
							$sql = "select t1.* from hoau_province t1 join hoau_province t2 on t1.parent_id=t2.id  where t1.is_drd_price=1 and t1.parent_id>0 and t2.parent_id=0 and t2.name='".$e_province."'";
							$record = $db->query($sql);
							$count2 = count($record);
							for($i=0;$i<$count2;$i++){
						?>
						<option <?php if($record[$i]->name==$e_city){?>selected="selected"<?php }?> value="<?php echo $record[$i]->name?>"><?php echo $record[$i]->name;?></option>
						<?php }?>
					</select>
					<?php }else{?>
					<span id="city_id2">
					</span>
					<?php
					} ?>
				</span>　
			<input type="button" value="搜索" id="hoau_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="100">起始地区</td><td width="100">结束地区</td><td width="100">运输时间</td><td width="100">到达时间</td><td width="100">起步价</td><td width="100">重货</td><td width="100">轻货</td><td width="100">开线时间</td><td width="95">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="drd_price_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->startprovince;?>-<?php echo $records[$i]->startcity;?></a></td>
			<td><a href="drd_price_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->endprovince;?>-<?php echo $records[$i]->endcity;?></a></td>
			<td><?php echo $records[$i]->timeinterval;?>小时</td>
			<td>
				<?php 
					if($records[$i]->pickday==1){
						echo '第一天';
					}elseif($records[$i]->pickday==2){
						echo '第二天';
					}else{
						echo '第三天';
					};
					if($records[$i]->pickampm==1){
						echo '上午';
					}else{
						echo '下午';
					}
				?>
			</td>
			<td><?php echo $records[$i]->initialprice;?>元/票</td>
			<td><?php echo $records[$i]->heavyprice;?>元/公斤</td>
			<td><?php echo $records[$i]->lightprice;?>元/立方</td>
			<td><?php echo $records[$i]->opendate;?></td>
			<td>
				<?php if($records[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $records[$i]->id;?>">撤消</span>
				<?php }?>
				<?php if($records[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $records[$i]->id;?>">发布</span>
				<?php }?>
				<a href="drd_price_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_drd_price">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="9	" class=tr3>
				<td><a href="relation_price.php">关联省份</a>　<?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	$(function(){
		$("#s_city").change(function(){
			$.post('/employ/show_city2.php',{'id':$(this).val(),'type':'is_drd_price'},function(data){
				$("#s_show_city").html(data);
			});
		})
		
		$("#e_city").change(function(){
			$.post('/employ/show_city3.php',{'id':$(this).val(),'type':'is_drd_price'},function(data){
				$("#e_show_city").html(data);
			});
		})
		
		$("#hoau_search").click(function(){
			window.location.href="?title="+encodeURI($("#title").val())+"&s_province="+encodeURI($("#s_city").val())+"&s_city="+encodeURI($("#city_id").val())+"&e_province="+encodeURI($("#e_city").val())+"&e_city="+encodeURI($("#city_id2").val());
		})
		
		$("#title").keypress(function(event){
				if (event.keyCode == 13) {
					window.location.href="?title="+encodeURI($("#title").val())+"&s_province="+encodeURI($("#s_city").val())+"&s_city="+encodeURI($("#city_id").val())+"&e_province="+encodeURI($("#e_city").val())+"&e_city="+encodeURI($("#city_id2").val());
				}
		});
	})
</script>