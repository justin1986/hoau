<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
</head>
<?php
    require_once('../frame.php');
	rights($_SESSION["hoaurights"],'3');
	$db = get_db();
	$sql = "select * from hoau_province2";
	$province = $db->query($sql);
	for($k=0;$k<count($province);$k++){
		$sql = "select t2.CITYNAME,t1.CS from hoau_yywd t1 join hoau_new_city t2 on t1.CS=t2.CITYID where (t1.SF ='".$province[$k]->name."') group by t2.CITYNAME,t1.CS";
		$city = $db->query($sql);
		$sql = "select QYMC,ZS,DH,id,CS,FDDBR,SFTGDRDFW,SF from hoau_yywd where SF='".$province[$k]->name."'";
		$record = $db->query($sql);
		$fcontent = '<?xml version="1.0" encoding="utf-8" ?><dataroot><news>';
		for($i=0;$i<count($city);$i++){
			$fcontent = $fcontent."<new><title>".$city[$i]->CITYNAME."</title><wangdians>";
			for($j=0;$j<count($record);$j++){
				if($record[$j]->CS==$city[$i]->CS){
					if($record[$j]->SFTGDRDFW==1){
						$contactor = "定日达，整车，零担";
					}else{
						$contactor = "整车，零担";
					}
					if($record[$j]->QYMC==''){
						$fcontent = $fcontent."<wangdian><title>未命名</title>";
					}else{
						$fcontent = $fcontent."<wangdian><title>".$record[$j]->QYMC."</title>";
					}
					
					$fcontent = $fcontent."<address>地址：".$record[$j]->ZS."</address>";
					$fcontent = $fcontent."<phone>电话：".$record[$j]->DH."</phone>";
					$fcontent = $fcontent."<contactor>业务范围：".$contactor."</contactor>";
					$fcontent = $fcontent."<link>".$record[$j]->id."</link></wangdian>";
				}
			}
			$fcontent = $fcontent."</wangdians></new>";
		}
		$fcontent = $fcontent."</news></dataroot>";
		$filename = '../khfw/'.$province[$k]->pinyin.'.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	echo "静态成功";
?>
</html>