<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'3');
	//var_dump($_POST);
	$id = $_POST['id'];
	$config = new table_class('hoau_yd_config');
	$config->find($id);

	if($_POST['hwxx']!=''){
		$hwxx = '1';
	}else{
		$hwxx = '0';
	}
	
	if($_POST['thwd']!=''){
		$thwd = '1';
	}else{
		$thwd = '0';
	}
	
	if($_POST['ydzz']!=''){
		$ydzz = '1';
	}else{
		$ydzz = '0';
	}
	
	
	$config->rights = $hwxx.$thwd.$ydzz;
	$config->save();
		
	
	redirect($_POST['url']);
?>