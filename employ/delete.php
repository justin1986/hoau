<?php
	require "../frame.php";
	$db = get_db();
	
	
	if($_POST['delete_employ']){
		$delete_employ_id  = implode(',',$_POST['delete_employ']);
		$sql = 'delete from hoau_employ where id in(' .$delete_employ_id .')';
		$db->execute($sql);
	}
	
	
	
?>