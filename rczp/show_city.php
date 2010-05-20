<?php
    require_once('../frame.php');
	
	$p_id = $_POST['p_id'];
	if(!empty($p_id)){
		$db = get_db();
		$sql = "select * from S_City where ProvinceID=".$p_id;
		$records = $db->query($sql);
		$count = count($records);
		if($count==0){
		}else{
	?>
		<option value="0">请选择</option>
		<?php for($i=0;$i<$count;$i++){
		?>
		<option value="<?php echo $records[$i]->CityID?>"><?php echo $records[$i]->CityName;?></option>
		<?php }?>
	<?php }?>
<?php	
	}else{
?>
<option value="0">请选择</option>
<?php
	}
?>