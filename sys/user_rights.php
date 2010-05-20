<?php
	require_once('../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('admin');
	 	use_jquery();
	?>
</head>
<body>
	<table width="795" border="0" id="list">
		<tr class=tr1>
			<td colspan="2">　编辑用户权限</td>
		</tr>
		<?php
				$sql = 'select * from hoau_user where id='.$id;
				$record=$db -> query($sql);
		
		?>
		<tr class=tr3>
			<td width=150>姓名：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $record[0]->username;?>"  disabled></td>
		</tr>
		<?php
				$sql = 'select * from hoau_rights order by id asc';
				$record_right=$db -> query($sql);
		
		?>
		<?php for($i=0;$i<count($record_right);$i++){?>

		<tr class=tr3>
			<td><?php echo $record_right[$i]->name;?></td>
			<td align="left"><input type="checkbox" id="p_<?php echo $record_right[$i]->id ?>"  style="width:20px;"  <?php if( substr($record[0]->rights,$i,1)==1){echo "checked";} ?>></td>
		</tr>
		<?php }?>
		
		<tr class=tr3>
			<td colspan="2"><button id=rights_btn type="button">提 交</button></td>
		</tr>

	<table>
</body>
</html>
<script>
$(function(){
		$("#rights_btn").click(function(){
			var str="";
			
			$("input").each(function(){
				if($(this).attr('type')=='checkbox'){
					if($(this).attr('checked')==true){
						str=str+"1";
					}else{
						str=str+"0";
					}
				}
				
			});
				
						
			$.post('/pub/pub.post.php',{'type':'rights','id':<?php echo $id?>,'rights':str},function(data){
					if(data=="ok"){
						window.location.href='/sys/user_list.php';
					    }
			       }
			)
			
			
			
			
		});
		

		
		
});
</script>