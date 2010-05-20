<?php 
	require_once('frame.php');
	$menu_show = menu_show();
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇为世界500强企业、全球四大快递公司之一TNT的在华全资子公司。作为国家一级运输资质企业，天地华宇始终致力于打造中国最强大、最快捷、最可靠的递送网络。全国客服热线400-808-6666"/>
	<?php
		css_include_tag('index','tb');
		use_jquery();
		js_include_tag('top','index');
	?>
</head>
<SCRIPT LANGUAGE="javascript">
	　　<!--
	　　//window.open ('open.html', 'newwindow', 'height=478, width=705, top=200,left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no')
	　　-->
</SCRIPT>
<body onresize=resize()>
<?php include('inc/menu.html');?>
<div id=ibody>
	<div id=top>
			<div id=logo><div id=logo_img></div></div>
			<div id=top_box>
				<?php include('inc/top.php');?>
			</div>
	</div>
	<div id=middle>
		<div id=flash>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="900px" height="440px">
				      <param name=movie value="banner-tnt.swf">
				      <param name=quality value=high>
				      <param name="wmode" value="transparent">
				      <embed src="banner-tnt.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="900px" height="440px" wmode="transparent"></embed>
				    </object></div>
	</div>
	<div id=content>	
		<div class=box>
			<div class=title>新闻动态</div>
			<div class="wdbox">
			<?php
				$sql = "select top 5 t1.id,t1.short_title,t1.created_at,t1.title,t2.id as c_id from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1 and t1.is_adopt=1 and t2.name in ('天地华宇动态','新闻稿','媒体报道') order by t1.priority asc,t1.created_at desc";
				$record = $db->query($sql);
				for($i=0;$i<count($record);$i++){
					switch($record[$i]->c_id){
						case 38: $c_id=0;break;
						case 39: $c_id=1;break;
						case 23: $c_id=2;break;
						case 25: $c_id=3;break;
					}
				if(strpos($record[$i]->short_title,'】')){
					$num = strpos($record[$i]->short_title,'】')+3;
				}else{
					$num = 0;
				}
			?>
			<div class=context><a title="<?php echo strip_tags($record[$i]->short_title);?>" href="/xwzx/?load=news2.php&newsid=<?php echo $record[$i]->id;?>&id=<?php echo $c_id;?>"><?php echo substr($record[$i]->short_title,$num);?></a></div>
			<?php }?>
			</div>
			<div class=more><a href="/xwzx"><img src="/images/more.gif" border="0"></a></div>
		</div>
		<div class=box>
			<div class=title>新增网点</div>
			<div class="wdbox">
			<?php
				$sql = "select top 5 t1.*,t2.PMC,t3.CITYNAME from hoau_yywd t1 join hoau_new_province t2 on t1.SF=t2.PID join hoau_new_city t3 on t1.CS=t3.CITYID where t1.is_new=1 order by t1.id desc";
				$record = $db->query($sql);
				$count = $db->query("select count(id) as num from hoau_yywd");
				for($i=0;$i<count($record);$i++){
			?>
			<div class="context index_wd" id="<?php echo $record[$i]->QYMC;?>">
				<?php 
					if($record[$i]->SF!='0100'&&$record[$i]->SF!='0200'&&$record[$i]->SF!='0300'&&$record[$i]->SF!='0400'&&$record[$i]->SF!='3000'&&$record[$i]->SF!='3100'&&$record[$i]->SF!='3200'&&$record[$i]->SF!='3300'&&$record[$i]->SF!='3400'){
						echo $record[$i]->PMC.'省';
					}elseif($record[$i]->SF=='3000'||$record[$i]->SF=='3100'||$record[$i]->SF=='3200'||$record[$i]->SF=='3300'||$record[$i]->SF=='3400'){
						echo $record[$i]->PMC;
					}
				?><?php echo $record[$i]->CITYNAME.'市';?><?php echo $record[$i]->QYMC;?></div>
				<?php //echo '第'.($count[0]->num-$i).'家-';?>
			<?php
				}
			?>
			</div>
			<div class=more><a href="/khfw/?load=khfw1.php"><img src="/images/more.gif" border="0"></a></div>
		</div>
		<div id=flash_box>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="410px" height="120px">
		      <param name=movie value="/flash/drdbottom.swf">
		      <param name=quality value=high>
		      <param name="wmode" value="transparent">
		      <embed src="/flash/drdbottom.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="410" height="120" wmode="transparent"></embed>
		    </object>
		</div>
	</div>
	<?php include('inc/bottom.php');?>
</div>
<div id="flash_pop" class="index_pop"></div>
<div class="p_left index_pop" id="p_left1"></div>
<div class="p_right index_pop" id="p_right1"><span>货物追踪</span></div>
<div id="pop_label1" class="pop_label">多单号之间用逗号分隔</div>
<div id="pop_text" class="index_pop pop_text_c"><textarea id="hwbh"></textarea></div>
<div id="hwgz_submit" class="index_pop hwgz_submit_c"></div>

<div class="p_left index_pop" id="p_left2"></div>
<div class="p_right index_pop" id="p_right2"><span>网点查询</span></div>
<div class="p_select index_pop" id="p_select1">
	<?php
		$record = $db->query("select * from hoau_new_province");
	?>
	省份<select id="province" class="index_pop">
		<option value="">请选择</option>
		<?php for($i=0;$i<count($record);$i++){?>
		<option value="<?php echo $record[$i]->PID;?>"><?php echo $record[$i]->PMC;?></option>
		<?php } ?>
	</select>
</div>
<div class="p_select index_pop" id="p_select2">
	城市<select id="city" class="index_pop">
		<option value="">请选择</option>
	</select>
</div>
<div id="pop_label2" class="pop_label">关键字模糊查询</div>
<div id="pop_text2" class="pop_text_c index_pop"><textarea id="hwbh2"></textarea></div>
<div id="hwgz_submit2" class="hwgz_submit_c index_pop"></div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-4950755-2");
pageTracker._trackPageview();
} catch(err) {}
</script>
<script language="javascript" src="http://chat16.live800.com/live800/chatClient/monitor.js?jid=2264000652&companyID=114642&configID=30431&codeType=custom"></script>
﻿</body>
</html>