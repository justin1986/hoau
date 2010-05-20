<?php
    require_once('../frame.php');
	$db = get_db();
	$title = $_REQUEST['search'];
	$title = format_mssql($title);
	$sql = "select * from hoau_company where 1=1";
	if($title!=''){
		$sql = $sql." and (name like '%{$title}%' or province like '%{$title}%' or city like '%{$title}%' or code like '%{$title}%' or short_name like '%{$title}%' or contactor like '%{$title}%' or address like '%{$title}%' or phone like '%{$title}%' or fax like '%{$title}%' or area like '%{$title}%')";
	}
	$sql = $sql." order by id desc";
	$records = $db->paginate($sql,10);
	$count = count($records);
	css_include_tag('drd/show_drd');
?>
<div id="show_result">
	<div id="r_title">
		<div id="title_box">
			<div class=box style="border-left:0; width:50px;">编号</div>
			<div class=box style="width:85px;">名称</div>
			<div class=box style="width:160px;">地址</div>
			<div class=box style="width:95px;">电话</div>
			<div class=box style="width:95px;">传真</div>
			<div class=box style="width:40px;">地图</div>
			<div class=box style="width:40px; border-right:0;">详细</div>
		</div>
	</div>
	<div id="main">
		<div id="box">
			<?php for($i=0;$i<$count;$i++){
			?>
			<div id="<?php echo $records[$i]->id;?>" class="line" <?php if($i==9){echo "style='border:0'";}?>>
				<div class="line1" title="<?php echo $records[$i]->code;?>"><?php echo $records[$i]->code;?></div>
				<div class="line2" title="<?php echo $records[$i]->name;?>"><?php echo $records[$i]->name;?></div>
				<div class="line3" title="<?php echo $records[$i]->address;?>"><?php echo $records[$i]->address;?></div>
				<div class="line4" title="<?php echo ($records[$i]->phone!='')?$records[$i]->phone:'暂无';?>"><?php echo ($records[$i]->phone!='')?$records[$i]->phone:'暂无';?></div>
				<div class="line5" title="<?php echo ($records[$i]->fax!='')?$records[$i]->fax:'暂无';?>"><?php echo ($records[$i]->fax!='')?$records[$i]->fax:'暂无';?></div>
				<div class="line6 dt">地图</div>
				<div class="line6 xx">详细</div>
			</div>
			<?php
			} ?>
		</div>
		<div id=paginate>
			<?php paginate('','show_result');?>
		</div>
	</div>
</div>
<div id="fh">返回</div>
<script>
	$(function(){
		$(".dt").click(function(){
			//alert($("#pageselect").val());
			if($("#pageselect").val()>1){
				var page = $("#pageselect").val();
			}else{
				var page = '';
			}
			//var page = ($("#pageselect").val()!=undefined)?$("#pageselect").val():'';
			$.post('show_map.php',{'id':$(this).parent().attr('id')},function(data){
				$("#show_result").html(data);
				$("#fh").css('display','inline');
				$("#fh").click(function(){
					$("#fh").css('display','none');
					if(page!=''){
						$("#show_result").load('show_drdnetstate.php?search='+encodeURI('<?php echo $title?>')+'&page='+page);
					}else{
						$("#show_result").load('show_drdnetstate.php?search='+encodeURI('<?php echo $title?>'));
					}
					$("#fh").unbind("click");
				})
			})
		})
		
		$(".xx").click(function(){
			//alert($("#pageselect").val());
			if($("#pageselect").val()>1){
				var page = $("#pageselect").val();
			}else{
				var page = '';
			}
			//var page = ($("#pageselect").val()!=undefined)?$("#pageselect").val():'';
			$.post('show_xx.php',{'id':$(this).parent().attr('id')},function(data){
				$("#show_result").html(data);
				$("#fh").css('display','inline');
				$("#fh").click(function(){
					$("#fh").css('display','none');
					if(page!=''){
						$("#show_result").load('show_drdnetstate.php?search=<?php echo $title?>&page='+page);
					}else{
						$("#show_result").load('show_drdnetstate.php?search=<?php echo $title?>');
					}
					$("#fh").unbind("click");
				})
			})
		})
	})
	
	$(document).unload(function(){
		//window.location.reload();
	});
	</script>