<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select * from hoau_video where 1=1 and is_adopt=1";
	$video = $db->paginate($sql,3);
	$count = count($video);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('video','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
<div id="title" style='background:url("/images/icon/gywm.gif") no-repeat;'>
	<div style="float:left">企业视频</div>
	<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/gywm/" target="_parent">关于我们</a> > <a href="gywm7.php" class="a2">企业视频</a></div>
</div>
<div id="box">
	<?php for($i=0;$i<$count;$i++){?>
	<div class="vbox">
		<div class="left">
			<?php show_video_player(318,233,$video[$i]->photo_url,$video[$i]->video_url,$autostart = "false");?>
		</div>
		<div class="right">
			<div class="title"><?php echo $video[$i]->title;?></div>
			<div class="desc" title="<?php echo $video[$i]->description;?>"><?php echo $video[$i]->description;?></div>
			<div class="download"><a href="<?php echo $video[$i]->video_url;?>" target="_blank">点击下载</a></div>
		</div>
	</div>
	<div class="line"></div>
	<?php }?>
	<div id="paginate"><?php paginate();?></div>
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