<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
</head>
<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'3');
	$dkh = new table_class('hoau_dkh');
	$id = $_POST['id'];
	
	
	if(!empty($_POST['id'])){
		$dkh->find($_POST['id']);
	}
	
	$dkh->update_attributes($_POST['post'],false);
	if($_POST['password']!='000000'){
		$dkh->password = md5($_POST['password']);
	}
	$dkh->save();
	redirect($_POST['url']);
?>
</html>