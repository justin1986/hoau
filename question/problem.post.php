<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
</head>
<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'7');
	$problem = new table_class('hoau_problem');
	$id = $_POST['id'];
	
	
	if(!empty($_POST['id'])){
		$problem->find($_POST['id']);
	}else{
		$problem->create_time = date("Y-m-d H:i:s");
		$problem->click_count = 0;
		$problem->is_adopt = 1;
	}
	$problem->update_attributes($_POST['post']);
	
	redirect($_POST['url']);
?>
</html>