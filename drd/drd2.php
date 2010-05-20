<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select t1.guoqi,t1.id,t1.slt_src,t1.short_title,t1.description,t1.title,t1.created_at,t1.click_count from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1 and t1.is_adopt=1 and t2.name='定日达促销' order by priority asc,created_at desc";
	$record = $db->paginate($sql,3);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('news_list','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
	<div id="title">
		<div style="float:left">定日达市场活动</div>
		<div class="breadcum" ><a href="/" target="_parent">首页</a> > <a href="/drd/" target="_parent">定日达</a> > <a href="" class=a2>定日达市场活动</a></div>
	</div>
	<div id="list">
		<?php for($i=0;$i<count($record);$i++){
		?>
		<div class=list_line>
			<div class="ll_left">
				<div class="img">
					<a href="news.php?id=<?php echo $record[$i]->id;?>">
						<?php if($record[$i]->slt_src!=''){?>
						<img border="0" src="<?php echo $record[$i]->slt_src;?>" width="175" height="140">
						<?php }else{
						?>
						<img border="0" src="/images/huodong.jpg"  width="175" height="140">
						<?php
						}
						?>
					</a>
				</div>
			</div>
			<div class="ll_right">
				<div class=title>
					<a title="<?php echo $record[$i]->short_title;?>" href="news.php?id=<?php echo $record[$i]->id;?>"><?php echo $record[$i]->short_title;?></a>
				</div>
				<div class="time">[<?php echo date_format($record[$i]->created_at,"Y-m-d H:i:s");?>]</div>
				<div class="click_count">点击次数:<?php echo $record[$i]->click_count;?></div>
				<?php if($record[$i]->guoqi!=''){ if(date_format($record[$i]->guoqi,'Y-m-d')<date("Y-m-d")){?>
				<div class="guoqi" style="margin-right:105px;  float:right;">已过期</div>
				<?php }else{
				?>
				<div class="guoqi" style="margin-right:105px;  float:right;"><img src="/images/new.gif"></div>
				<?php
					}
				}
				else{
				?>
				<div class="guoqi" style="margin-right:105px;  float:right;"><img src="/images/new.gif"></div>
				<?php
				}?>
				<div class="description">
					<a title="<?php echo strip_tags($record[$i]->description);?>" href="news.php?id=<?php echo $record[$i]->id;?>"><?php echo strip_tags($record[$i]->description);?></a>
				</div>
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
<script>
	$(function(){
		$(window.parent.document).find("#hd").hide();
	});
</script>