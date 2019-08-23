<?php
$car_num_in=$_POST["car_num_in"];
$car_style=$_POST["car_style"];
?>
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
</style>
</head>

<body background="images/in.jpg" style="background-size:cover">
<?php
	$tt=date("Y-m-d H:i:s", time());
?>
<?php
    $flag=0;
	//获取停车单价
	include_once("loadin.php");
	$query="select * from parking_information";
	$result=mysqli_query($link,$query);
	while($row=mysqli_fetch_array($result))
	{
		$unit_price_car=$row[4];
		$unit_price_truck=$row[5];
	}
	//mysqli_close($link);
	
	if($car_style==1)
	{
		$price=$unit_price_car;
		$style="小型车";
	}
	else
	{
		$price=$unit_price_truck;
		$style="大型车";
	}
	//include_once("loadin.php");
	$query="select * from user";
	$result=mysqli_query($link,$query);
	while($row=mysqli_fetch_array($result))
	{
		if($row[4]==$car_num_in) $flag=1;
	}
	//mysqli_close($link);
	if($flag!=0)
	{
		//include_once("loadin.php");
		$leave_a=0;
		$query="insert into stop_information(name,in_time,car_style,leave_a)values('".$car_num_in."','".$tt."','".$car_style."','".$leave_a."')";
		$rel=mysqli_query($link,$query);

		//更新车位信息
		$query="select * from parking_information";
		$result=mysqli_query($link,$query);
		while($row=mysqli_fetch_array($result))
		{
			$have_num=$row[1];
			$user_num=$row[2];
			$surplus_num=$row[3];
		}
		$user_num=$user_num+1;
		$surplus_num=$surplus_num-1;
		mysqli_query($link,$query);
		$query="update parking_information set user_num='".$user_num."' where id=1";
		//print($query);
		mysqli_query($link,$query);
		$query="update parking_information set surplus_num='".$surplus_num."' where id=1";
		//print($query);
		mysqli_query($link,$query);
		mysqli_close($link);
	}
?>
<div class="header">
<h1 align="center">校园停车管理系统</h1>
</div>
  <hr>
<div class="menu">
  <h3 align="center">入库信息</h3>
  <?php
	if($flag!=0)		
	{
 ?>
  <table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <td>车牌号：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($car_num_in."<br />\n");
		?></td>
      </tr>
    <tr>
      <td>入库时间：</td>
      <td height="50" align="center" style="font-size: 18px"> <?php
			print($tt."<br />\n");
		?></td>
      </tr>
    <tr>
      <td>车型：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($style);
			?>	</td>
      </tr>
    <tr>
      <td>单价：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($price);
			?>元/时</td>
      </tr>
  </tbody>
</table>
<?php
	}else{
		?>
  <h2 align="center">非本校职工不能使用车位！</h2>
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
