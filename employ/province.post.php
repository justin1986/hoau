<?php
    require_once('../frame.php');
	
	$province = new table_class('hoau_province');
	$id = $_REQUEST['id'];
	if(!empty($id)){
		$province->find($id);
	}else{
		$db = get_db();
		$sql = "select * from hoau_province where name='".$_POST['post']['name']."' and id!=".$_POST['post']['parent_id'];
		$record = $db->query($sql);
		if(count($record)>0){
			alert('你所添加的城市或省份已存在！请重新填写！');
			redirect($_SERVER['HTTP_REFERER']);
			exit();
		}
	}
	$province->update_attributes($_POST['post'],false);
	if($_POST['post']['priority']==''){
		$province->priority = 100;
	}
	$province->save();
	redirect($_POST['url']);
?>