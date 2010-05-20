<?php
    require_once('../frame.php');
	
	$post = new table_class($_POST['db_table']);
	if($_POST['id']!=''){
		$post -> find($_POST['id']);
		if($post->username!=$_POST['post']['username']){
			$db = get_db();
			$record = $db->query("select * from hoau_user where username='".$_POST['post']['username']."'");
			if(count($record)==0){
				$post -> update_attributes($_POST['post']);
				redirect($_POST['url']);
			}else{
				alert("您注册的用户名已经存在，请重新注册！");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			if($_POST['post']['password']!='000000'){
				$post -> update_attributes($_POST['post'],false);
				$post->password = md5($post->password);
				$post->save();
			}
			redirect($_POST['url']);
		}
	}else{
		$db = get_db();
		$record = $db->query("select * from hoau_user where username='".$_POST['post']['username']."'");
		if(count($record)==0){
			$post -> update_attributes($_POST['post'],false);
			$post->password = md5($post->password);
			$post->save();
			redirect($_POST['url']);
		}else{
			alert("您注册的用户名已经存在，请重新注册！");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
?>