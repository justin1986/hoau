<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
</head>
<?php
    require_once('../frame.php');
	
	$db = get_db();
	
	$price = $db->query("select * from hoau_drd_price");
	$count = count($price);
	
	for($i=0;$i<$count;$i++){
		$pid = province_update('hoau_drd_price','0',$price[$i]->startprovince);
		province_update('hoau_drd_price','1',$price[$i]->startcity,$pid);
		$pid =  province_update('hoau_drd_price','0',$price[$i]->endprovince);
		province_update('hoau_drd_price','1',$price[$i]->endcity,$pid);
	}
	echo "成功";
?>
<a href="drd_price.php">返回</a>