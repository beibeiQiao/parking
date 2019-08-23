<?php
include_once("loadin.php");
$id=$_GET['id'];
$query="select username,password,name,car_num,remainder from user where id=".$id;
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
list($username,$password,$name,$car_num,$remainder)=$row;
//print($username);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员-修改用户信息界面</title>
<style>
.form {
    margin:50px auto;
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

<body background="images/rawpixel-722816-unsplash.jpg" style="background-size:cover">
<div class="header" style="height:100px;background:#0B6C70;color:#FFFFFF;padding-top:5px;">
	<h1 align="center">管理员-修改用户信息界面</h1>
</div>
<div class="form">
<form id="form" name="form" method="post" action="saveuser.php?handle=1&id=<?php print($id);?>">
  <table width="100%" border="0">
     <input type="hidden" name="id" id="id" value="<?php print($id);?>">
      <tr>
        <td align="right">账号：</td>
        <td><?php print($username);?></td>
      </tr>
      <tr>
        <td align="right">密码：</td>
        <td><input type="password" name="password" id="password" value="<?php print($password);?>"></td>
      </tr>
      <tr>
        <td align="right">姓名：</td>
        <td><input type="text" name="name" id="name" value="<?php print($name);?>"></td>
      </tr>
      <tr>
        <td align="right">车牌号：</td>
        <td><input type="text" name="car_num" id="car_num" value="<?php print($car_num);?>"></td>
      </tr>
      <tr>
        <td align="right">余额：</td>
        <td><input type="text" name="remainder" id="remainder" value="<?php print($remainder);?>"></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" class="button" value="提  交"></td>
      </tr>
  </table>
</form>
</div>
<p align="center">当前时间：<?php echo date("Y-m-d H:i:s",time());?></p>
<footer style="position:fixed;left:350px;bottom:10px;">
       <p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
     </footer>
</body>
</html>
