<?php
    require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['search'];
	$title = format_mssql($title);
	$tiaojian = $_REQUEST['tiaojian'];
	$tiaojian = format_mssql($tiaojian);
	$province = $_REQUEST['province'];
	$city = $_REQUEST['city'];
	$ywfw = $_REQUEST['ywfw'];
	$id = $_REQUEST['wdid'];
	$sql = "select t1.*,t2.PMC,t3.CITYNAME from hoau_yywd t1 left join hoau_new_province t2 on t1.SF=t2.PID left join hoau_new_city t3 on t1.CS=t3.CITYID where 1=1";
	if($tiaojian!=''){
		if($tiaojian=='code'){
			$sql = $sql." and GSJC like '%{$title}%'";
		}elseif($tiaojian=='name'){
			$sql = $sql." and QYMC like '%{$title}%'";
		}
	}elseif($title!=''){
		$sql = $sql." and (QYMC like '%{$title}%' or QYBH like '%{$title}%' or GSBH like '%{$title}%' or GSJC like '%{$title}%' or SJGSBH like '%{$title}%' or ZS like '%{$title}%' or DH like '%{$title}%' or CZ like '%{$title}%' or YB like '%{$title}%' or BZ like '%{$title}%' or QH like '%{$title}%')";
	}
	if($ywfw=='drd'){
		$sql = $sql." and SFTGDRDFW='1'";
	}
	if($province!=''){
		$sql = $sql." and SF='{$province}'";
	}
	if($city!=''){
		$sql = $sql." and CS='{$city}'";
	}
	if($id!=''){
		$sql = $sql." and id='{$id}'";
	}
	$sql = $sql." order by GSJC asc";
	$records = $db->paginate($sql,10);
	$count = count($records);
	css_include_tag('drd/show_drd');
?>
<div id="show_result">
	<div id="r_title">
		<div id="title_box">
			<div class=box style="border-left:0; width:80px;">名称</div>
			<div class=box style="width:65px;">网点代码</div>
			<div class=box style="width:150px;">地址</div>
			<div class=box style="width:95px;">电话</div>
			<div class=box style="width:95px;">传真</div>
			<div class=box style="width:40px;">地图</div>
			<div class=box style="width:40px; border-right:0;">详细</div>
		</div>
	</div>
	<div id="main">
		<div id="box">
			<?php 
				if($count==0){
					echo "你所查询的网点不存在";
				}else{
				for($i=0;$i<$count;$i++){
			?>
			<div id="<?php echo $records[$i]->id;?>" class="line" <?php if($i==9){echo "style='border:0'";}?>>
				<div class="line2" title="<?php echo $records[$i]->QYMC;?>"><?php echo $records[$i]->QYMC;?></div>
				<div class="line1" title="<?php echo $records[$i]->GSJC;?>"><?php echo $records[$i]->GSJC;?></div>
				<div class="line3" title="<?php echo $records[$i]->ZS;?>"><?php echo $records[$i]->ZS;?></div>
				<div class="line4" title="<?php echo ($records[$i]->DH!='')?$records[$i]->phone:'暂无';?>"><?php echo ($records[$i]->DH!='')?$records[$i]->DH:'暂无';?></div>
				<div class="line5" title="<?php echo ($records[$i]->CZ!='')?$records[$i]->CZ:'暂无';?>"><?php echo ($records[$i]->CZ!='')?$records[$i]->CZ:'暂无';?></div>
				<div class="line6 dt" style="text-decoration:underline;color:#283DB0;">地图</div>
				<div class="line6 xx" style="text-decoration:underline;color:#283DB0;">详细</div>
			</div>
			<?php
			}} ?>
		</div>
		<div id=paginate>
			<?php paginate('','show_result');?>
		</div>
	</div>
</div>
<div id="fh">返回</div>
<script>
	$(function(){
		var url = 'show_drdnetstate.php?search='+encodeURI('<?php echo $title?>');
		if($("#pageselect").val()>1){
			url = url+'&page='+$("#pageselect").val();
		}
		<?php 
			if($tiaojian!=''){
		?>
			url = url+'&tiaojian='+encodeURI('<?php echo $tiaojian;?>');
		<?php
			}
		?>
		<?php 
			if($province!=''){
		?>
			url = url+'&province='+encodeURI('<?php echo $province;?>');
		<?php
			}
		?>
		<?php 
			if($city!=''){
		?>
			url = url+'&city='+encodeURI('<?php echo $city;?>');
		<?php
			}
		?>
		<?php 
			if($ywfw=='drd'){
		?>
			url = url+'&ywfw='+encodeURI('drd');
		<?php
			}
		?>
		
		
		
		$(".dt").click(function(){
			$.post('show_map.php',{'id':$(this).parent().attr('id')},function(data){
				$("#show_result").html(data);
				$("#fh").css('display','inline');
				$("#fh").click(function(){
					$("#fh").css('display','none');
					$("#show_result").load(url);
					$("#fh").unbind("click");
				})
			})
		})
		
		$(".xx").click(function(){
			$.post('show_xx.php',{'id':$(this).parent().attr('id')},function(data){
				$("#show_result").html(data);
				$("#fh").css('display','inline');
				$("#fh").click(function(){
					$("#fh").css('display','none');
					$("#show_result").load(url);
					$("#fh").unbind("click");
				})
			})
		})
	})
	</script>