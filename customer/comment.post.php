<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
	require_once "../frame.php";
	rights($_SESSION["hoaurights"],'2');
	
	$id = intval($_POST['id']);
	$comment = new table_class('hoau_comment');
	$comment->find($id);
	if($comment->replytime==''||date_format($comment->replytime,"Y-m-d")=='1900-01-01'){
		$comment->replytime = now();
	}
	$comment->update_attributes($_POST['post']);
	
	redirect($_POST['url']);
	
	
?>
</html>