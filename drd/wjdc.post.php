<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
    require_once('../frame.php');
	
	
	$record = new table_class('hoau_question_record');
	$record->problem_id = $_POST['p_id'];
	$record->created_at = date("Y-m-d H:i:s");
	$record->save();
	
	for($i=0;$i<count($_POST['id']);$i++){
		$info = new table_class('hoau_question_record_info');
		$info->record_id = $record->id;
		$info->question_id = $_POST['id'][$i];
		$info->item_id = $_POST['item'.$i];
		$info->save();
	}
	alert('谢谢您的参与');
	redirect('drd5.php');
?>
</html>