<?php
	require_once('../frame.php');
  	$id = $_REQUEST['id'];
	$information = new table_class('hoau_information');
	$information->find($id);
	if(stripos($_SERVER['HTTP_REFERER'],'title')>0){
		$post_url=$_SERVER['HTTP_REFERER'].'&reload='.rand_str(5);
	}else{
		$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
	}
	rights($_SESSION["hoaurights"],'2');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" enctype="multipart/form-data" action="information.post.php">
		<tr class=tr1>
			<td colspan="2">　资料上传</td>
		</tr>
		<tr class=tr3>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="post[name]" value=<?php echo $information->name;?> class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>选择文件：</td>
			<td width=645 align="left"><input type="hidden" name="MAX_FILE_SIZE" value="5000000000"><input name="information" id="information" type="file">
				<a href=<?php echo $information->url;?>>点击下载</a>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value=<?php echo $id;?>>
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
	</form>
	</table>
</body>
</html>
