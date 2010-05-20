<?php
	require_once('../frame.php');
	$menu_show = menu_show();
	$id = $_REQUEST['id'];
	if($id=='')$id='0';
	$default_load = $_GET['load'] ? $_GET['load'] : "cpfw{$id}.php";
	if($_GET['hwbh']){
		$default_load .= "?hwbh=" .$_GET['hwbh'];
	}
	$show_id = $_REQUEST['id']+1;
	if($show_id==6)$show_id=5;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-产品和服务</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('cpfw','tb');
		use_jquery();
		js_include_tag('top','adjust_iframe');
	?>
</head>
<body>
	<?php include('../inc/menu.html');?>
	<div id=ibody>
		<div id=top>
			<div id=logo>
				<div id=logo_img>
					<a href="/"><img border="0" src="/images/logo.jpg"></a>
				</div>
			</div>
			<div id=top_box>
			<?php include('../inc/top.php');?>
			</div>
		</div>
		<div id=center>
			<div id=c_left>
				<div id=c_menu>
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="174px" height="321px">
				      <param name=movie value="/flash/left-cpfw.swf">
				      <param name=quality value=high>
					  <param name="flashvars" value="showid=<?php echo $show_id;?>">
				      <param name="wmode" value="transparent">
				      <embed src="/flash/left-cpfw.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="174" height="321" flashvars="showid=<?php echo $show_id;?>" wmode="transparent"></embed>
				    </object>
				</div>
				<div id="zxkf"><a href="/khfw/?load=khfw2.php"><img src="/images/zxkf.gif"></a></div>
				<!--
				<div id=hd>
					<script src="/flash/sohuflash_1.js" type="text/javascript"></script>
					<div id="focus_02"></div> 
					<script type="text/javascript"> 
					var pic_width1=174; //图片宽度
					var pic_height1=152; //图片高度
					var pics="/images/fl/1.jpg,/images/fl/2.jpg,/images/fl/3.jpg,/images/fl/4.jpg";
					var mylinks="/schd/index.php?id=０,/schd/index.php?id=１,/schd/index.php?id=２,/schd/index.php?id=３";
					var texts=",,,";
					
					var picflash = new sohuFlash("/flash/focus.swf", "focus_02", pic_width1, pic_height1, "4","#FFFFFF");
					picflash.addParam('wmode','opaque');
					picflash.addVariable("picurl",pics);
					picflash.addVariable("piclink",mylinks);
					picflash.addVariable("pictext",texts);
					picflash.addVariable("pictime","5");
					picflash.addVariable("borderwidth",pic_width1);
					picflash.addVariable("borderheight",pic_height1);
					picflash.addVariable("borderw","false");
					picflash.addVariable("buttondisplay","true");
					picflash.addVariable("textheight","15");
					picflash.addVariable("pic_width",pic_width1);
					picflash.addVariable("pic_height",pic_height1);
					picflash.write("focus_02");
					</script>
				</div>
				<div id=t_logo></div>
				-->
			</div>
			<div id=c_right>
				<div id=drd_pic></div>
				<div id=iframe>
					<iframe id=drd_iframe name="drd_iframe" scrolling="no" frameborder="0" src="<?php echo $default_load;?>" width="100%" height="550px;"></iframe>
				</div>
			</div>
		</div>
		<?php include('../inc/bottom.php');?>
	</div>
</body>
</html>
<script>
	var menu_id=<?php echo $id;?>
</script>
