<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$config = new table_class('hoau_yd_config');
	$config->find($id);
	$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<script src="http://ditu.google.cn/maps?file=api&amp;v=2.x&amp;key=ABQIAAAABwnBDPbSNIbjRoBr72hE5BQHNOcxkocWKUK7jtuqKWIJVor8ahQzvVdq_MFYnCTloVzXyts26uKuHQ&hl=zh-CN" type="text/javascript"></script>
	<?php
		css_include_tag('admin');
		use_jquery();
		rights($_SESSION["hoaurights"],'3');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="edit.post.php">
		<tr class=tr1>
			<td colspan="2">　编辑运单查询类型</td>
		</tr>
		<tr class=tr3>
			<td width=150>用户类型：</td>
			<td width=645 align="left"><?php echo $config->type;?></td>
		</tr>
		<tr class=tr3>
			<td width=150>货物信息：</td>
			<td width=645 align="left"><input type="checkbox" name="hwxx" <?php if(substr($config->rights,0,1)==1)echo 'checked="checked"';?> style="width:20px;"></td>
		</tr>
		<tr class=tr3>
			<td width=150>提货网点联系方式：</td>
			<td width=645 align="left"><input type="checkbox" name="thwd" <?php if(substr($config->rights,1,1)==1)echo 'checked="checked"';?> style="width:20px;"></td>
		</tr>
		<tr class=tr3>
			<td width=150>运单追踪信息：</td>
			<td width=645 align="left"><input type="checkbox" name="ydzz" <?php if(substr($config->rights,2,1)==1)echo 'checked="checked"';?> style="width:20px;"></td>
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