<?php
    require_once('../frame.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('rczp/rczp','breadcom');
	?>
</head>
<body>
<div id="title"><div style="float:left">社会招聘</div>
	<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/rczp/" target="_parent">投资于人</a> > <a href="" class="a2">社会招聘</a></div>
</div>
<div id="shuom">TNT 集团是全国领先的快递邮政服务供应商，为企业和个人客户提供全方位的快递和邮政服务。总部位于荷兰的TNT集团，在欧洲和亚洲提供高效的递送网络，并且正通过在全球范围内扩大运营分布来最大幅度的优化网络效能。TNT拥有163,000名员工，分布在200多个国家和地区。2008年，集团收入为111亿欧元，营业收入为9.82亿欧元，是全球第一家获得“投资于人”认证的快递企业。
<br>TNT于2007年3月14日成功收购全国最大物流公司华宇集团，于2009年2月16日宣布收购成功。<br>
<br>在天地华宇，我们坚信“人员、客户、专业化”三位一体的管理架构，奉行“投资于人”的企业文化。<br>
<br>人员→   员工满意度是我们一切成功的根本保证<br>
客户→   客户满意度是检验我们一切工作的标准<br>
专业化→ 专业化是保证我们服务质量的必由之路<br><br>
天地华宇持续推行“尊重、务实、敬业、诚信”的核心价值观，大力提倡“唯才是用”的绩效文化，让所有员工都感受到尊重。在决策之间有充分的发言权、决策后强调坚决的执行力，从而来更好地凝聚每一位天地华宇的员工、在这一价值观的引导下，天地华宇逐步完善了员工管理和福利制度，同时通过建立系统科学的核心能力体系和培训架构，着力打造积极向上，不断发展的学习性组织。
</div>
<div id="a_title"><img src="/images/icon/rc1.gif"><span style="margin-left:5px;">招聘职位</span></div>
<div id="box">
<?php 
	$db = get_db();
	$sql = "select id,name from hoau_position where 1=1 order by priority asc";
	$record = $db->paginate($sql,10);
	for($i=0;$i<count($record);$i++){
?>
<div class="line<?php if($i%2==1)echo 2;?>" <?php if($i==(count($record)-1)){?>style="border-bottom:1px dotted #CCCCCC;"<?php }?>>
	<img class="img1" src="/images/icon/rc2.gif">
	<span style="margin-left:15px; float:left; display:inlne;"><?php echo $record[$i]->name;?></span>
	<span style="margin-top:4px; margin-right:10px; float:right; display:inline"><a href="zw.php?id=<?php echo $record[$i]->id;?>"><img src="/images/icon/xx.gif" border="0"></a></span>
</div>
<?php
	}
?>
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
