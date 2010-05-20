<?php
	require_once('../frame.php');
	function StrChar($str)
	{	
		$str=str_replace(Chr(13).Chr(10),Chr(10),$str);
		return $str;
	}
	$title = $_GET['key'];
	$status = $_GET['status'];
	$db = get_db();
	$sql = 'select * from hoau_comment where 1=1';
	if($_GET['start']!=''){
		$sql .= " and time>'{$_GET['start']} 00:00:00'";
	}
	if($_GET['end']!=''){
		$sql .= " and time<'{$_GET['end']} 23:59:59'";
	}
	if($title!=''){
		$sql = $sql." and (name like '%{$title}%' or topic like '%{$title}%' or email like '%{$title}%' or tel like '%{$title}%' or message like '%{$title}%' or reply like '%{$title}%')";
	}
	if($status!=''){
		$sql = $sql." and status=".$status;
	}
	$sql .= " order by time desc";
	$record=$db -> query($sql);
	//echo count($record);
	$str2 = "id,题目,运单号,姓名,电话,电子邮件,留言内容,留言时间,回复内容,回复时间,处理类型,审核情况,IP\n";
	for($i=0;$i<count($record);$i++){
		$str = str_replace(',','，',$record[$i]->id).",";
		$str .= str_replace(',','，',$record[$i]->topic).",";
		$str .= str_replace(',','，',$record[$i]->wbnum).",";
		$str .= str_replace(',','，',$record[$i]->name).",";
		$str .= str_replace(',','，',$record[$i]->tel).",";
		$str .= str_replace(',','，',$record[$i]->email).",";
		$str .= str_replace(',','，',$record[$i]->message).",";
		if($record[$i]->time!=''){
			$str .= str_replace(',','，',date_format($record[$i]->time,"Y-m-d")).",";
		}else{
			$str .= ",";
		}
		$str .= str_replace(',','，',$record[$i]->reply).",";
		if($record[$i]->replytime!=''){
			$str .= str_replace(',','，',date_format($record[$i]->replytime,"Y-m-d")).",";
		}else{
			$str .= ",";
		}
		if($record[$i]->status==1){
			$status = "未处理";
		}elseif($record[$i]->status==2){
			$status = "已处理";
		}else{
			$status = "处理中";
		}
		$str .= $status.",";;
		if($record[$i]->is_adopt==1){
			$adopt = "已通过审核";
		}elseif($record[$i]->is_adopt==0){
			$adopt = "未通过审核";
		}else{
			$adopt = "仅管理员可见";
		}
		$str .= $adopt.",";;
		$str .= $record[$i]->ip;
		
		$str = str_replace("\n",'',$str);
		$str = str_replace("\t",'',$str);
		$str = str_replace("\r",'',$str);
		$str2 .= $str;
		$str2 .= "\n";
	}
	$str2 = iconv("UTF-8","GB2312//IGNORE",$str2);
	
	Header("Content-type: application/octet-stream"); 

	Header("Accept-Ranges: bytes"); 
	
	Header("Accept-Length: ".strlen($str2)); 
	
	Header("Content-Disposition: attachment; filename=order1_".date('YmdHis').".csv"); 
	echo $str2;
?>
