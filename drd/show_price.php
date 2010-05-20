<div id="box">
<?php 
	require_once('../frame.php');
	$start_province = $_REQUEST['start_province'];
	$end_province = $_REQUEST['end_province'];
	$start_city = $_REQUEST['start_city'];
	$end_city = $_REQUEST['end_city'];
	$db = get_db();
	$sql = "select * from hoau_drd_price where 1=1";
	$url = 'show_price.php?';
	if($start_province!=''){
		$sql = $sql." and startprovince='{$start_province}'";
		$url = $url."&start_province=".urlencode($start_province);
	}
	if($end_province!=''){
		$sql = $sql." and endprovince='{$end_province}'";
		$url = $url."&end_province=".urlencode($end_province);
	}
	if($start_city!=''){
		$sql = $sql." and startcity='{$start_city}'";
		$url = $url."&start_city=".urlencode($start_city);
	}
	if($end_city!=''){
		$sql = $sql." and endcity='{$end_city}'";
		$url = $url."&end_city=".urlencode($end_city);
	}
	$sql = $sql." order by id asc";
	$record = $db->paginate($sql,9);
	$count = count($record);
	//echo $sql;
	for($i=0;$i<$count;$i++){
?>
<div class="line" <?php if($i==8){echo "style='border:0'";}?>>
	<div class="line1"><?php echo $record[$i]->startcity;?>-<?php echo $record[$i]->endcity;?></div>
	<div class="line2"><?php echo $record[$i]->timeinterval;?></div>
	<div class="line3">第<?php echo $record[$i]->pickday;?>日<?php echo ($record[$i]->pickampm=='1')?'上午':'下午'?></div>
	<div class="line4"><?php echo $record[$i]->initialprice;?></div>
	<div class="line5"><?php echo $record[$i]->heavyprice;?></div>
	<div class="line6"><?php echo $record[$i]->lightprice;?></div>
</div>
<?php
} ?>
</div>
<div id=paginate><?php paginate($url,'main');?></div>





















