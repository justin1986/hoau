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
		css_include_tag('drd/drd1');
		use_jquery();
		js_include_tag('top','drd/drd1');
	?>
</head>
<body>
	<div id="title">定日达运单追踪</div>
	<div id=select>
		<div id=start>
			<div class=word>按运单编号查询：</div>
			<div class=div>
				<input type="text" id="yd_info">
			</div>
			<div class=div><button class=cx id="ydcx" type="button"></button></div>
			<div class="bz">注：多运单间用逗号分隔，最多可以查询5个运单.</div>
		</div>
		<div id=end>
			<div class=word>按货号查询：</div>
			<div class=div>
				货号：
			</div>
			<div class=div><input type="text" id="hy_info"></div>
			<div class=div>+</div>
			<div class=div>日期：</div>
			<div class=div><input type="text" id="hy_date"></div>
			<div class=div><button class=cx id="hhcx" type="button"></button></div>
		</div>
		<div class="bz">注：输入货号格式为：45678-11，45678为运单号后5位，11为货物件数；托运日期格式2006-01-01.</div>
	</div>
	
	<div id="result"></div>
</body>
</html>

