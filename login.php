<?php
$username=$_POST["username"];
$password=$_POST["password"];
$identity=$_POST["identity"];
?>
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
  <?php
  $error=0;
  if($identity==1){
	  include_once("loadin.php");
	  $query="select * from admin";
	  $result=mysqli_query($link,$query);
	  	while($row=mysqli_fetch_array($result))
	{
		if($row[1]==$username&&$row[2]==$password)
		{
		?>
		<script> 
			window.location.href="admin.php"; 
		</script>
		<?php
		}
		else
		{
			$error=1;
		}
	}
	mysqli_close($link);
  }else{
	  include_once(loadin.php);
	  $query="select * from user";
	  $result=mysqli_query($link,$query);
	  	while($row=mysqli_fetch_array($result))
	{
		if($row[1]==$username&&$row[2]==$password)
		{
		?>
		<script> 
			window.location.href="user.php"; 
		</script>
		<?php
		}
		else
		{
			$error=1;
		}
	}
	mysqli_close($link);
  }
  ?>
<div class="menu">
  <p align="center">用户登录界面</p>
  <form id="form1" name="form1" method="post">
  <table width="60%" border="0" align="center">
  <tbody>
  <?php if($error==1)
		{	
		?>
      <tr>
        <td colspan="2" align="center" bgcolor="#FB5255"><?php print("用户名或密码错误！请重新输入！");?></td>
      </tr>
      <?php
		} 
		?>
    <tr>
      <td>用户名：</td>
      <td height="50" align="center" style="font-size: 18px"><input type="text" name="username" id="username"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>密码：</td>
      <td height="50" align="center" style="font-size: 18px"><input type="password" name="password" id="password"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>身份：</td>
      <td height="50" align="center" style="font-size: 18px"><p>
        <label>
          <input name="identity" type="radio" id="identity_0" value="1" checked="checked">
          管理员</label>
        <label>
          <input type="radio" name="identity" value="2" id="identity_1">
          用户</label>
        <br>
      </p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="50" align="center" style="font-size: 18px"><input type="submit" name="submit" id="submit" value="提交">  &nbsp;
         <input type="button" name="button" id="button" onclick="location.href='main.php'" value="返回"></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>
<p align="center">当前时间：<?php
			  echo date("Y-m-d H:i:s",time());
			  ?></p>
</div>
 <footer style="margin-top:169px">
       <p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
     </footer>
</body>
</html>
