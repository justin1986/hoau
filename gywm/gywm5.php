<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select t1.id,t1.short_title,t1.created_at,t1.title from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1 and t2.name='社会责任' order by priority asc,created_at desc";
	$record = $db->paginate($sql,10);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('gywm/gywm5','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
	<div id="title" style='background:url("/images/icon/gywm.gif") no-repeat;'>
		<div style="float:left">企业视频</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/gywm/" target="_parent">关于我们</a> > <a href="gywm5.php" class="a2">联系方式</a></div>
	</div>
	<div id="top_box">
		<div class="b_box">
			<div class="b_title">全国客服热线</div>
			<div class="line">全国客服热线:400-808-6666</div>
			<div class="line" style="width:500px;">服务时间：8：00-20：00（人工服务，全年无休）20：00-8：00（语音自助查询）</div>
		</div>
	</div>
	<div id="top_box">
		<div class="b_title">集团总部联系方式</div>
		<div class="line">集团总机：021-60916666</div>
		<div class="line">服务质量监督邮箱：service@hoau.net</div>
		<div class="line">地址：上海市闵行区华翔路2239号 邮编：201107</div>
	</div>
	<div class="box">
		<div class="b_box">
			<div class="b_title">华东区域联系方式</div>
			<div class="line">区域办公室：021-60916309</div>
			<div class="line">服务质量监督电话： 021-60916309</div>
		</div>
		<div class="b_box">
			<div class="b_title">华南区联系方式</div>
			<div class="line">区域办公室：020-86052505</div>
			<div class="line">服务质量监督电话： 020-36461305</div>
		</div>
	</div>
	<div class="box">
		<div class="b_box">
			<div class="b_title">华北区域联系方式</div>
			<div class="line">区域办公室：010-60341539</div>
			<div class="line">服务质量监督电话： 010-60341539</div>
		</div>
		<div class="b_box">
			<div class="b_title"> 中原区联系方式</div>
			<div class="line">区域办公室：0532-81101386</div>
			<div class="line">服务质量监督电话：0532-81101386</div>
		</div>
	</div>
	<div class="box">
		<div class="b_box">
			<div class="b_title">东南区联系方式</div>
			<div class="line">区域办公室：027-83238036</div>
			<div class="line">服务质量监督电话： 027-83238036</div>
		</div>
		<div class="b_box">
			<div class="b_title">西部区联系方式</div>
			<div class="line">区域办公室：028-84731222</div>
			<div class="line">服务质量监督电话： 028-84731222</div>
		</div>
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