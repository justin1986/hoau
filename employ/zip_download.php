<?php
	require_once('../../frame.php');
	$province = $_REQUEST['province'];
	$city = $_REQUEST['city'];
	$position = $_REQUEST['position'];
	$date = $_REQUEST['date'];
	$read = $_REQUEST['read'];
	
	$db = get_db();
	$sql = "select t1.*,t2.name as p_name,t3.CityName as c_name from hoau_employ t1 join hoau_position t2 on t1.position_id=t2.id join S_City t3 on t1.city_id=t3.CityID where 1=1";
	if($city!=''){
		$sql = $sql." and city_id=".$city;
	}
	if($province!=''){
		$sql = $sql." and t3.ProvinceID=".$province;
	}
	if($position!=''){
		$sql = $sql." and position_id=".$position;
	}
	if($date!=''){
		$sql = $sql." and date>'".$date." 00:00:00' and date<'".$date." 23:59:59'";
	}
	if($read!=''){
		$sql = $sql." and is_read=".$read;
	}
	$sql = $sql." order by t1.date desc";
	$record = $db->query($sql);
	
	if(count($record)>15){
		//echo "error";
		//die();
	}
	
	$f_name = time().'.zip';
	$zip = new ZipArchive();
	$opened = $zip->open($f_name,ZIPARCHIVE::OVERWRITE );
    if( $opened !== true ){
        $zip->open($f_name,ZIPARCHIVE::CREATE);
    }
	for($i=0;$i<count($record);$i++){
		//echo substr($record[$i]->url,15);
		//$zip->addFile(substr($record[$i]->url,15),$record[$i]->position_id.substr($record[$i]->url,strpos($record[$i]->url,'.')));
		if(file_exists($record[$i]->url)){
			$zip->addFile($record[$i]->url);
		}
	}
	$zip->close();
	echo $f_name;
?>