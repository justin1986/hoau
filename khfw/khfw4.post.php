<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
    require_once('../frame.php');
	
	$comment = new table_class('hoau_comment');
	$comment->update_attributes($_POST['post'],false);
	$comment->status = 1;
	$comment->time = date("Y-m-d H:i:s");
	$comment->save();
	
	alert("留言提交成功！请等待回复。");
	redirect($_SERVER['HTTP_REFERER']);
?>
</html>