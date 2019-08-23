<?php
$car_num_out=$_POST["car_num_out"]
?>
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
	height:500px;
	margin:0 auto;
	margin-top:80px;
	background-color:#FFFFFF;
	filter:alpha(Opacity=80);-moz-opacity:0.8;opacity: 0.8
}
</style>
</head>

<body background="images/out.jpg" style="background-size:cover">
<?php
	//获得离开时间
	$tt=date("Y-m-d H:i:s", time());
	$rel=0;
?>
<?php
//获取停车单价
	include_once("loadin.php");
	$query="select * from parking_information";
	$result=mysqli_query($link,$query);
	while($row=mysqli_fetch_array($result))
	{
		$unit_price_car=$row[4];
		$unit_price_truck=$row[5];
	}
	$query="update stop_information set out_time='".$tt."' where name='".$car_num_out."'";
	mysqli_query($link,$query);
	
//从数据库获取停车信息
	$query="select * from stop_information";
	$result=mysqli_query($link,$query);
	while($row=mysqli_fetch_array($result))
	{
		if($row[1]==$car_num_out)
		{
			$in_time=$row[2];
			$out_time=$row[3];
			$car_style=$row[6];
			$rel=1;
		}
	}
	//mysqli_close($link);
	
	if($rel==1)
	{
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
		//计算停车时长
		$time1 = strtotime($out_time);
		$time2 = strtotime($in_time);
		$long = $time1 - $time2;  
		$days = intval( $long / 86400 );  
		$remain = $long % 86400;  
		$hours = intval( $remain / 3600 );  
		$remain = $remain % 3600;  
		$mins = intval( $remain / 60 );  
		$secs = $remain % 60;  
		//echo "停车时长：".$days."(天)-".$hours.":".$mins.":".$secs."<br />\n";

		$stop_long=$days*24+$hours+$mins/60;
		//print("停车时长：".$stop_long."<br />\n");

		//计算停车费用
		$unit_price=$price;//根据停入车辆类型获取不同单价
		$charge1=$unit_price*$stop_long;
		$charge=round($charge1,2);
		//print("停车费用：".$charge."<br />\n");

		//写入停车时长和停车费用
		$query="update stop_information set time_long='".$stop_long."',charge='".$charge."',leave_a=1 where name='".$car_num_out."'";

		mysqli_query($link,$query);
		
		$query="select * from user where car_num='".$car_num_out."'";
		$result=mysqli_query($link,$query);
		while($row=mysqli_fetch_array($result))
		{
			$money=$row[5];
		}
		$newmoney=$money-$charge;
		$query="update user set remainder='".$newmoney."' where car_num='".$car_num_out."'";
		//print($query);
		mysqli_query($link,$query);
		//出库时写入停车场信息，即释放一个车位
		$query="select * from parking_information";
		#print($query);
		$result=mysqli_query($link,$query);
		while($row=mysqli_fetch_array($result))
		{
			$have_num=$row[1];
			$user_num=$row[2];
			$surplus_num=$row[3];
		}
		$user_num=$user_num-1;
		$surplus_num=$surplus_num+1;
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
  <h3 align="center">出库信息</h3>
  <?php
	if($rel==1)
	{
	?>
   <table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <td>车牌号：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($car_num_out."<br />\n");
		?></td>
      </tr>
    <tr>
      <td>入库时间：</td>
      <td height="50" align="center" style="font-size: 18px"> <?php
			print($in_time."<br />\n");
		?></td>
      </tr>
    <tr>
      <td>出库时间：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($out_time."<br />\n");
		?></td>
      </tr>
    <tr>
      <td>停车时长：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
        print($stop_long."小时"."<br />\n");
		?></td>
    </tr>
    <tr>
      <td>车型：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($car_style);
		?>	</td>
      </tr>
    <tr>
      <td>停车费用：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
        print($charge."<br />\n");
		?></td>
    </tr>
    <tr>
      <td>单价：</td>
      <td height="50" align="center" style="font-size: 18px"><?php
			print($unit_price);
			?>元/时</td>
      </tr>
  </tbody>
</table>
<?php
	}else{
		?>
  <h2 align="center">未查询到信息请重试！</h2>
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
