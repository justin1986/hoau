<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select * from hoau_information where 1=1 and is_adopt=1 order by created_at desc";
	$record = $db->paginate($sql,13);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('drd/news_list','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
	<div id="title" style='background:url("/images/icon/khfw.gif") no-repeat;'><div style="float:left">资料下载</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > <a href="" class="a2">资料下载</a></div>
	</div>
	<div id="list">
		<?php for($i=0;$i<count($record);$i++){
		?>
		<div class=list_line>
			<div class=title>
				<li><a target="_blank" href="<?php echo $record[$i]->url;?>" title="<?php echo $record[$i]->name;?>"><?php echo $record[$i]->name;?></a></li>
			</div>
			<div class=time>
				[<?php echo date_format($record[$i]->created_at,"Y-m-d H:i:s");?>]
			</div>
		</div>
		<?php
		} ?>
	</div>
	<div id=paginate><?php paginate();?></div>
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