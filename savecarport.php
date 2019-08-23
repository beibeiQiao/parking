<?php
include_once("loadin.php");
$id=1;
$have_num=$_POST['have_num'];
$user_num=$_POST['user_num'];
$unit_price_car=$_POST['unit_price_car'];
$unit_price_truck=$_POST['unit_price_truck'];
$surplus_num=$have_num-$user_num;
$query="update parking_information set have_num='$have_num',user_num='$user_num',surplus_num='$surplus_num',unit_price_car='$unit_price_car',unit_price_truck='$unit_price_truck'where id='$id'";
print($query."<br>");
$result=mysqli_query($link,$query);
print($result);
mysqli_close($link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改车库信息</title>
<style>
.button{
width: 100px;
background-color: teal;
line-height: 30px;
font-size: 18px;
text-align: center;
font-weight: bold;
color:aliceblue;
text-shadow:1px 1px 1px #333;
border-radius: 5px;
margin:auto;
overflow: hidden;
}	
</style>
</head>

<body background="images/rawpixel-722816-unsplash.jpg" style="background-size:cover">
<div align="center" style="font-size: 24px; margin-top:90px;">
<?php
if($result){
	print("修改车库信息成功！<br><br><br><br>");
}else{
	print("修改车库信息失败！<br><br><br><br>");
}
?>
<button type="button" class="button"onClick="location.href='admin.php'">返回</button>
</div>
</body>
</html>
