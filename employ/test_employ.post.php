<?php
   require_once "../frame.php";
   
   var_dump($_POST);
   $upload = new upload_file_class();
   $employ = new table_class("hoau_employ");
   if($_FILES['url']['name']!=''){
		$upload->save_dir = "/upload/employ/";
		$em = $upload->handle('url');
		if($em === false){
			alert('上传失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$employ->url = "/upload/employ/" .$em;
	}
	$employ->id_read =0;
	$employ->date = date("Y-m-d H:i:s");
	$employ->update_attributes($_POST['post']);
	redirect($_POST['url']);
?>