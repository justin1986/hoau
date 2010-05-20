<?php
    require_once('../frame.php');
	rights($_SESSION["hoaurights"],'3');
	$db = get_db();
	$sql = "select * from hoau_province2";
	$province = $db->query($sql);
	for($k=0;$k<count($province);$k++){
		$sql = "SELECT city FROM hoau_drdnetstate WHERE (province = '".$province[$k]->name."') GROUP BY city";
		$city = $db->query($sql);
		$sql = "select name,address,tel,fax,teregioncode,id,city,contactor from hoau_drdnetstate where province='".$province[$k]->name."'";
		$record = $db->query($sql);
		$fcontent = '<?xml version="1.0" encoding="utf-8" ?><dataroot><news>';
		for($i=0;$i<count($city);$i++){
			$fcontent = $fcontent."<new><title>".$city[$i]->city."</title><wangdians>";
			for($j=0;$j<count($record);$j++){
				if($record[$j]->city==$city[$i]->city){
					$phone = ($record[$j]->tel!='')?$record[$j]->teregioncode."-".$record[$j]->tel:"暂无";
					$fax = ($record[$j]->fax!='')?$record[$j]->teregioncode."-".$record[$j]->fax:"暂无";
					$fcontent = $fcontent."<wangdian><title>".$record[$j]->name."</title>";
					$fcontent = $fcontent."<address>地址：".$record[$j]->address."</address>";
					$fcontent = $fcontent."<phone>电话：".$phone."　传真：".$fax."</phone>";
					$fcontent = $fcontent."<contactor>联系人：".$record[$j]->contactor."</contactor>";
					$fcontent = $fcontent."<link>".$record[$j]->id."</link></wangdian>";
				}
			}
			$fcontent = $fcontent."</wangdians></new>";
		}
		$fcontent = $fcontent."</news></dataroot>";
		$filename = '../drd/'.$province[$k]->pinyin.'.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	echo "静态成功";
?>