<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员-增加用户界面</title>
<style>
.form {
    margin:auto;
	max-width: 500px;
	background: #F7F7F7;
	padding: 25px 15px 25px 10px;
	font: 12px Georgia, "Times New Roman", Times, serif;
	color: #888;
	text-shadow: 1px 1px 1px #FFF;
	border:1px solid #E4E4E4;
	filter:alpha(Opacity=50);-moz-opacity:0.8;opacity: 0.8
}
.form input{
	border: 1px solid #DADADA;
	color: #888;
	height: 30px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 3px 3px 3px 5px;
	width: 70%;
	font-size: 12px;
	line-height:15px;
	box-shadow: inset 0px 1px 4px #ECECEC;
	-moz-box-shadow: inset 0px 1px 4px #ECECEC;
	-webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}
.form .button {
	background: teal;
	border: none;
	padding: 10px 25px 10px 25px;
	color:aliceblue;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}
</style>
</head>

<body background="images/rawpixel-722816-unsplash.jpg" style="background-size:100% 100%">
<div class="header" style="height:100px;background:#0B6C70;color:#FFFFFF;padding-top:5px;">
	<h1 align="center">管理员-增加用户界面</h1>
</div>
<hr>
<div>
<div class="form">
	<form id="form" name="form" method="post" action="saveuser.php">
	  <table align="center" width="50%" border="0">
		<tbody>
		  <tr height="50px">
			<td align="right">账号：</td>
			<td><input type="text" name="username" id="username" placeholder="账号eg:s16046025"></td>
		  </tr>
		  <tr height="50px">
			<td align="right">密码：</td>
			<td><input type="password" name="password" id="password" placeholder="密码eg:16046025"></td>
		  </tr>
		  <tr height="50px">
			<td align="right">姓名：</td>
			<td><input type="text" name="name" id="name" placeholder="姓名/昵称"></td>
		  </tr>
		  <tr height="50px">
			<td align="right">车牌号:</td>
			<td><input type="text" name="car_num" id="car_num" placeholder="车牌号eg:京A12345"></td>
		  </tr>
		  <tr height="50px">
			<td align="right">卡余额:</td>
			<td><input type="text" name="remainder" id="remainder" value="99.0" placeholder="卡余额eg:99.0"></td>
		  </tr>
		  <tr height="50px">
			<td align="right">&nbsp;</td>
			<td><input type="submit" name="submit" id="submit" class="button" value="提 交">
		    <input type="reset" name="reset" id="reset"  class="button" value="重置"></td>
		  </tr>
		</tbody>
	  </table>
	</form>
	</div>
  <p align="center">当前时间：<?php echo date("Y-m-d H:i:s",time());?></p>
</div>
<footer>
	<p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
</footer>
</body>
</html>
