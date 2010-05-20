<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
</head>
<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'1');
	$id = $_POST['id'];
	$news = new table_class('hoau_news');
	
	if(strlen($_POST['news']['title'])>400){
		alert('标题可能来自WORD，带格式导致标题太长，请手动输入');
		redirect($_SERVER['HTTP_REFERER']);
	}
	if($id!=''){
		$news->find($id);
	}else{
		$news->created_at = date("Y-m-d H:i:s");
		$news->click_count = 0;
	}
	$news->is_adopt = 1;
	$news->update_attributes($_POST['news'],false);
	if($_POST['news']['priority']==''){
		$news->priority=100;
	}
	if($_POST['news']['guoqi']==''){
		$news->guoqi = '';
	}
	$news->news_content = format_mssql($news->news_content);
	if($_FILES['image']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/news/";
		$img = $upload->handle('image','filter_pic');
		
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$news->slt_src = "/upload/news/" .$img;
	}
	$news->save();
	if($id==''){
		alert('发布成功！');
	}
	redirect($_POST['url']);
?>
</html>