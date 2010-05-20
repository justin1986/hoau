<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select t1.id,t1.short_title,t1.created_at,t1.title from hoau_news t1 join hoau_category t2 on t1.category_id=t2.id where 1=1 and t1.is_adopt=1 and t2.name='礼品促销' order by priority asc,created_at desc";
	$record = $db->paginate($sql,10);
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
<div class="breadcum"><a href="/" target="_parent">首页</a> >> <a href="/schd/" target="_parent">市场活动</a> >> 礼品促销</div>
	<div id="title">礼品促销</div>
	<div id="list">
		<?php for($i=0;$i<count($record);$i++){
		?>
		<div class=list_line>
			<div class=title>
				<li><a title="<?php echo $record[$i]->title;?>" href="news.php?id=<?php echo $record[$i]->id;?>"><?php echo $record[$i]->short_title;?></a></li>
			</div>
			<div class=time>
				[<?php echo date_format($record[$i]->created_at,"Y-m-d H:i:s");?>]
			</div>
		</div>
		<?php
		} ?>
	</div>
	<div id=paginate><?php paginate();?></div>
</body>
</html>