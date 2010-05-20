<?php
require_once('../frame.php');
rights($_SESSION["hoaurights"],'5');

$id = $_REQUEST['id'];
$employ = new table_class('hoau_employ');
$employ->find($id);
if($employ->url==''||$employ->url=='/upload/employ/'){
	alert('no files to download');
	redirect($_SERVER['HTTP_REFERER']);
	die();
}
$file_dir = ROOT_DIR.'upload/employ/';
$file_name = basename($employ->url);


    $file = fopen($file_dir . $file_name,"r"); //打开文件 


//输入文件标签 

Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".filesize($file_dir . $file_name)); 

Header("Content-Disposition: attachment; filename=" . $file_name); 

//输出文件内容 

echo fread($file,filesize($file_dir . $file_name)); 

fclose($file); 

?>