<?php
    require_once('../frame.php');
	
	$p_id = $_POST['id'];
	$type = $_POST['type'];
	$db = get_db();
	$sql = "select t1.* from hoau_province t1 join hoau_province t2 on t1.parent_id=t2.id  where t1.$type=1 and t1.parent_id>0 and t2.parent_id=0 and t2.name='".$p_id."'";
	$records = $db->query($sql);
	$count = count($records);
	if($count==0){
	?>
	<span id="city_id2">
	</span>
	<?php
	}else{
?>
<select id="city_id2">
	<option value=0></option>
	<?php for($i=0;$i<$count;$i++){
	?>
	<option value="<?php echo $records[$i]->name?>"><?php echo $records[$i]->name;?></option>
	<?php }?>
</select>
<?php }?>