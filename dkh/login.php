<?php
    require_once('../frame.php');
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	
	if(empty($name)||strlen($name)>20){
		echo 'wrong';
		die();
	}
	if(empty($password)||strlen($password)>20){
		echo 'wrong';
		die();
	}
	$password = md5($password);
	$db = get_db();
	$record = $db->query("select * from hoau_dkh where userName='$name' and password='$password'");
	if(count($record)){
		$_SESSION['dkh'] = $record[0]->companyId;
		$_SESSION['dkh_name'] = $record[0]->companyName;
		$_SESSION['dkh_date'] = now();
		$_SESSION['dkh_admin'] = $record[0]->isadmin;
?>
<tr>
	<td colspan="2" align="right" width="96%">
		<p align="left"><font size="2">登录公司: </font> </p>
	</td>
</tr>
<tr>
	<td colspan="2" style="height: 20px;" align="right">
		<p align="left"> <span id="currentCompany"><?php echo $record[0]->companyName;?><font color="#0000c0"></font></span></p>
	</td>
</tr>
<tr>
	<td colspan="2" align="left" width="96%"> <font size="2">登录时间:</font></td>
</tr>
<tr>
	<td colspan="2" align="right" width="96%">
		<p align="left"> <span id="loginTime"><font color="MediumBlue"><?php echo now();?></font></span>&nbsp;</p>
	</td>
</tr>
<tr>
	<td colspan="2" align="right" height="30" width="96%">
		<p align="left"> <font color="#ff0000" size="2">请选择查询方式</font></p>
	</td>
</tr>
<tr>
	<td colspan="2" align="left" width="27%">&nbsp;&nbsp; <span>
		<input id="RadioButton2" name="xz" value="RadioButton2" type="radio">
		<label for="RadioButton2">按订单号查询</label>
		</span></td>
</tr>
<tr>
	<td colspan="2" align="left" width="27%">&nbsp;&nbsp; <span>
		<input id="RadioButton1" name="xz" value="RadioButton1" checked="checked" type="radio">
		<label for="RadioButton1">按运单编号查询</label>
		</span></td>
</tr>
<tr>
	<td colspan="2" align="right" width="96%">
		<p align="left"> <span id="Label3"><font color="Red">请输入运单编号或订单号:</font></span>&nbsp;<font face="宋体" size="2"><br>
			(多个单号请用回车分隔)</font></p>
	</td>
</tr>
<tr>
	<td colspan="2" width="96%"><font face="宋体">&nbsp;</font>
		<textarea id="queryId"></textarea>
		&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center" width="96%">
		<input name="Button2" value="查  询" id="search" type="button">
		<input name="Button1" value="重  置" id="reset" type="button">
		<input name="Button2" value="注　销" id="logout" type="button">
	</td>
</tr>
<tr>
	<td colspan="2" align="center" height="64"><font face="宋体"></font> </td>
</tr>
<?php
	}else{
		echo 'wrong';
		die();
	}
?>
