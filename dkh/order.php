<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=GB2312">
<title>运单查询结果</title>
<meta name="GENERATOR" content="Microsoft Visual Studio .NET 7.1">
<meta name="CODE_LANGUAGE" content="Visual Basic .NET 7.1">
<meta name="vs_defaultClientScript" content="JavaScript">
<meta name="vs_targetSchema" 
content="http://schemas.microsoft.com/intellisense/ie5">
<style type="text/css">
@import url( css/site.css ); 
		</style>
</head>
<body ms_positioning="GridLayout">
<form name="frmMain" method="post" action="orderQuery.aspx" 
id="frmMain">
	<input name="__VIEWSTATE" 
value=""
 type="hidden">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td height="75" width="200"><a linkindex="0" 
href="http://www.hoau.net/"><img alt="hoau" 
src="image/logo1.jpg" border="0" hspace="10"></a></td>
				<td style="background: url(&quot;images/header_home1.jpg&quot;) 
no-repeat scroll 0% 0% transparent;"><img alt="hoau" style="display: 
none;" border="0"></td>
			</tr>
			<tr align="left">
				<td colspan="2" align="right" valign="bottom">&nbsp; <font face="宋体">&nbsp;
					<input name="Button4" value="注销" id="Button4" type="submit">
					</font></td>
			</tr>
			<tr>
				<td colspan="2"><img alt="" src="image/spacer.htm"
 border="0" height="1" width="1"></td>
			</tr>
			<tr>
				<td colspan="2" bgcolor="#999999"><img alt="" 
src="image/spacer.htm" border="0" height="1" width="1"></td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%; height: 790px;" border="0" cellpadding="0"
 cellspacing="0">
		<tbody>
			<tr>
				<td style="padding-left: 10px; padding-top: 5px; height: 724px;" 
valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="210">
						<tbody>
							<tr>
								<td class="uiLoginHeader" 
background="image/login_header.gif"> <span id="Label1" class="title">HOAU</span></td>
							</tr>
							<tr>
								<td>
									<table class="uiLoginBox" bgcolor="#eeeeee" cellpadding="2" 
cellspacing="0" width="100%">
										<tbody>
											<tr>
												<td class="uiFormLabel" colspan="2" align="right" 
width="96%">
													<p align="left"><font size="2">登录公司: </font> </p>
												</td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" style="height: 20px;" 
align="right">
													<p align="left"> <span id="currentCompany"><font color="#0000c0">通用电气（中国）
														有限公司</font></span></p>
												</td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="left" 
width="96%"> <font size="2">登录时间:</font></td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="right" 
width="96%">
													<p align="left"> <span id="loginTime"><font color="MediumBlue">2010-5-24 
														11:21:32</font></span>&nbsp;</p>
												</td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="right" 
height="30" width="96%">
													<p align="left"> <font color="#ff0000" size="2">请选择查询方式</font></p>
												</td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="left" 
width="27%">&nbsp;&nbsp; <span>
													<input id="RadioButton2" name="xz" 
value="RadioButton2" type="radio">
													<label for="RadioButton2">按订单号查询</label>
													</span></td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="left" 
width="27%">&nbsp;&nbsp; <span>
													<input id="RadioButton1" name="xz" 
value="RadioButton1" checked="checked" type="radio">
													<label 
for="RadioButton1">按运单编号查询</label>
													</span></td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="right" 
width="96%">
													<p align="left"> <span id="Label3"><font color="Red">请输入运单编号或订单号:</font></span>&nbsp;<font
 face="宋体" size="2"><br>
														(多个单号请用回车分隔)</font></p>
												</td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" width="96%"><font 
face="宋体">&nbsp;</font>
													<textarea name="queryId" id="queryId">00856337
</textarea>
													&nbsp;</td>
											</tr>
											<tr>
												<td class="uiFormLabel" colspan="2" align="center" 
width="96%">
													<input name="Button2" value="查  询" id="Button2" 
type="submit">
													<font face="宋体">&nbsp;</font>
													<input name="Button1" value="重  置" id="Button1" 
type="submit">
													&nbsp;</td>
											</tr>
											<tr>
												<td colspan="2" align="center" height="64"><font face="宋体"></font> </td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td><img alt="" src="image/login_bottom.gif" 
style="width: 224px; height: 25px;" border="0" height="25" width="224"></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td style="padding-right: 10px; padding-left: 10px; padding-top: 
1px; height: 699px;" align="center" valign="top">
					<table border="0" cellpadding="0" cellspacing="0" height="492" 
width="600">
						<tbody>
							<tr>
								<td>
									<table style="height: 357px;" width="100%">
										<tbody>
											<tr>
												<td class="welcome" style="height: 20px;" align="center" 
valign="top"> <span id="Label2"><b><font color="Red" size="6">运单跟踪查询</font></b></span> </td>
											</tr>
											<tr>
												<td class="welcome" align="center"> <span id="result" disabled="disabled"><b>运单跟踪查询结果</b></span></td>
											</tr>
											<tr>
												<td class="welcome" align="center">
													<p align="left"> <span id="message1"><font color="Red">运单信息</font></span>&nbsp;</p>
												</td>
											</tr>
											<tr>
												<td class="welcome" align="center">
													<table id="DataGrid1" style="font-size: 12px;" 
bgcolor="LightGoldenrodYellow" border="0" bordercolor="Tan" 
cellpadding="2" cellspacing="0" width="872">
														<tbody>
															<tr bgcolor="Tan">
																<td><font color="Black"><b>运单编号</b></font></td>
																<td><font color="Black"><b>订
																	单号</b></font></td>
																<td><font color="Black"><b>件数</b></font></td>
																<td><font
 color="Black"><b>体积</b></font></td>
																<td><font color="Black"><b>货物名称</b></font></td>
																<td><font
 color="Black"><b>起运地</b></font></td>
																<td><font color="Black"><b>目的地</b></font></td>
																<td><font
 color="Black"><b>托运时间</b></font></td>
																<td><font color="Black"><b>收货人单位</b></font></td>
																<td><font
 color="Black"><b>收货人</b></font></td>
																<td><font color="Black"><b>收货人电话</b></font></td>
																<td><font
 color="Black"><b>收货人地址</b></font></td>
															</tr>
															<tr>
																<td><font color="Black">00856337</font></td>
																<td><font color="Black">2856668</font></td>
																<td><font
 color="Black">2</font></td>
																<td><font color="Black">0</font></td>
																<td><font
 color="Black">LOGIQ P5</font></td>
																<td><font color="Black">宁波</font></td>
																<td><font
 color="Black">诸暨</font></td>
																<td><font color="Black">2010-2-4 15:02:00</font></td>
																<td><font
 color="Black">诸暨市草塔镇中心卫生院 </font></td>
																<td><font color="Black">何院长</font></td>
																<td><font
 color="Black">无</font></td>
																<td><font color="Black">诸暨市草塔镇</font></td>
															</tr>
														</tbody>
													</table>
													 </td>
											</tr>
											<tr>
												<td class="welcome" style="height: 21px;" align="center">
													<p align="left"> <span id="message2"><font color="Red">运单跟踪信息</font></span>&nbsp;</p>
												</td>
											</tr>
											<tr>
												<td class="welcome" align="center">
													<table id="DataGrid2" style="font-size: 12px;" 
bgcolor="LightGoldenrodYellow" border="0" bordercolor="Tan" 
cellpadding="2" cellspacing="0" width="872">
														<tbody>
															<tr bgcolor="Tan">
																<td><font color="Black"><b>运单编号</b></font></td>
																<td><font color="Black"><b>订
																	单号</b></font></td>
																<td><font color="Black"><b>时间</b></font></td>
																<td><font
 color="Black"><b>事件</b></font></td>
																<td><font color="Black"><b>事件公司</b></font></td>
																<td><font
 color="Black"><b>跟踪信息</b></font></td>
															</tr>
															<tr>
																<td><font color="Black">00856337</font></td>
																<td><font color="Black">2856668</font></td>
																<td><font
 color="Black">2010-2-4 15:02:00</font></td>
																<td><font color="Black">开单</font></td>
																<td><font
 color="Black">N宁波10</font></td>
																<td><font color="Black">&nbsp;</font></td>
															</tr>
															<tr bgcolor="PaleGoldenrod">
																<td><font color="Black">00856337</font></td>
																<td><font color="Black">2856668</font></td>
																<td><font
 color="Black">2010-2-7 16:24:00</font></td>
																<td><font color="Black">签收</font></td>
																<td><font
 color="Black">N杭州21</font></td>
																<td><font color="Black"> 签收人:何传坤 签收信息: 
																	证件号:330602197107040517</font></td>
															</tr>
														</tbody>
													</table>
													 </td>
											</tr>
											<tr>
												<td class="welcome" align="center"><font face="宋体"> &nbsp;&nbsp;</font> <font face="宋体">&nbsp; </font>&nbsp; <font face="宋体">&nbsp; </font></td>
											</tr>
											<tr>
												<td class="WelContent" align="left">&nbsp; </td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td class="WelTitle"><img 
src="image/header_bullet.gif">&nbsp;&nbsp;HOAU</td>
							</tr>
							<tr>
								<td 
background="image/h_dotted_orange_border.gif" height="1"
 valign="top"><font face="宋体"></font></td>
							</tr>
							<tr>
								<td class="WelContent"> </td>
							</tr>
							<tr>
								<td><br>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td style="height: 724px;" valign="top"><img 
style="background-attachment: scroll; background-image: 
url(&quot;images/h_dotted_orange_border.gif&quot;); background-repeat: 
repeat-y;" border="0" height="100%" width="1"></td>
				<td style="height: 724px;" valign="top">
					<table border="0" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td valign="top">&nbsp; </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- END CONTENT -->
</form>
</body>
</html>
