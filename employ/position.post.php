<?php
    require_once('../frame.php');
	$id = $_POST['id'];
	
	//var_dump($_POST);
	
	$position = new table_class('hoau_position');
	if($id!=''){
		$position->find($id);
	}
	$position->name = $_POST['post']['name'];
	$position->priority = $_POST['post']['priority'];
	$position->jieshao = $_POST['post']['jieshao'];
	$position->jieshao = format_mssql($position->jieshao);
	$position->save();
	
	redirect($_POST['url']);
?>