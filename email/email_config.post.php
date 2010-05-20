<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'4');
	//var_dump($_POST);
	$id = $_POST['id'];
	$mail_config = new table_class('hoau_mail_config');
	
	if($id!=''){
		$mail_config->find($id);
	}
	$mail_config->update_attributes($_POST['post']);
	
	redirect("/email/email.php");
?>