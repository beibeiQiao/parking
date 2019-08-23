<?php
include_once("loadin.php");
if($_POST["id"]!='') $id=$_POST["id"];
else $id=$_GET['id'];
$handle=$_GET['handle']||$_POST["handle"];
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$car_num=$_POST['car_num'];
$remainder=$_POST['remainder'];
if($handle=1||$handle=2){
	$query="update user set password='$password',name='$name',car_num='$car_num',remainder='$remainder'where id='$id'";
}else{
	$query="insert into user(username,password,name,car_num,remainder)values('".$username."','".$password."','".$name."','".$car_num."','".$remainder."')";
}
print($query."<br>");
print("POST:".$_POST["id"]."GET:".$_GET['id']);
$result=mysqli_query($link,$query);
mysqli_close($link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>数据库录入用户</title>
<style>
.button{
width: 140px;
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
if($handle==1){
	if($result){
		print("修改用户信息成功！<br><br><br><br>");
	}else{
		print("修改用户信息失败！<br><br><br><br>");
	}
}elseif(handle==2){
	if($result){
		print("修改信息成功！<br><br><br><br>");
	}else{
		print("修改信息失败！<br><br><br><br>");
	}
}else{
	if($result){
		print("录入用户信息成功！<br><br><br><br>");
	}else{
		print("录入用户信息失败！<br><br><br><br>");
	}	
}

?>
<button type="button" class="button" onClick="location.href='adduser.php'">继续添加</button>
<button type="button" class="button" onClick="location.href='userlist.php'">查看用户列表</button>	
<button type="button" class="button" onclick="javascript:history.back(-1);" >返回</button>
</div>
</body>
</html>
