<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$dkh = new table_class('hoau_dkh');
	if(isset($id)){
		$dkh->find($id);
	}
  	$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('admin');
	?>
</head>
<?php
rights($_SESSION["hoaurights"],'3');
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="dkh_edit.post.php">
		<tr class=tr1>
			<td colspan="2">　
				<?php if(isset($id)){
					echo "编辑大客户";
				}else{echo "添加大客户";}?>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>用户名：</td>
			<td width=645 align="left"><input type="text" name="post[userName]" value="<?php echo $dkh->userName;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>密码：</td>
			<td width=645 align="left"><input type="password" name="password" value="<?php if(isset($id))echo '000000';?>"  class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>公司名称：</td>
			<td width=645 align="left"><input type="text" name="post[companyName]" value="<?php echo $dkh->companyName;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>公司ID：</td>
			<td width=645 align="left"><input type="text" name="post[companyId]" value="<?php echo $dkh->companyId;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>是否是管理员：</td>
			<td width=645 align="left">
				<select name="post[isadmin]" class="required">
					<option <?php if($dkh->isadmin=="TRUE")echo 'selected="selected"'?> value="TRUE">是</option>
					<option <?php if($dkh->isadmin=="FALSE")echo 'selected="selected"'?> value="FALSE">否</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
		<input type="hidden" name="id" value="<?php echo $id;?>"> 
	</form>
	</table>
</body>
</html>
