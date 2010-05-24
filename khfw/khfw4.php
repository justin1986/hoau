<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select * from hoau_contraband where 1=1 and is_adopt=1 order by created_at desc";
	$record = $db->paginate($sql,10);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('breadcom');
		use_jquery();
		js_include_tag('top');
	?>
	<style type="text/css">
<!--
.STYLE2 {
	font-size: 12px;
	color: #FF9900;
}
.STYLE3 {
	font-size: 12px;
	color: #999999;
}
.STYLE4 {
	margin-left:40px;
	font-size: 12px;
	color: #999999;
	float:left; 
	display:inline;
}
-->
</style>
</head>
<body>
	<div id="title" style='width:586px; height:41px; padding-left:55px; line-height:30px; font-size:14px; font-weight:bolder; color:#F76300; background:url("/images/icon/khfw.gif") no-repeat; float:left; display:inline;'><div style="float:left">禁运货物查询</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > <a href="khfw4.php" class="a2">禁运货物查询</a></div>
	</div>
	<div style="margin-top:15px; margin-left:40px; margin-bottom:10px; float:left; display:inline;">
		<img src="/images/cpfw/menu.jpg" width="589" height="21">
	</div>
	<div class="STYLE4"><b><font color="#ff9900">禁止运输货物</font>是指交通部禁止公路运输及集团公司禁止运输的货物</b></div>
    <table width="600" border="0" style="margin-left:40px; float:left;" align="center" cellpadding="5" cellspacing="5">
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【贵重物品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">货币及有价证券、邮票、金银、珠宝、钻石、玉器、古玩、古币、古书、古画、艺术作品。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【工艺品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">易碎工艺品、古董、各种收藏物品。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【军用物品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">枪支、雷管、导火索、炸药、子弹等。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【鲜活物品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">各种活牲畜、活禽、活虾、活鱼、鱼苗、供观赏的野生动物、供观赏的水生动物、盆景及各种名贵花木及植物、鸡蛋、蔬菜、瓜果。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【特殊要求的食品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">保鲜、保温、保质期时间较短的食品。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【冰制品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">天然冰机制冰、冰淇淋、冰棍。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【计算机软件内存】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">媒介中存储的各类数据及信息。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【烟制品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">各种卷烟。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【污染品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">颜料、染料、油墨、焦炭末、炭黑、铅粉、锰粉、其它污染人体的货物、角、蹄甲、牲骨、死禽兽。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【泄漏品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">带有残留污油的旧机械配件和设备、旧汽车发动机、旧变速箱、渗漏或泄漏的污油污染环境和其他货物液压件及机床等。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【有毒有害物品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">放射性、核材料、酸、碱性及腐蚀物品、剧毒物品。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【易燃易爆物品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">蓄电池、石油焦、沥青、防腐涂料、自喷漆、碧丽珠、啫喱水、水剂农药及兽药、氧化剂、压缩气体、液化气体、自燃物品、遇水燃烧物品、易燃液体、易燃固体、爆炸品、疑似易燃易爆物品等。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【化工、油品】</td>
      </tr>
      <tr>
        <td><span class="STYLE3">香精、香料、樟脑油、芳香油、木榴油、木腊、橡蜡、树胶、橡胶、食品和饲料添加剂、溶剂、试剂、助剂、涂料、胶粘剂等。</span></td>
      </tr>
	  <tr>
        <td rowspan="2" valign="top"><img src="/images/cpfw/jiant.gif" width="12" height="10" /></td>
        <td class="STYLE2">【搬家物品、家具、胶辊】</td>
      </tr>
    </table>
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