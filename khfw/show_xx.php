<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$drd = new table_class('hoau_yywd');
	$drd->find($id);
	$db = get_db();
	$city = $db->query("select * from hoau_new_city where CITYID=".$drd->CS);
	$province = $db->query("select * from hoau_new_province where PID=".$drd->SF);
	css_include_tag('drd/show_xx');
?>
<div class="line">
	<div class="name">名称：</div>
	<div class="context"><?php echo $drd->QYMC;?></div>
</div>
<div class="line">
	<div class="name">网点名：</div>
	<div class="context"><?php echo $drd->GSJC;?></div>
</div>
<div class="line">
	<div class="name">地址：</div>
	<div class="context"><?php echo $drd->ZS;?></div>
</div>
<div class="line">
	<div class="name">电话：</div>
	<div class="context"><?php echo $drd->DH;?></div>
</div>
<div class="line">
	<div class="name">传真：</div>
	<div class="context"><?php echo $drd->CZ;?></div>
</div>
<div class="line">
	<div class="name">省市：</div>
	<div class="context"><?php echo $city[0]->CITYNAME.'-'.$province[0]->PMC;?></div>
</div>
<div class="line">
	<div class="name">定日达：</div>
	<div class="context"><?php if($drd->SFTGDRDFW==1){echo "是";}else{echo "否";};?></div>
</div>


