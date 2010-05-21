<?php
	require_once "../frame.php";
	@header('Content-type: text/html;charset=UTF-8');
	rights($_SESSION["hoaurights"],'8');
	
	$video = new table_class("hoau_video");
	$id = intval($_POST['id']);
	if($id!=0){
		$video->find($id);
	}else{
		$video->is_adopt=0;
		$video->created_at = now();
		$video->click_count = 0;
		$video->priority = 100;
	}
	$upload = new upload_file_class();
	if($_FILES['image']['name']!=null){
		if($_FILES['image']['size']>2000000){
			alert('上传的图片太大 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$upload->save_dir = "/upload/images/";
		$img = $upload->handle('image','filter_pic');
		if($img === false){
			alert('上传图片失败 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$video->photo_url = "/upload/images/" .$img;
	}
	if($_FILES['video']['name']!=null){
		if($_FILES['video']['size']>20000000){
			alert('上传的视频太大 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$upload->save_dir = "/upload/video/";
		$vid = $upload->handle('video','filter_video');
		if($vid === false){
			alert('上传视频失败 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$video->video_url = "/upload/video/" .$vid;
	}
	if($video->update_attributes($_POST['video'])){
		redirect($_POST['url']);
	}
?>