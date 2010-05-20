<?php 
include('../frame.php');
$db=get_db();
if ($_POST["type"]=="login")
{
	$StrSql="select * from hoau_user where username='".$_POST["login_text"]."' and password='".md5($_POST["password_text"])."'"; 
	$record=$db -> query($StrSql);
	if(count($record)==1)
	{
		$sql = "insert hoau_log_user (userid,logindatetime) values (".$record[0]->id.",'".date("Y-m-d H:i:s")."')";
		$db -> execute($sql);
		session_start(); 
		$_SESSION["hoauadmin"] = $_POST['login_text'];
		$_SESSION["hoaurights"] = $record[0]->rights;
		echo "ok";
	}
	else
	{
		echo "fail";
	}
}

?>
