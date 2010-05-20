<?php
 	require_once('../frame.php');
    if("del"==$_POST['type'])
	{
			$wd = new table_class('hoau_yywd');
			$wd->find($_POST['id']);
			$wd->is_new = 0;
			$wd->save();
	}
	if("new"==$_POST['type'])
	{
			$wd = new table_class('hoau_yywd');
			$wd->find($_POST['id']);
			$wd->is_new = 1;
			$wd->save();
	}
?>