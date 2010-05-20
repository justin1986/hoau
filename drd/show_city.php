<?php
    require_once('../frame.php');
	
	$type = $_POST['type'];
	$p_name = $_POST['name'];
	if(!empty($p_name)){
		$db = get_db();
		$sql = "select t1.id,t1.name from hoau_province t1 join hoau_province t2 on t1.parent_id=t2.id  where t1.parent_id>0 and t2.parent_id=0 and t1.{$type}=1 and t2.name='".$p_name."'";
		$records = $db->query($sql);
		$count = count($records);
		if($count==0){
		}else{
	?>
		<option value="">--请选择--</option>
		<?php for($i=0;$i<$count;$i++){
		?>
		<option value="<?php echo $records[$i]->name?>"><?php echo $records[$i]->name;?></option>
		<?php }?>
	<?php }?>
<?php	
	}else{
?>
<option value="">--请选择--</option>
<?php
	}
?>