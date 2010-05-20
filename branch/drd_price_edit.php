<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$drd = new table_class('hoau_drd_price');
	$drd->find($id);
	if(stripos($_SERVER['HTTP_REFERER'],'title')>0){
		$post_url=$_SERVER['HTTP_REFERER'].'&reload='.rand_str(5);
	}else{
		$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
	}
	rights($_SESSION["hoaurights"],'3');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>添加定日达网点</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("news_add");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="news_add" enctype="multipart/form-data" action="drd_price.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　编辑定日达线路</td>
		</tr>
		<tr class=tr3>
			<td width="130">起始省份</td><td width="695" align="left"><input type="text" class="required" value="<?php echo $drd->startprovince?>" name="drd[startprovince]" id="news_title"></td>
		</tr>
		<tr class=tr3>
			<td width="130">起始城市</td><td width="695" align="left"><input type="text" class="required" value="<?php echo $drd->startcity?>" name="drd[startcity]" id="news_title"></td>
		</tr>
		<tr class=tr3>
			<td width="130">目的省份</td><td width="695" align="left"><input type="text" class="required" value="<?php echo $drd->endprovince?>" name="drd[endprovince]" ></td>
		</tr>
		<tr class=tr3>
			<td width="130">目的城市</td><td width="695" align="left"><input type="text" class="required" value="<?php echo $drd->endcity?>" name="drd[endcity]" ></td>
		</tr>
		<tr class=tr3>
			<td width="130">运输时间(小时)</td><td width="695" align="left"><input type="text" class="required number" value="<?php echo $drd->timeinterval?>" name="drd[timeinterval]" ></td>
		</tr>
		<tr class=tr3>
			<td width="130">到达时间</td><td width="695" align="left">
				<select name="drd[pickday]">
					<option value="1" <?php if($drd->pickday==1){?>selected="selected"<?php }?>>第一天</option>
					<option value="2" <?php if($drd->pickday==2){?>selected="selected"<?php }?>>第二天</option>
					<option value="3" <?php if($drd->pickday==3){?>selected="selected"<?php }?>>第三天</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td width="130">到达上下午</td><td width="695" align="left">
				<select name="drd[pickampm]">
					<option value="1" <?php if($drd->pickampm==1){?>selected="selected"<?php }?>>上午</option>
					<option value="3" <?php if($drd->pickampm==3){?>selected="selected"<?php }?>>下午</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td width="130">起步价(元/票)</td><td width="695" align="left"><input type="text" class="required number" value="<?php echo $drd->initialprice?>" name="drd[initialprice]" ></td>
		</tr>
		<tr class=tr3>
			<td width="130">重货(元/公斤)</td><td width="695" align="left"><input type="text" class="required number" value="<?php echo $drd->heavyprice?>" name="drd[heavyprice]" ></td>
		</tr>
		<tr class=tr3>
			<td width="130">轻货(元/立方)</td><td width="695" align="left"><input type="text" class="required number" value="<?php echo $drd->lightprice?>" name="drd[lightprice]" ></td>
		</tr>
		<tr class=tr3>
			<td width="130">开线时间</td><td width="695" align="left"><input type="text" class="required" value="<?php echo $drd->opendate?>" name="drd[opendate]" ></td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布"></td>
		</tr>
	</table>
	<input type="hidden" name=id value=<?php echo $id;?>>
	<input type="hidden" name="url" value="<?php echo $post_url;?>">
	</form>
</body>
</html>
