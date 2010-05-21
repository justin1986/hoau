<?php require_once('../frame.php');
require_once 'reader.php';
@header('Content-type: text/html;charset=UTF-8');
rights($_SESSION["hoaurights"],'6');
if(empty($_FILES)){
	alert('上传文件太大！请重新上传');
	redirect($_SERVER['HTTP_REFERER']);
	die();
}

	if($_FILES['yywd']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/xls/";
		$xls = $upload->handle('yywd');
		$file = "D:/www.hoau.net/newsite/website/upload/xls/" .$xls;
		
		$data = new Spreadsheet_Excel_Reader();
	    $data->setOutputEncoding('utf-8');
	    $data->read($file);
		$db = get_db();
		if($data->sheets[0]['cells'][1][15]!='JD'){
			alert('传入的网点表有误，请审核后传入!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$db->execute("delete from hoau_yywd");
	    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
	    	$yywd = new table_class('hoau_yywd');
			//$yywd->echo_sql = true;
			$yywd->QYBH = $data->sheets[0]['cells'][$i][1];
			$yywd->GSBH = $data->sheets[0]['cells'][$i][2];
			$yywd->SJGSBH = $data->sheets[0]['cells'][$i][3];
			$yywd->GSJC = $data->sheets[0]['cells'][$i][4];
			$yywd->GSLX = $data->sheets[0]['cells'][$i][5];
			$yywd->QYMC = $data->sheets[0]['cells'][$i][6];
			$yywd->MCHZBH = $data->sheets[0]['cells'][$i][7];
			$yywd->FDDBR = $data->sheets[0]['cells'][$i][8];
			$yywd->JYFW = $data->sheets[0]['cells'][$i][9];
			$yywd->QYLX = $data->sheets[0]['cells'][$i][10];
			$yywd->ZZFBS = $data->sheets[0]['cells'][$i][11];
			$yywd->JYFS = $data->sheets[0]['cells'][$i][12];
			$yywd->JYQX = $data->sheets[0]['cells'][$i][13];
			$yywd->QH = $data->sheets[0]['cells'][$i][14];
			$yywd->JD = $data->sheets[0]['cells'][$i][15];
			$yywd->ZS = $data->sheets[0]['cells'][$i][16];
			$yywd->DH = $data->sheets[0]['cells'][$i][17];
			$yywd->CZ = $data->sheets[0]['cells'][$i][18];
			$yywd->YB = $data->sheets[0]['cells'][$i][19];
			$yywd->ZCZB = $data->sheets[0]['cells'][$i][20];
			$yywd->YZDW = $data->sheets[0]['cells'][$i][21];
			$yywd->SFXNGS = $data->sheets[0]['cells'][$i][22];
			$yywd->SSYJGS = $data->sheets[0]['cells'][$i][23];
			$yywd->BZ = $data->sheets[0]['cells'][$i][24];
			$yywd->SFYX = $data->sheets[0]['cells'][$i][25];
			$yywd->SFSK = $data->sheets[0]['cells'][$i][26];
			$yywd->GZDM = $data->sheets[0]['cells'][$i][27];
			$yywd->KZDM = $data->sheets[0]['cells'][$i][28];
			$yywd->SF = $data->sheets[0]['cells'][$i][29];
			$yywd->CS = $data->sheets[0]['cells'][$i][30];
			$yywd->JLBS = $data->sheets[0]['cells'][$i][31];
			$yywd->SFTGDRDFW = $data->sheets[0]['cells'][$i][32];
			$yywd->is_new = 0;
			$yywd->save();
	  	}
		
	}
	if($_FILES['city']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/xls/";
		$xls = $upload->handle('city');
		$file = "D:/www.hoau.net/newsite/website/upload/xls/" .$xls;
		
		$data = new Spreadsheet_Excel_Reader();
	    $data->setOutputEncoding('utf-8');
	    $data->read($file);
		$db = get_db();
		if($data->sheets[0]['cells'][1][1]!='CITYID'){
			alert('传入的城市表有误，请审核后传入!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$db->execute("delete from hoau_new_city");
	    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
	    	$city = new table_class('hoau_new_city');
			//$city->echo_sql = true;
			$city->CITYID = $data->sheets[0]['cells'][$i][1];
			$city->PID = $data->sheets[0]['cells'][$i][2];
			$city->CITYNAME = $data->sheets[0]['cells'][$i][3];
			$city->save();
		}
	}
	if($_FILES['province']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/xls/";
		$xls = $upload->handle('province');
		$file = "D:/www.hoau.net/newsite/website/upload/xls/" .$xls;
		
		$data = new Spreadsheet_Excel_Reader();
	    $data->setOutputEncoding('utf-8');
	    $data->read($file);
		$db = get_db();
		if($data->sheets[0]['cells'][1][1]!='PID'){
			alert('传入的省份表有误，请审核后传入!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$db->execute("delete from hoau_new_province");
	    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
	    	$city = new table_class('hoau_new_province');
			//$city->echo_sql = true;
			$city->PID = $data->sheets[0]['cells'][$i][1];
			$city->PMC = $data->sheets[0]['cells'][$i][2];
			$city->save();
		}
	}
	if($_FILES['price']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/xls/";
		$xls = $upload->handle('price');
		$file = "D:/www.hoau.net/newsite/website/upload/xls/" .$xls;
		$data = new Spreadsheet_Excel_Reader();
	    $data->setOutputEncoding('utf-8');
	    $data->read($file);
		$db = get_db();
	}
	#alert('上传成功！');
	#redirect($_SERVER['HTTP_REFERER']);
	/*
	$data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->read('1.xls');
	$db = get_db();
	$db->execute("delete from hoau_yywd");
    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
    	$yywd = new table_class('hoau_yywd');
		$yywd->echo_sql = true;
		$yywd->QYBH = $data->sheets[0]['cells'][$i][1];
		$yywd->GSBH = $data->sheets[0]['cells'][$i][2];
		$yywd->SJGSBH = $data->sheets[0]['cells'][$i][3];
		$yywd->GSJC = $data->sheets[0]['cells'][$i][4];
		$yywd->GSLX = $data->sheets[0]['cells'][$i][5];
		$yywd->QYMC = $data->sheets[0]['cells'][$i][6];
		$yywd->MCHZBH = $data->sheets[0]['cells'][$i][7];
		$yywd->FDDBR = $data->sheets[0]['cells'][$i][8];
		$yywd->JYFW = $data->sheets[0]['cells'][$i][9];
		$yywd->QYLX = $data->sheets[0]['cells'][$i][10];
		$yywd->ZZFBS = $data->sheets[0]['cells'][$i][11];
		$yywd->JYFS = $data->sheets[0]['cells'][$i][12];
		$yywd->JYQX = $data->sheets[0]['cells'][$i][13];
		$yywd->QH = $data->sheets[0]['cells'][$i][14];
		$yywd->JD = $data->sheets[0]['cells'][$i][15];
		$yywd->ZS = $data->sheets[0]['cells'][$i][16];
		$yywd->DH = $data->sheets[0]['cells'][$i][17];
		$yywd->CZ = $data->sheets[0]['cells'][$i][18];
		$yywd->YB = $data->sheets[0]['cells'][$i][19];
		$yywd->ZCZB = $data->sheets[0]['cells'][$i][20];
		$yywd->YZDW = $data->sheets[0]['cells'][$i][21];
		$yywd->SFXNGS = $data->sheets[0]['cells'][$i][22];
		$yywd->SSYJGS = $data->sheets[0]['cells'][$i][23];
		$yywd->BZ = $data->sheets[0]['cells'][$i][24];
		$yywd->SFYX = $data->sheets[0]['cells'][$i][25];
		$yywd->SFSK = $data->sheets[0]['cells'][$i][26];
		$yywd->GZDM = $data->sheets[0]['cells'][$i][27];
		$yywd->KZDM = $data->sheets[0]['cells'][$i][28];
		$yywd->SF = $data->sheets[0]['cells'][$i][29];
		$yywd->CS = $data->sheets[0]['cells'][$i][30];
		$yywd->JLBS = $data->sheets[0]['cells'][$i][31];
		$yywd->SFTGDRDFW = $data->sheets[0]['cells'][$i][32];
		$yywd->save();
  	}*/
 ?>
