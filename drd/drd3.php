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
		css_include_tag('drd/price','breadcom');
		use_jquery();
		js_include_tag('top','drd/drd_price');
	?>
</head>
<body>
	<div id="title">
		<div style="float:left">定日达线路价格查询</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/drd/" target="_parent">定日达</a> > <a href="drd3.php" class=a2>定日达线路价格查询</a></div>
	</div>
	<div id=select>
		<div id=start>
			<div class=word>选择起始地</div>
			<div class=div>
				<?php
					$record = $db->query("select * from hoau_province where parent_id=0 and is_drd_price=1 order by priority asc");
				?>
				<select id="start_province" sytle="background:#eeeeee;border:0px">
					<option value="">--请选择--</option>
					<?php for($i=0;$i<count($record);$i++){?>
					<option value="<?php echo $record[$i]->name;?>"><?php echo $record[$i]->name;?></option>
					<?php } ?>
				</select>
			</div>
			<div class=div>
				<select id="start_city">
					<option value="">--请选择--</option>
				</select>
			</div>
		</div>
		<div id=end>
			<div class=word>选择目的地</div>
			<div class=div>
				<?php
					$record = $db->query("select name from hoau_province where parent_id=0 and is_drd_price=1 order by priority asc");
				?>
				<select id="end_province">
					<option value="">--请选择--</option>
					<?php for($i=0;$i<count($record);$i++){?>
					<option value="<?php echo $record[$i]->name;?>"><?php echo $record[$i]->name;?></option>
					<?php } ?>
				</select>
			</div>
			<div class=div>
				<select id="end_city">
					<option value="">--请选择--</option>
				</select>
			</div>
			<button id=cx type="button"></button>
		</div>
	</div>
	
	<div id="bz">备注：客户交货当天不算在运输时间内</div>
	<div id=show_result>
		<div id="r_title">
			<div id="title_box">
				<div class=box style="border-left:0;">运营线路</div>
				<div class=box>运输时间(小时)</div>
				<div class=box>可提货时间</div>
				<div class=box>起步价(元/票)</div>
				<div class=box>重货(元/公斤)</div>
				<div class=box style="border-right:0;">轻货(元/立方)</div>
			</div>
		</div>
		<div id="main">
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

<script>
	$(function(){
		$(window.parent.document).find("#hd").show();
	});
</script>