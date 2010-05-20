<?php
	require_once('../frame.php');
	$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
	rights($_SESSION["hoaurights"],'1');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>添加新闻</title>
	<?php 
		css_include_tag('admin','jquery_ui');
		use_jquery_ui();
		validate_form("news_add");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="news_add" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　添加新闻</td>
		</tr>
		<tr class=tr3>
			<td width="130">标题</td><td width="695" align="left"><?php show_fckeditor('news[title]','Title',false,"50",'',300);?></td>
		</tr>
		<tr class=tr3>
			<td width="130">短标题</td><td width="695" align="left"><input type="text" class="required" name="news[short_title]" id="news_short_title"><span id="max_len"></span></td>
		</tr>
		<tr class=tr3>
			<td>分　类</td>
			<td align="left">
				<select name="news[category_id]">
					<?php 
						$db = get_db();
						$sql = "select name,id from hoau_category where category_type='news'";
						$records = $db->query($sql);
						$count = count($records);
						for($i=0;$i<$count;$i++){
					?>
					<option value="<?php echo $records[$i]->id;?>"><?php echo $records[$i]->name;?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td>过期时间</td>
			<td align="left">
				<input type="text" size="20" class="date_jquery" name="news[guoqi]">(如果有过期时间再填写)
			</td>
		</tr>	
		<tr class=tr3>
			<td>关键词</td>
			<td align="left">
				<input type="text" size="20" id="news_keywords"  name=news[keywords]>(空格分隔)
			</td>
		</tr>		
		<tr class=tr3>
			<td>优先级</td>
			<td align="left">
				<input type="text" size="10" name=news[priority] class="number">(0~100)</td>
		</tr>
		<tr class=tr3>
			<td>链接</td>
			<td align="left">
				<input type="text" size="20"  name=news[target_url]>(填写则跳转到链接页面)</td>
		</tr>
		<tr class=tr3>
			<td>缩略图</td>
			<td align="left">
				<input type="file" name="image" id="image">若前台想显示缩略图请上传(新闻所有图片不得大于1M)</td>
		</tr>	
		<tr class="normal_news tr3">
			<td height=100>简短描述</td><td><?php show_fckeditor('news[description]','Admin',true,"100");?></td>
		</tr>
		<tr class="normal_news tr3">
			<td height=265>新闻内容</td><td><?php show_fckeditor('news[news_content]','Admin',true,"265");?></td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布新闻"></td>
		</tr>	
	</table>
	<input type="hidden" name="url" value="<?php echo $post_url;?>">
	</form>
</body>
</html>
<script>
	$(function(){
		$(".date_jquery").datepicker(
			{
				monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			}
		);
	})
</script>
