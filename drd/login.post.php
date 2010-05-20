<?php
	session_start();
    require_once('../frame.php');
	require_once('../inc/oracle_data_handler.php');
	$yhm = $_POST['yhm'];
	$mm = $_POST['mm'];
	if($yhm==''||$mm==''){
		echo "false";
	}
	//$kh = kh_login($yhm,$mm);
	if($kh){
		$_SESSION["dkh"] = $kh[SFNRDKHGL][0];
		$_SESSION["kh_role"] = 'qykh';
		echo "ok";
	}else{
		$db = get_db();
		$record = $db->query("select * from hoau_dkh where userName='{$yhm}' and password='".md5($mm)."'");
		if(count($record)==1){
			$_SESSION["dkh"] = $yhm;
			$_SESSION["kh_role"] = 'dkh';
			echo "ok";
		}else{
			echo "false";
		}
	}
?>