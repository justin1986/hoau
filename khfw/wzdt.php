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
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('breadcom');
		use_jquery();
		js_include_tag('top');
	?>
	<style type="text/css">
	<!--
	a{color:#666666; text-decoration:none;}
	.STYLE2 {
		font-size: 13px;
		font-weight: bold;
		color: #CCCCCC;
	}
	.STYLE4 {
		font-size: 13px;
		color: #666666;
	}
	.td_style{ border-bottom:1px dashed #CCCCCC; height:25px;
	}
	.STYLE6 {font-size: 13px; color: #666666; font-weight: bold; }
	
	.STYLE0 {font-size:12px; font-family:"黑体";}
	.STYLE0 a{color:#000000;}
	-->
</style>
</head>
<body>
	<div id="title" style='width:586px; height:41px; padding-left:55px; line-height:30px; font-size:14px; font-weight:bolder; color:#F76300; background:url("/images/icon/khfw.gif") no-repeat; float:left; display:inline;'><div style="float:left">网站地图</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > 网站地图</div>
	</div>
    <table style="margin-left:25px;" border="0" align="left">
			  <tr bordercolor="#FFFFFF">
			    <td width="557" align="left" class="td_style"><span class="STYLE6"><a target="_parent" href="/">首页</a></span></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/drd/">定日达</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/drd/index.php?id=0">定日达首页</a>
					<a target="_parent" href="/drd/index.php?id=1">附加值服务介绍</a>
					<a target="_parent" href="/drd/index.php?id=2">定日达市场活动</a>
					<a target="_parent" href="/drd/index.php?id=3">线路价格查询</a>
					<a target="_parent" href="/drd/index.php?id=4">相关政策</a>
					<a target="_parent" href="/drd/index.php?id=5">问卷调查</a>
				</td>
		      </tr>
			   <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/cpfw/">产品服务</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/cpfw/index.php?id=0">定日达</a>
					<a target="_parent" href="/cpfw/index.php?id=2">公路零担</a>
					<a target="_parent" href="/cpfw/index.php?id=1">整车特运</a>
					<a target="_parent" href="/cpfw/index.php?id=3">附加值服务</a>
					<a target="_parent" href="/cpfw/index.php?id=5">国际快递</a>
				</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/khfw/">客户服务</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/khfw/index.php?id=2">客户留言</a>
					<a target="_parent" href="/khfw/index.php?id=3">资料下载</a>
					<a target="_parent" href="/khfw/index.php?id=4">违禁品查询</a>
					<a target="_parent" href="/khfw/index.php?id=0">常见问题解答</a>
					<a target="_parent" href="/khfw/?load=khfw1.php">网点查询</a>
					<a target="_parent" href="/khfw/?load=hwzz.php">货物追踪</a>
				</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/schd/">市场活动</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/schd/index.php?id=0">定日达促销</a>
					<a target="_parent" href="/schd/index.php?id=1">市场推广</a>
				</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/xwzx/">新闻中心</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/xwzx/index.php?id=0">华宇动态</a>
					<a target="_parent" href="/xwzx/index.php?id=1">华宇公告</a>
					<a target="_parent" href="/xwzx/index.php?id=2">物流资讯</a>
					<a target="_parent" href="/xwzx/index.php?id=3">新闻专题</a>
					<a target="_parent" href="/xwzx/index.php?id=4">定日达特讯</a>
				</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/rczp/">人才招聘</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/rczp/index.php?id=0">社会招聘</a>
					<a target="_parent" href="http://www.hoau.net/hoauii_zp/index.aspx">校园招聘</a
				</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4"><strong><a target="_parent" href="/rczp/">关于我们</a></strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td align="left" class="STYLE4 td_style STYLE0">
			    	<a target="_parent" href="/gywm/index.php?id=0">总裁致辞</a>
					<a target="_parent" href="/gywm/index.php?id=1">企业简介</a>
					<a target="_parent" href="/gywm/index.php?id=2">大事记</a>
					<a target="_parent" href="/gywm/index.php?id=3">资质荣誉</a>
					<a target="_parent" href="/gywm/index.php?id=4">社会责任</a>
					<a target="_parent" href="/gywm/index.php?id=5">联系方式</a>
				</td>
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