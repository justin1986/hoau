<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'3');
	//var_dump($_POST);
	$id = $_POST['id'];
	$price = new table_class('hoau_drd_price');
	
	if($id!=''){
		$price->find($id);
	}
	
	$pid = province_update('hoau_drd_price','0',$_POST['drd']['startprovince']);
	province_update('hoau_drd_price','1',$_POST['drd']['startcity'],$pid);
	$pid =  province_update('hoau_drd_price','0',$_POST['drd']['endprovince']);
	province_update('hoau_drd_price','1',$_POST['drd']['endcity'],$pid);
	
	$price->update_attributes($_POST['drd']);
	
	redirect($_POST['url']);
?>