<?php
	require_once('../frame.php');
	
	//var_dump($_POST);
	$id = $_POST['id'];
	$news = new table_class('hoau_email');
	
	if($id!=''){
		$news->find($id);
	}else{
		$news->created_at = date("Y-m-d H:i:s");
	}
	$news->is_adopt = 1;
	$news->update_attributes($_POST['email'],false);
	//$news->connent = str_replace("'",'\"',$news->connent);
	$news->connent = str_replace('\"','"',$news->connent);
	$pos = strpos(strtolower($news->connent), '<img ');
	if($pos !== false){
		$pos_end = strpos(strtolower($news->connent), '>',$pos);
		$imgstr = substr($news->content, $pos,$pos_end -$pos +1);
		#alert($pos_end .';'.$imgstr);
		$imgstr = str_replace('\"', '"', $imgstr);
		$pos = strpos($imgstr, 'src="');
		$pos_end = strpos($imgstr, '"',$pos + 5);
		$src = substr($imgstr, $pos+5,$pos_end - $pos - 5);
		//$news->photo_src = $src;
	}else{
		//$news->is_photo_news = 0;
		//$news->photo_src = "";
	}
	$news->save();
	
	redirect("/email/email.php");
?>