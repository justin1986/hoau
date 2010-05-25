<?php require_once('../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>天地华宇-大客户运单查询</title>
<?php use_jquery();?>
</script><script src="image/dkh.js" type="text/javascript"></script>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td height="75" width="200"><a linkindex="0" href="http://www.hoau.net/"><img alt="hoau" src="image/logo1.jpg" border="0" hspace="10"></a></td>
			<td style="background: url(image/header_home1.jpg) no-repeat scroll 0% 0% transparent;"></td>
		</tr>
		<tr>
			<td colspan="2" valign="bottom">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><img alt="" src="image/spacer.htm" border="0" height="1" width="1"></td>
		</tr>
		<tr>
			<td colspan="2" bgcolor="#999999"><img alt="" src="image/spacer.htm" border="0" height="1" width="1"></td>
		</tr>
	</tbody>
</table>
<table style="width: 100%; height: 350px;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td style="padding-left: 10px; padding-top: 5px;" valign="top">
				<table border="0" cellpadding="0" cellspacing="0" width="210">
					<tbody>
						<tr>
							<td background="image/login_header.gif"><span>HOAU</span></td>
						</tr>
						<tr>
							<td>
								<table bgcolor="#eeeeee" cellpadding="2" cellspacing="0" width="100%">
									<tbody id="left">
										<?php if(isset($_SESSION['dkh'])){
										?>
										<tr>
											<td colspan="2" align="right" width="96%">
												<p align="left"><font size="2">登录公司: </font> </p>
											</td>
										</tr>
										<tr>
											<td colspan="2" style="height: 20px;" align="right">
												<p align="left"> <span id="currentCompany"><font color="#0000c0"><?php echo $_SESSION['dkh_name'];?></font></span></p>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="left" width="96%"> <font size="2">登录时间:</td>
										</tr>
										<tr>
											<td colspan="2" align="right" width="96%">
												<p align="left"> <span id="loginTime"><font color="MediumBlue"><?php echo $_SESSION['dkh_date'];?></font></font></span>&nbsp;</p>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="right" height="30" width="96%">
												<p align="left"> <font color="#ff0000" size="2">请选择查询方式</font></p>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="left" width="27%">&nbsp;&nbsp; <span>
												<input id="RadioButton2" name="xz" value="RadioButton2" type="radio">
												<label for="RadioButton2">按订单号查询</label>
												</span></td>
										</tr>
										<tr>
											<td colspan="2" align="left" width="27%">&nbsp;&nbsp; <span>
												<input id="RadioButton1" name="xz" value="RadioButton1" checked="checked" type="radio">
												<label for="RadioButton1">按运单编号查询</label>
												</span></td>
										</tr>
										<tr>
											<td colspan="2" align="right" width="96%">
												<p align="left"> <span id="Label3"><font color="Red">请输入运单编号或订单号:</font></span>&nbsp;<font face="宋体" size="2"><br>
													(多个单号请用回车分隔)</font></p>
											</td>
										</tr>
										<tr>
											<td colspan="2" width="96%"><font face="宋体">&nbsp;</font>
												<textarea id="queryId"></textarea>
												&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" align="center" width="96%">
												<input name="Button2" value="查  询" id="search" type="button">
												<input name="Button1" value="重  置" id="reset" type="button">
												<input name="Button2" value="注　销" id="logout" type="button">
											</td>
										</tr>
										<tr>
											<td colspan="2" align="center" height="64"><font face="宋体"></font> </td>
										</tr>
										<?php
										}else{?>
										<tr>
											<td colspan="2">&nbsp;</td>
										</tr>
										<tr>
											<td align="right"><span style="font-size:13px">用户名：</span></td>
											<td>
												<input id="name" style="width:150px;" type="text" maxlength="20">
											</td>
										</tr>
										<tr>
											<td	 align="right"><span style="font-size:13px">密　码：</span></td>
											<td>
												<input id="password" style="width:150px;" type="password" maxlength="20">
											</td>
										</tr>
										<tr>
											<td style="height: 22px;" colspan="2" align="right">
												<input value="登录" id="button" type="submit">&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" align="center" height="200">
												<font face="宋体">
													<img style="width: 126px; height: 198px;" alt="hoau" src="image/ll.jpg" designtimedragdrop="433" border="0" height="198" hspace="10" width="126">
												</font>
											</td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td><img alt="" src="image/login_bottom.gif" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td style="padding-right: 10px; padding-left: 10px; padding-top: 5px;" align="center" valign="top">
				<table border="0" cellpadding="0" cellspacing="0" width="600">
					<tbody>
						<tr>
							<td>
								<table style="height: 300px;" width="100%">
									<tbody id="search_box">
										<tr>
											<td class="welcome" align="center">
												<p><b><font color="#f26c17" size="5">Welcome to HOAU&nbsp; </font></b> </p>
												<p><b><font color="#f26c17" size="5"><br>
													&nbsp;大客户运单跟踪记录</font></b></p>
											</td>
										</tr>
										<tr>
											<td align="left"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td ><img src="image/header_bullet.gif">&nbsp;&nbsp;HOAU</td>
						</tr>
						<tr>
							<td background="image/h_dotted_orange_border.gif" height="1" valign="top"></td>
						</tr>
						<tr>
							<td><font face="宋体"></font></td>
						</tr>
						<tr>
							<td><br>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
			<td valign="top"><img style="background-attachment: scroll; background-image: url(&quot;images/h_dotted_orange_border.gif&quot;); background-repeat: repeat-y;" border="0" height="100%" width="1"></td>
			<td valign="top">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td valign="top">
								<table align="center" border="0" cellpadding="2" cellspacing="2" width="95%">
									<tbody>
										<tr>
											<td><img alt="" src="image/header_bullet.gif" border="0"> &nbsp; </td>
										</tr>
										<tr>
											<td background="image/h_dotted_orange_border.gif" height="1" valign="top"><font face="宋体"></font></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>
