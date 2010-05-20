<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
	require_once "../frame.php";
	rights($_SESSION["hoaurights"],'2');
	
	
	if(empty($_POST)){
		alert('上传文件太大，不能上传！');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	
	
	
	$upload = new upload_file_class();
	if($_POST['id']!=''){
		if($_FILES['information']['size']>5000000){	
			alert('上传文件太大，不能上传！');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		
		$information = new table_class("hoau_information");
		$information->find($_POST['id']);
		if($_FILES['information']['name']!=''){
			$upload->save_dir = "/upload/information/";
			$vid = $upload->handle('information');
			if($vid === false){
				alert('上传资料失败 !');
				redirect($_SERVER['HTTP_REFERER']);
				die();
			}
			$information->url = "/upload/information/" .$vid;
		}
		$information->created_at = date("Y-m-d H:i:s");
		$information->is_adopt = 1;
		$information->update_attributes($_POST['post']);
	}else{
		for($i=0;$i<count($_FILES['information']['size']);$i++){
			if($_FILES['information']['size'][$i]>5000000){	
				alert('上传文件太大，不能上传！');
				redirect($_SERVER['HTTP_REFERER']);
				die();
			}
		}
		
		if($_FILES['information']['name']!=''){
			$upload->save_dir = "/upload/information/";
			$vid = $upload->handle('information');
		}
		for($i=0;$i<count($_POST['post']['name']);$i++){
			if($_POST['post']['name'][$i]!=''){
				$information = new table_class("hoau_information");
				if($vid[$i]['result'] === false){
					alert('上传资料'.($i+1).'失败!');
					redirect($_SERVER['HTTP_REFERER']);
					die();
				}
				$information->url = "/upload/information/" .$vid[$i]['name'];
				$information->created_at = date("Y-m-d H:i:s");
				$information->is_adopt = 1;
				$information->name = $_POST['post']['name'][$i];
				$information->save();
			}
		}
	}

	
	redirect('information.php');
	
	
?>
</html>