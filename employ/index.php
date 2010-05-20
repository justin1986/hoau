<?php
	require_once('../frame.php');
	$province = $_REQUEST['province'];
	$city = $_REQUEST['city'];
	$position = $_REQUEST['position'];
	$s_date = $_REQUEST['s_date'];
	$e_date = $_REQUEST['e_date'];
	$read = $_REQUEST['read'];
	
	$db = get_db();
	$sql = "select t1.*,t2.name as p_name,t3.CityName as c_name from hoau_employ t1 join hoau_position t2 on t1.position_id=t2.id join S_City t3 on t1.city_id=t3.CityID where 1=1";
	if($city!=''){
		$sql = $sql." and city_id=".$city;
	}
	if($province!=''){
		$sql = $sql." and t3.ProvinceID=".$province;
	}
	if($position!=''){
		$sql = $sql." and position_id=".$position;
	}
	if($s_date!=''){
		$sql = $sql." and date>'".$s_date." 00:00:00'";
	}
	if($e_date!=''){
		$sql = $sql." and date<'".$e_date." 23:59:59'";
	}
	if($read!=''){
		$sql = $sql." and is_read=".$read;
	}
	$sql = $sql." order by t1.date desc";
	$records = $db->paginate($sql,20);
	$count = count($records);
	rights($_SESSION["hoaurights"],'5');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php 
		css_include_tag('admin','jquery_ui');
		use_jquery_ui();
		js_include_tag('admin_pub');
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="6" width="795">简历管理
				城市<select style="width:100px;" id="s_city">
					<option value=""></option>
					<?php 
						$record = $db->query("select * from S_Province");
						$count2 = count($record);
						for($i=0;$i<$count2;$i++){
					?>
						<option <?php if($record[$i]->ProvinceID==$province){?>selected="selected"<?php }?> value="<?php echo $record[$i]->ProvinceID;?>"><?php echo $record[$i]->ProvinceName;?></option>
					<?php }?>
				</select>
				<span  id="show_city">
					<?php if($city!=''||$province){
					?>
					<select id="city_id">
						<option value=""></option>
						<?php 
							$sql = "select * from S_City where ProvinceID=".$province;
							$record = $db->query($sql);
							$count2 = count($record);
							for($i=0;$i<$count2;$i++){
						?>
						<option <?php if($record[$i]->CityID==$city){?>selected="selected"<?php }?> value="<?php echo $record[$i]->CityID?>"><?php echo $record[$i]->CityName;?></option>
						<?php }?>
					</select>
					<?php }else{
					?>
					<span id="city_id"></span>
					<?php
					} ?>
				</span>
				职位<select id="p_id">
					<option></option>
					<?php 
						$record = $db->query("select * from hoau_position");
						$count2 = count($record);
						for($i=0;$i<$count2;$i++){
					?>
						<option <?php if($record[$i]->id==$position){?>selected="selected"<?php }?> value="<?php echo $record[$i]->id;?>"><?php echo $record[$i]->name;?></option>
					<?php }?>
				</select>
				时间<input type="text" value="<?php echo $s_date;?>" class="date_jquery" id="s_date" style="width:80px;">
				<input type="text" value="<?php echo $e_date;?>" class="date_jquery" id="e_date" style="width:80px;">
				已读<select id="r_id">
					<option></option>
					<option <?php if($read=="0"){?>selected="selected"<?php }?> value="0">未读</option>
					<option <?php if($read=="1"){?>selected="selected"<?php }?> value="1">已读</option>
				</select><button type="button" id="submit">提交</button>
			</td>
		</tr>
		
		<tr class="tr2">
			<td width="55">删</td><td width="200">职位名</td><td width="100">投递城市</td><td width="200">时间</td><td width="195">操作</td><td width="100">是否已读</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><input style="width:12px;" type="checkbox" name="delete_employ[]" value="<?php echo $records[$i]->id;?>"></td>
			<td><?php echo $records[$i]->p_name;?></td>
			<td><?php echo $records[$i]->c_name;?></td>
			<td><?php echo date_format($records[$i]->date,"Y-m-d H:i:s");?></td>
			<td>
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
				<a href="download.php?id=<?php echo $records[$i]->id;?>" class="read" name="<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">查看简历</a> 
			</td>
			<td id="set_read_<?php echo $records[$i]->id;?>"><?php if($records[$i]->is_read==1){echo "已读";}else{echo "未读";}?></td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_employ">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><span style="cursor:pointer;" id="select_all">全选</span>　<span style="cursor:pointer;" id="button_delete">删除</span>　<?php paginate();?><span style="cursor:pointer;" id="zip_download">批量下载</span></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	$(function(){
		$(".read").click(function(){
			$.post('set_read.php',{'id':$(this).attr('name')},function(data){
				$("#set_read_"+data).html('已读');
			});
		});
		
		$("#s_city").change(function(){
			$.post('/employ/show_city.php',{'id':$(this).val()},function(data){
				$("#show_city").html(data);
			});
		});
		
		$('#button_delete').click(function(){
			if (confirm('确定删除选中简历?')) {
				$.post('delete.php', $('input:checkbox').serializeArray(), function(data){
					window.location.reload();
				});
			}
		});
		
		var all_selected = false;
		$('#select_all').click(function(){
			all_selected = !all_selected;
			$('input:checkbox').attr('checked',all_selected);
		});
		
		$(".date_jquery").datepicker(
			{
				monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			}
		);
		
		
		$("#submit").click(function(){
			var province = $("#s_city").val();
			var city = $("#city_id").val();
			var position = $("#p_id").val();
			var s_date = $("#s_date").val();
			var e_date = $("#e_date").val();
			var read = $("#r_id").val();
			window.location.href="?province="+province+"&city="+city+"&position="+position+"&s_date="+s_date+"&e_date="+e_date+"&read="+read;
		});
		
		$("#zip_download").click(function(){
			$.post('/upload/employ/zip_download.php',{'province':'<?php echo $province;?>','city':'<?php echo $city;?>','position':'<?php echo $position;?>','date':'<?php echo $date;?>','read':'<?php echo $read;?>'},function(data){
				if(data=='error'){
					alert('超过最大下载数，请筛选后再下载');
				}else{
					window.location.href = "/upload/employ/"+data;
				}
					
			});
		});
	});
</script>
