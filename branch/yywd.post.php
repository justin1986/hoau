<?php
    require_once('../frame.php');
	rights($_SESSION["hoaurights"],'3');
	$yywd = new table_class('hoau_yywd');
	$id = $_POST['id'];
	if($id!=''){
		$yywd->find($id);
	}
	$yywd->update_attributes($_POST['post'],false);
	
	$yywd->save();
	redirect($_POST['url']);
?>