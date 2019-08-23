<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>校园停车管理系统</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
<div class="header">
<h1 align="center">校园停车管理系统</h1>
</div>
  <hr>
<div class="menu">
  <table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <td height="70" align="center" style="font-size: 24px">菜单</td>
      </tr>
    <tr>
      <td height="50" align="center" style="font-size: 18px"><button type="button" class="button"onClick="location.href='login.php'">登录</button></td>
      </tr>
    <tr>
      <td height="50" align="center" style="font-size: 18px"><button type="button" class="button"onClick="location.href='carin.php'">车辆入库</button></td>
      </tr>
    <tr>
      <td height="50" align="center" style="font-size: 18px"><button type="button" class="button"onClick="location.href='carout.php'">车辆出库</button></td>
      </tr>
  </tbody>
</table>
<p align="center">当前时间：<?php
			  echo date("Y-m-d H:i:s",time());
			  ?></p>
</div>
 <footer style="margin-top:125px">
       <p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
     </footer>
</body>
</html>
