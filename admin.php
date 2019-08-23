<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员界面</title>
<style>
.button{
width: 140px;
background-color: teal;
line-height: 50px;
font-size: 20px;
text-align: center;
font-weight: bold;
color:aliceblue;
text-shadow:1px 1px 1px #333;
border-radius: 5px;
margin:0 20px 20px 0;
position: relative;
overflow: hidden;
}
</style>
</head>

<body background="images/rawpixel-722816-unsplash.jpg" style="background-size:100% 100%">
<div class="header" style="height:100px;background:#0B6C70;color:#FFFFFF;padding-top:5px;">
<h1 align="center">管理员界面</h1>
</div>
  <hr>
<div class="function">
  <table width="50%" border="0" align="center" style="margin:110px 400px">
  <tbody>
    <tr>
      <td><button type="button" class="button"onClick="location.href='userlist.php'">查看用户列表</button></td>
      <td><button type="button" class="button" onClick="location.href='adduser.php'">增加用户</button></td>
      </tr>
      <tr>
      <td><button type="button" class="button"onClick="location.href='carport.php'">查看车库信息</button></td>
      <td><button type="button" class="button"onClick="location.href='modifycarport.php'">修改车库信息</button></td>
    </tr>
    <tr></tr><tr></tr>
  </tbody>
</table>
<p align="center">当前时间：<?php
			  echo date("Y-m-d H:i:s",time());
			  ?></p>
</div>
 <footer style="margin-top:100px">
       <p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
     </footer>
</body>
</html>
