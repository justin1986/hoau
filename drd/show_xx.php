<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$drd = new table_class('hoau_drdnetstate');
	$drd->find($id);
	css_include_tag('drd/show_xx');
?>
<div class="line">
	<div class="name">网点名：</div>
	<div class="context"><?php echo $drd->netstateid;?></div>
</div>
<div class="line">
	<div class="name">名称：</div>
	<div class="context"><?php echo $drd->name;?></div>
</div>
<div class="line">
	<div class="name">地址：</div>
	<div class="context"><?php echo $drd->address;?></div>
</div>
<div class="line">
	<div class="name">电话：</div>
	<div class="context"><?php echo ($drd->tel!='')?$drd->teregioncode.'-'.$drd->tel:'暂无';?></div>
</div>
<div class="line">
	<div class="name">传真：</div>
	<div class="context"><?php echo ($drd->fax!='')?$drd->teregioncode.'-'.$drd->fax:'暂无';?></div>
</div>
<div class="line">
	<div class="name">省市：</div>
	<div class="context"><?php echo $drd->province.'-'.$drd->city.(($drd->region!='')?'-'.$drd->region:'');?></div>
</div>
<div class="line">
	<div class="name">地区：</div>
	<div class="context"><?php echo $drd->area;?></div>
</div>


