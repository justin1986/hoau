<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select t1.id,t1.short_title,t1.created_at,t1.title from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1 and t2.name='定日达市场活动' order by priority asc,created_at desc";
	$record = $db->paginate($sql,10);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('gywm/gywm3','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
	<div id="title" style='background:url("/images/icon/gywm.gif") no-repeat;'>
		<div style="float:left">资质荣誉</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/gywm/" target="_parent">关于我们</a> > <a href="gywm3.php" class="a2">资质荣誉</a></div>
	</div>
	<div class="box">
		<div class="name">AAAAA级物流企业</div>
		<div class="img"><img src="/images/gywm/1.jpg" width=200 height=133></div>
	</div>
	<div class="box">
		<div class="name">中国物流与采购联合会理事单位</div>
		<div class="img"><img src="/images/gywm/2.jpg" width=200 height=133></div>
	</div>
	<div class="box">
		<div class="name">上海市物流协会会员</div>
		<div class="img"><img src="/images/gywm/3.jpg" width=200 height=133></div>
	</div>
	<div class="box">
		<div class="name">中国物流百强企业</div>
		<div class="img"><img src="/images/gywm/4.jpg" width=200 height=133></div>
	</div>
	<div class="box">
		<div class="name">质量管理体系认证</div>
		<div class="img"><img src="/images/gywm/5.jpg" width=200 height=300></div>
	</div>
	<div class="box">
		<div class="name">中国最具竞争力物流企业</div>
		<div class="img"><img src="/images/gywm/6.jpg" width=200 height=133></div>
	</div>
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