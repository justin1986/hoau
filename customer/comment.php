<?php
	require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['title'];
	$title = format_mssql($title);
	$status = $_REQUEST['status'];
	$s_date = $_REQUEST['s_date'];
	$e_date = $_REQUEST['e_date'];
	$sql  = "select id,topic,time,status,wbnum,is_adopt,type,ip from hoau_comment where 1=1";
	if($title!=''){
		$sql = $sql." and (name like '%{$title}%' or topic like '%{$title}%' or email like '%{$title}%' or tel like '%{$title}%' or message like '%{$title}%' or reply like '%{$title}%')";
	}
	if($status!=''){
		$sql = $sql." and status=".$status;
	}
	if($s_date!=''){
		$sql = $sql." and time>'".$s_date." 00:00:00'";
	}
	if($e_date!=''){
		$sql = $sql." and time<'".$e_date." 23:59:59'";
	}
	$sql = $sql." order by time desc";
	$records = $db->paginate($sql,20);
	$count = count($records);
	close_db();
	rights($_SESSION["hoaurights"],'2');
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
			<td colspan="10" width="795">　用户留言管理　<a href="csv.php?start=<?php echo $s_date;?>&end=<?php echo $e_date;?>&key=<?php echo $title;?>&status=<?php echo $status;?>">导出</a>
			搜索　<input id=title style="width:100px;" type="text" value="<? echo $_REQUEST['title']?>">　
			时间<input type="text" value="<?php echo $s_date;?>" class="date_jquery" id="s_date" style="width:80px;">
			<input type="text" value="<?php echo $e_date;?>" class="date_jquery" id="e_date" style="width:80px;">　
			处理状态　<select id="status"><option value=''></option><option <?php if($status==1){echo "selected=selected";}?> value="1">未处理</option><option  <?php if($status==3){echo "selected=selected";}?> value="3">处理中</option><option  <?php if($status==2){echo "selected=selected";}?> value="2">已处理</option></select>
			　<input type="button" value="搜索" id="hoau_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="200">题目</td><td width="100">运单号</td><td width="50">类型</td><td width="100">处理状态</td><td width="100">留言时间</td><td width="80">IP</td><td width="150">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="comment_show.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none"><?php echo htmlspecialchars($records[$i]->topic);?></a></td>
			<td><?php echo $records[$i]->wbnum;?></td>
			<td><?php 
					if($records[$i]->type==1){
						echo "留言";
					}elseif($records[$i]->type==2){
						echo "建议";
					}elseif($records[$i]->type==3){
						echo "投诉";
					}
				?></td>
			<td>
				<?php  if($records[$i]->status==1)echo "未处理";elseif($records[$i]->status==2)echo "已处理";else echo "处理中";?>
			</td>
			<td><?php echo date_format($records[$i]->time,"Y-m-d");?></td>
			<td><?php echo $records[$i]->ip;?></td>
			<td>
				<?php if($records[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $records[$i]->id;?>">撤消审核</span>
				<?php }elseif($records[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $records[$i]->id;?>">通过审核</span>
				<?php }elseif($records[$i]->is_adopt=="2"){?>
					<span>仅管理员可见</span>
				<?php }?>
				<a href="comment_show.php?id=<?php echo $records[$i]->id;?>" style="color:#000000; text-decoration:none">查看</a> 
				<span style="color:#ff0000; cursor:pointer" class="del" name="<?php echo $records[$i]->id;?>">删除</span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="hoau_comment">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="10" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	$(function(){
		$("#hoau_search").click(function(){
			search();
		})
		
		$("#title").keypress(function(event){
				if (event.keyCode == 13) {
					search();
				}
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
	})
	
	function search(){
		var s_date = $("#s_date").val();
		var e_date = $("#e_date").val();
		window.location.href="?title="+encodeURI($("#title").val())+"&status="+$("#status").val()+"&s_date="+s_date+"&e_date="+e_date;
	}
</script>
