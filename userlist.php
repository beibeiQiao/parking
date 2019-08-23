<?php
$page=$_GET['page'];//分页
$page=intval($page);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户列表</title>
<style>
.usertable
{
	border-collapse: collapse;
	margin: 0 auto;
	text-align: center;
}
.usertable td, table th
{
	border: 1px solid #cad9ea;
	color: #666;
	height: 30px;
}
.usertable thead th
{
	background-color: #CCE8EB;
	width: 100px;
}
.usertable tr:nth-child(odd)
{
	background: #fff;
}
.usertable tr:nth-child(even)
{
	background: #F5FAFA;
}
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
margin:0 20px 20px 0;
margin-left:1000px;
overflow: hidden;
}
</style>
</head>

<body background="images/rawpixel-722816-unsplash.jpg" style="background-size:cover">
<div class="header" style="height:100px;background:#0B6C70;color:#FFFFFF;padding-top:5px;">
	<h1 align="center">用户列表</h1>
</div>
<hr>
<div>
<table align="center" width="80%" class="usertable">
   <thread>
    <tr height="50px">
      <th>编号</th>
      <th>账号</th>
      <th>密码</th>
      <th>姓名</th>
      <th>车牌号</th>
      <th>余额</th>
      <th>操作</th>
    </tr>
   </thread>
    <?php
    include_once("loadin.php");
	$query="select count(*) from user";
	$result=mysqli_query($link,$query);
	$row=mysqli_fetch_array($result);
	$total=$row[0];
	$pageSize=10;
	if($total%$pageSize==0){
		$totalPage=intval($total/$pageSize);
	}else{
		$totalPage=intval($total/$pageSize)+1;
	}
	$query="select * from user limit ".$page*$pageSize.",".($page+1)*$pageSize;
	$result=mysqli_query($link,$query);
	$i=1;
	
	while($row=mysqli_fetch_array($result)){
	?>
    <tr>
      <td><?php print($row[0]);?></td>
      <td><?php print($row[1])?></td>
      <td>********<!--<?php print($row[2])?>--></td>
      <td><?php print($row[3]);?></td>
      <td><?php print($row[4])?></td>
      <td><?php print($row[5])?></td>
      <td><a href="modifyuser.php?id=<?php print($row[0]);?>">修改</a>
      <a href="deleteuser.php?id=<?php print($row[0]);?>">删除</a></td>
    </tr>
    <?php
	  $i++;
	}
	
	mysqli_close($link);
	if($page>0){
		$pagePre=$page-1;
	}else{
		$pagePre=0;
	}
	if($page<$totalPage-1){
		$pageNext=$page+1;
	}else{
		$pageNext=$totalPage-1;
	}
	?>
</table>
<table align="center">
	<tr>
      <td><a href="userlist.php?page=0">首页</a></td>
      <td><a href="userlist.php?page=<?php print($pagePre)?>">上页</a></td>
      <td><a href="userlist.php?page=<?php print($pageNext)?>">下页</a></td>
      <td><a href="userlist.php?page=<?php print($totalPage-1)?>">末页</a></td>
	</tr>
</table>
</div>
<button type="button" class="button"onClick="location.href='admin.php'">返回</button>
<footer style="position:fixed;left:350px;bottom:10px;">
	<p align="center">Copyright &copy; 2018 taytayL All rights reserved. 联系我们：412854858@qq.com</p>
</footer>
</body>
</html>
