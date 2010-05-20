<?php
    require_once('../frame.php');
	$id =  intval($_REQUEST['id']);
	$news = new table_class('hoau_news');
	$news->find($id);
	$news->click_count = $news->click_count+1;
	$news->save();
	$cate = new table_class('hoau_category');
	$cate->find($news->category_id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('drd/news','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
	<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > <?php echo $cate->name;?></div>
	<div id="title"><?php echo $news->title;?></div>
	<div id="time"><?php echo date_format($news->created_at,"Y-m-d H:i:s");?></div>
	<div id="content"><?php echo $news->news_content;?></div>
	<div id="back"><a href="<?php echo $_SERVER['HTTP_REFERER'];?>">返回</a></div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9272044-1");
pageTracker._trackPageview();
} catch(err) {}</script> 
</body>
</html>