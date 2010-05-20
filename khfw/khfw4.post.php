<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
    require_once('../frame.php');
	if($_POST['yz']!=$_SESSION['comment']||empty($_SESSION['comment'])){
		alert('验证码错误！请重新输入！');
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['topic'])>150||empty($_POST['post']['topic'])){
		alert("标题太长！");
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['wbnum'])>8){
		alert("运单号！");
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['name'])>30||empty($_POST['post']['name'])){
		alert("姓名太长！");
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['tel'])>50||empty($_POST['post']['tel'])){
		alert("电话太长！");
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['email'])>50||empty($_POST['post']['email'])){
		alert("太长邮箱！");
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['type'])>5||empty($_POST['post']['type'])){
		alert("类型太长！");
		redirect('khfw2.php');
		die();
	}
	if(strlen($_POST['post']['message'])>1500||empty($_POST['post']['message'])){
		alert("留言内容太长！");
		redirect('khfw2.php');
		die();
	}
	
	$comment = new table_class('hoau_comment');
	$comment->update_attributes($_POST['post'],false);
	$comment->status = 1;
	if(isset($_POST['admin'])){
		$comment->is_adopt=2;
	}else{
		$comment->is_adopt=0;
	}
	$comment->ip = $_SERVER["REMOTE_ADDR"];
	$comment->time = date("Y-m-d H:i:s");
	$comment->save();
	
	alert("留言提交成功！请等待回复。");
	redirect('khfw2.php');
?>
</html>