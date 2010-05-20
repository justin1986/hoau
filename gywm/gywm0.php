<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select t1.id,t1.title,t1.created_at,t1.click_count,t1.news_content from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1 and t2.name='总裁致辞' order by priority asc,created_at desc";
	$news = $db->query($sql);
	$db->execute("update hoau_news set click_count=click_count+1 where id=".$news[0]->id);
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
<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/gywm/" target="_parent">关于我们</a> > <a href="gywm0.php" class="a2">总裁致辞</a></div>
	<div id="title"><?php echo $news[0]->title;?></div>
	<div id="content"><?php echo $news[0]->news_content;?></div>
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