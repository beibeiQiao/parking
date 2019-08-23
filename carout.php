<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>车辆出库</title>
<style>
.header{
height:100px;
background: #FFCC99;
color: #FFFFFF;
padding-top:5px;
}
.menu{
	width:500px; 
	height:350px;
	margin:0 auto;
	margin-top:80px;
	background-color:#FFFFFF;
	filter:alpha(Opacity=80);-moz-opacity:0.8;opacity: 0.8
}
.button{
width: 80px;
background-color:#FFCC99;
line-height: 25px;
font-size: 20px;
text-align: center;
font-weight: bold;
color:#FFFFFF;
}
</style>
</head>

<body background="images/out.jpg" style="background-size:cover">
<div class="header">
<h1 align="center">校园停车管理系统</h1>
</div>
  <hr>
<div class="menu">
  <h3 align="center">车辆出库</h3>
  <form id="form1" name="form1" method="post" action="out.php">
  <table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <td height="50" colspan="2" align="center">祝您出行愉快！</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>车牌号：</td>
      <td height="50" align="center" style="font-size: 18px"><input type="text" name="car_num_out" id="car_num_out"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="50" align="center" style="font-size: 18px"><button type="submit" class="button">提交</button>
        <button type="button" class="button"onClick="location.href='main.php'">返回</button></td>
      </td>
    </tr>
  </tbody>
</table>
</form>

<p align="center">当前时间：<?php
			  echo date("Y-m-d H:i:s",time());
			  ?></p>
</div>
 <footer style="margin-top:168px">
       <p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
     </footer>
</body>
</html>
