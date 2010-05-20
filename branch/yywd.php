<?php
	require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['title'];
	$title = format_mssql($title);
	$province = $_REQUEST['province'];
	$city = $_REQUEST['city'];
	$id_drd = $_REQUEST['is_drd'];
	$is_new = $_REQUEST['is_new'];
	$sql = "select t1.*,t2.PMC,t3.CITYNAME from hoau_yywd t1 left join hoau_new_province t2 on t1.SF=t2.PID left join hoau_new_city t3 on t1.CS=t3.CITYID where 1=1";
	if($title!=''){
		$sql = $sql." and (QYBH like '%{$title}%' or QYMC like '%{$title}%' or GSBH like '%{$title}%' or GSJC like '%{$title}%' or SJGSBH like '%{$title}%' or ZS like '%{$title}%' or DH like '%{$title}%' or CZ like '%{$title}%' or YB like '%{$title}%' or BZ like '%{$title}%' or QH like '%{$title}%')";
	}
	if($province!='0'&&$province!=''){
		$sql = $sql." and SF='{$province}'";
	}
	if($city!='0'&&$city!=''&&$city!='undefined'){
		$sql = $sql." and CS='{$city}'";
	}
	if($id_drd!=''){
		if($id_drd==1){
			$sql = $sql." and SFTGDRDFW=$id_drd";
		}else{
			$sql = $sql." and (SFTGDRDFW is null or SFTGDRDFW<>1)";
		}
		
	}
	if($is_new!=''){
		$sql = $sql." and is_new=$is_new";
	}
	$sql = $sql." order by GSJC asc";
	$records = $db->paginate($sql,15);
	//var_dump($records[0]);
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
			<td colspan="10" width="795">运营点管理
			<a href="yywd_edit.php" style="color:#0000FF">添加</a>
			搜索<input id=title type="text" style="width:100px;" value="<?php echo $_REQUEST['title'];?>">　
			省市<select id="province">
					<option value=""></option>
					<?php
						$db = get_db();
						$record = $db->query("select * from hoau_new_province");
						for($i=0;$i<count($record);$i++){
					?>
					<option <?php if($record[$i]->PID==$province)echo 'selected="selected"';?> value="<?php echo $record[$i]->PID?>"><?php echo $record[$i]->PMC;?></option>
					<?php
						}
					?>
				</select>
				<select id="city" style="width:80px;">
					<?php if($province!=''){?>
					<option value=""></option>
					<?php 
						$db = get_db();
						$record = $db->query("select * from hoau_new_city where PID='".$province."'");
						for($i=0;$i<count($record);$i++){
					?>
					<option <?php if($record[$i]->CITYID==$yywd->CS)echo 'selected="selected"';?> value="<?php echo $record[$i]->CITYID?>"><?php echo $record[$i]->CITYNAME;?></option>
					<?php }}else{?>
					<option value=""></option>
					<?php }?>
				</select>　
				是否定日达<select id="is_drd">
				<option value=""></option>
				<option <?php if($id_drd=='1')echo "selected=selected";?> value="1">是</option>
				<option <?php if($id_drd=='0')echo "selected=selected";?> value="0">否</option>
				</select>　
				是否新增<select id="is_new">
				<option value=""></option>
				<option <?php if($is_new=='1')echo "selected=selected";?> value="1">是</option>
				<option <?php if($is_new=='0')echo "selected=selected";?> value="0">否</option>
				</select><input type="button" value="搜索" id="hoau_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="65">公司简称</td><td width="140">企业名称</td><td width="160">地址</td><td width="45">省</td><td width="45">市</td><td width="80">电话</td><td width="95">传真</td><td width="50">定日达</td><td width="115">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="yywd_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->GSJC;?></a></td>
			<td><a href="yywd_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo $records[$i]->QYMC;?></a></td>
			<td><?php echo $records[$i]->ZS;?></td>
			<td><?php echo $records[$i]->PMC;?></td>
			<td><?php echo $records[$i]->CITYNAME;?></td>
			<td><?php echo $records[$i]->DH;?></td>
			<td><?php echo $records[$i]->CZ;?></td>
			<td><?php echo ($records[$i]->SFTGDRDFW=="1")?"是":"否";?></td>
			<td>
				<?php if($records[$i]->is_new==0){?>
				<span style="color:#ff0000; cursor:pointer" class="new" name="<?php echo $records[$i]->id;?>">设为新增</span>
				<?php }else{?>
				<span style="color:#ff0000; cursor:pointer" class="del_new" name="<?php echo $records[$i]->id;?>">取消新增</span>
				<?php }?>
				<a href="yywd_edit.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_yywd">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="10" class=tr3>
				<td><a href="show_flash.php" target="_blank" style="color:#0000FF">查看前台FLASH</a>　<?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>


<script>
	$(function(){
		$("#province").change(function(){
			$.post('show_city.php',{'p_id':$('#province').val()},function(data){
				$("#city").html(data);
			})
		})
		
		$(".new").click(function(){
			if(!window.confirm("确定要设为新增网点吗？"))
			{
				return false;
			}
			else
			{
				$.post("/test_xls/new.post.php",{'id':$(this).attr('name'),'type':'new'},function(data){
					window.location.href="?title="+encodeURI($("#title").val())+"&province="+encodeURI($("#province").val())+"&city="+encodeURI($("#city").val())+"&is_drd="+$("#is_drd").val()+"&is_new="+$("#is_new").val();
				});
			}
		})
		$(".del_new").click(function(){
			if(!window.confirm("确定要取消新增网点吗？"))
			{
				return false;
			}
			else
			{
				$.post("/test_xls/new.post.php",{'id':$(this).attr('name'),'type':'del'},function(data){
					window.location.href="?title="+encodeURI($("#title").val())+"&province="+encodeURI($("#province").val())+"&city="+encodeURI($("#city").val())+"&is_drd="+$("#is_drd").val()+"&is_new="+$("#is_new").val();
				});
			}
		})
		$("#hoau_search").click(function(){
			window.location.href="?title="+encodeURI($("#title").val())+"&province="+encodeURI($("#province").val())+"&city="+encodeURI($("#city").val())+"&is_drd="+$("#is_drd").val()+"&is_new="+$("#is_new").val();
		})
		
		$("#title").keypress(function(event){
				if (event.keyCode == 13) {
					window.location.href="?title="+encodeURI($("#title").val())+"&province="+encodeURI($("#province").val())+"&city="+encodeURI($("#city").val())+"&is_drd="+$("#is_drd").val()+"&is_new="+$("#is_new").val();;
				}
		});
	})
</script>
