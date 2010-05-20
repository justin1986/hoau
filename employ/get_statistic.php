<?php
    require_once('../frame.php');
	
	$city = $_POST['city'];
	$position = $_POST['position'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$province = $_POST['province'];
	rights($_SESSION["hoaurights"],'5');
	
	$db = get_db();
	$sql = 'select t1.id from hoau_employ t1 join S_City t2 on t1.city_id=t2.CityID where 1=1';
	if($province!==''){
		$sql = $sql." and t2.ProvinceID=".$province;
	}
	if($city!==''){
		$sql = $sql." and t1.city_id=".$city;
	}
	if($position!==''){
		$sql = $sql." and t1.position_id=".$position;
	}
	if($start!==''){
		$sql = $sql." and t1.date>'".$start." 00:00:00'";
	}
	if($end!==''){
		$sql = $sql." and t1.date<'".$end." 23:59:59'";
	}
	$record = $db->query($sql);
	echo count($record)
?>