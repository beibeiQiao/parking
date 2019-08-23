<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>车辆入库</title>
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

<body background="images/in.jpg" style="background-size:cover">
<div class="header">
<h1 align="center">校园停车管理系统</h1>
</div>
  <hr>
<div class="menu">
  <h3 align="center">车辆入库</h3>
  <p align="center">
  <?php
	include_once("loadin.php");
	  	$query="select * from parking_information";
	  	$result=mysqli_query($link,$query);
		while($row=mysqli_fetch_array($result))
		{
			$have_num=$row[1];
			$user_num=$row[2];
			$surplus_num=$row[3];
		}
		print("拥有车位：".$have_num."   已占用：".$user_num."   剩余：".$surplus_num);
		mysqli_close($link);
	?>
    </p>
    <?php
	if($surplus_num!=0)		
	{
 ?>
  <form id="form1" name="form1" method="post" action="in.php">
  <table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <td>车牌号：</td>
      <td height="50" align="center" style="font-size: 18px"><input type="text" name="car_num_in" id="car_num_in"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>车型：</td>
      <td height="50" align="center" style="font-size: 18px"><p>
        <label>
          <input name="car_style" type="radio" id="car_style_0" value="1" checked="checked">
          小型车</label>
        <label>
          <input type="radio" name="car_style" value="2" id="car_style_1">
          大型车</label>
      </p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="50" align="center" style="font-size: 18px"><button type="submit" class="button">提交</button>
        <button type="button" class="button"onClick="location.href='main.php'">返回</button></td>
      </td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>
<?php
	}else{
		?>
        <h2 align="center">车位已用完！</h2>
		<?php
	}
?>
<p align="center">当前时间：<?php
			  echo date("Y-m-d H:i:s",time());
			  ?></p>
</div>
 <footer style="margin-top:168px">
       <p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
     </footer>
</body>
</html>
