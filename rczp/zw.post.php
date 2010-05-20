<?php
    require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
	if(empty($_FILES)){
		alert('上传文件太大，上传失败！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	
	if($_FILES['zw']['size']>'1000000'||$_FILES['zw']['error']==1){
		alert('上传文件太大，上传失败！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}

	
	$employ = new table_class('hoau_employ');
	$employ->city_id = $_POST['city_id'];
	$employ->position_id = $_POST['position_id'];
	$employ->is_read = 0;
	
	$upload = new upload_file_class();
	if($_FILES['zw']['name']!=''){
		$upload->save_dir = "/upload/employ/";
		$em = $upload->handle('zw','filter_jl');
		if($em === false){
			alert('上传失败 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$employ->url = "/upload/employ/" .$em;
	}
	$employ->date = date("Y-m-d H:i:s");
	$employ->save();
	alert('上传成功！');
	redirect($_SERVER['HTTP_REFERER']);
?>
</html>