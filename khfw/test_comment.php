<?php 
	require_once('../frame.php');
	$ydh = $_POST['ydh'];
	$s_d = date("Y-n-j")." 00:00:00";
	$e_d = date("Y-n-j")." 23:59:59";
	
	$db = get_db();
	$sql = "select id from hoau_comment where wbnum='$ydh' and time>'$s_d' and time<'$e_d'";
	$record = $db->query($sql);
	if(count($record)>0){
		echo "ok";
	}
?>