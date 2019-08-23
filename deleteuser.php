<?php
include_once("loadin.php");
$id=$_GET['id'];
$query="delete from user where id=".$id;
$result=mysqli_query($link,$query);
mysqli_close($link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>删除用户</title>
<style>
.button{
width: 150px;
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
	print($result."<br>");
	if($result){
		print("用户删除成功！<br><br><br><br>");
	}
	else{
		print("用户删除失败！<br><br><br><br>");
	}
?>
<button type="button" class="button"onClick="location.href='userlist.php'">返回用户列表</button>	

</div>
</body>
</html>