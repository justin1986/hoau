<?php
    require_once('../frame.php');
	
	$p_id = $_POST['p_id'];
	$db = get_db();
	if($p_id!=''){
		$sql = "select * from hoau_new_city where PID=$p_id";
		$record = $db->query($sql);
?>
<option value="">--请选择--</option>
<?php
	for($i=0;$i<count($record);$i++){
?>
<option value="<?php echo $record[$i]->CITYID;?>"><?php echo $record[$i]->CITYNAME;?></option>
<?php
	}
	}else{
?>
<option value="">--请选择--</option>
<?php
	}
?>