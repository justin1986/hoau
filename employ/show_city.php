<?php
    require_once('../frame.php');
	
	$p_id = $_POST['id'];
	if(!empty($p_id)){
		$db = get_db();
		$sql = "select * from S_City where ProvinceID=".$p_id;
		$records = $db->query($sql);
		$count = count($records);
		if($count==0){
		}else{
	?>
<select  style="width:100px;" id="city_id" name="post[city_id]">
		<option value=""></option>
		<?php for($i=0;$i<$count;$i++){
		?>
		<option value="<?php echo $records[$i]->CityID?>"><?php echo $records[$i]->CityName;?></option>
		<?php }?>
</select>
	<?php }?>
<?php	
	}else{
?>
<span id="city_id"></span>
<?php
	}
?>