<?php
    require_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('khfw/khfw4','breadcom');
		use_jquery();
		js_include_tag('top','khfw/khfw4');
	?>
</head>
<body>
	<div id="title"><div style="float:left">客户留言</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > <a href="" class="a2">客户留言</a></div>
	</div>
	<div id="description">
		<li>填写留言信息，确认按钮提交你的留言；</li>
		<li>运单编号为8位数字；</li>
		<li>同一运单编号每天只能留言一次； </li>
		<li>我们会有专员处理您的留言信息，对于留言内容，我们会及时通过电话与您联系，请您务必填写正确的电话号码。</li>
	</div>
	<div id="message">
		<div id="top_line">
			留言华宇（*为必填内容）
		</div>
		<form method="post" id="com_form" action="khfw4.post.php">
		<div class="line">
			<div class="box1">*主题</div>
			<div class="box2"><input id="zt" type="text" name="post[topic]"></div>
		</div>
		<div class="line">
			<div class="box1">*运单号</div>
			<div class="box2"><input id="ydh" type="text" name="post[wbnum]"></div>
		</div>
		<div class="line">
			<div class="box1">*姓名</div>
			<div class="box2"><input id="xm" type="text" name="post[name]"></div>
		</div>
		<div class="line">
			<div class="box1">*电话</div>
			<div class="box2"><input id="dh" type="text" name="post[tel]"></div>
		</div>
		<div class="line">
			<div class="box1">*电子邮箱</div>
			<div class="box2"><input id="dzyj" type="text" name="post[email]"></div>
		</div>
		<div class="line">
			<div class="box1">*留言类型</div>
			<div class="box2"><select id="lylx" name="post[type]"><option value="1">留言</option><option value="2">建议</option><option value="3">投诉</option></select></div>
		</div>
		<div class="line" style="height:120px;">
			<div class="box1" style="height:120px;">*留言</div>
			<div class="box2" style="height:120px;"><textarea id="ly" name="post[message]"></textarea></div>
		</div>
		<div class="line" style="border:0;">
			<button type="button" id="tijiao">提交</button>
		</div>
		</form>
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

