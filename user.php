<?php
	$uid=$_GET["uid"];
	include_once("loadin.php");
	$query="select * from user where id=".$uid;
	$result=mysqli_query($link,$query);
	$row=mysqli_fetch_array($result);
	$uid=$row[0];
	$username=$row[1];
	$password=$row[2];
	$name=$row[3];
	$car_num=$row[4];
	$remainder=$row[5];
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="css/user.css"/>
	
</head>

<body>
	<!--中心-->
	<br>
	<br>
	<h2 style="margin-left: 48%;font-family:STXinwei;font-size: 180%">个 人 中 心</h2>
	<br>
	<form action="saveuser.php?handle=2" name="updateUser" method="post">
		<input type="text" name="handle" value="1" style="display:none">
		<input type="text" name="id" value="<?php print($uid); ?>" style="display:none">
	<div class="content">
		<div class="register-box">
			<div class="wrap">
				<div class="register-box-con2">
					<div class="register-box-con2-box clearfix mar-bottom20">
						<label class="register-box-con2-box-left"><em class="bitian"></em>账号</label>
						<div class="register-box-con2-box-right">
							<input type="text" name="username" class="login-box-cen-form-input w358" placeholder="账号不可改" disabled id="reg_info_company"
							value="<?php print($username); ?>"	   
								  style="font-weight: bold;font-family: KaiTi_GB2312
" />
							<label id="reg_info_company_text" class="err err-top40">账号不可改</label>
						</div>
					</div>
					<div class="register-box-con2-box clearfix mar-bottom20">
						<label class="register-box-con2-box-left"><em class="bitian">* </em>密码</label>
						<div class="register-box-con2-box-right">
							<input type="text" name="password" class="login-box-cen-form-input w358" placeholder="请输入新密码" id="reg_info_www" 
								   value="<?php print($password); ?>" style="font-weight: bold;font-family: KaiTi_GB2312
"/>
							<label class="err err-top40" id="reg_info_www_text">请输入新密码</label>
						</div>
					</div>
					<div class="register-box-con2-box clearfix mar-bottom20">
						<label class="register-box-con2-box-left"><em class="bitian">* </em>姓名</label>
						<div class="register-box-con2-box-right">
							<input type="text" name="name" class="login-box-cen-form-input w358" placeholder="请输入姓名" id="reg_info_address" 
								   value="<?php print($name); ?>" style="font-weight: bold;font-family: KaiTi_GB2312
"/>
							<label class="err err-top40" id="reg_info_address_text">姓名</label>
						</div>
					</div>

					<div class="register-box-con2-box clearfix mar-bottom20">
						<label class="register-box-con2-box-left"><em class="bitian">* </em>车牌号</label>
						<div class="register-box-con2-box-right">
							<input type="text" name="car_num" class="login-box-cen-form-input w358" placeholder="请输入车牌号" id="reg_info_name" 
								   value="<?php print($car_num); ?>" style="font-weight: bold;font-family: KaiTi_GB2312
"/>
							<label class="err err-top40" id="reg_info_name_text">请输入车牌号</label>
						</div>
					</div>
					<div class="register-box-con2-box clearfix mar-bottom20">
						<label class="register-box-con2-box-left"><em class="bitian">* </em>余额</label>
						<div class="register-box-con2-box-right">
							<input type="text" name="remainder" class="login-box-cen-form-input w358" placeholder="余额不足，请充值" id="reg_info_email"/ 
								value="<?php print($remainder); ?>"   
								   style="font-weight: bold;font-family: KaiTi_GB2312
">
							<label class="err err-top40" id="reg_info_email_text">余额</label>
						</div>
					</div>
					
					<div class="register-box-con2-box clearfix mar-bottom20 mar-top50">
						<label class="register-box-con2-box-left"></label>
						<div class="register-box-con2-box-right">
							<input type="button" value="重 置" class="login-box-cen-form-button w380" id="reg_info_reset" onclick="location.href='user.php?uid=<?php print($uid) ?>'"/>
						</div>
						<label class="register-box-con2-box-left"></label>
						<div class="register-box-con2-box-right">
							<input type="submit" value="修 改" class="login-box-cen-form-button w380" id="reg_info_submit"/>
						</div>
						
					</div>

				</div>
			</div>
		</div>
	</div>
	</form>
	<?php mysqli_close($link); ?>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/tbdValidate.js"></script>
	<script type="text/javascript" src="js/upload.js"></script>
	<script type="text/javascript">
		$( function () {
			var regconfig = [ {
				eleinput: "login_phone",
				eletext: "login_phone_text",
				rule: [ {
					reg: /^.+$/,
					text: "手机号不能为空"
				}, {
					reg: /^1[34578]\d{9}$/,
					text: "手机号格式错误"
				} ]
			}, {
				eleinput: "login_password",
				eletext: "login_password_text",
				rule: [ {
					reg: /^.+$/,
					text: "密码不能为空"
				} ]
			} ];
			
			
			var regconfig = [ {
				eleinput: "reg_info_company",
				eletext: "reg_info_company_text",
				rule: [ {
					reg: /^.+$/,
					text: "企业名称不能为空"
				}, {
					reg: /^.{1,20}$/,
					text: "企业名称不超过20个字"
				} ]
			}, {
				eleinput: "reg_info_name",
				eletext: "reg_info_name_text",
				rule: [ {
					reg: /^.+$/,
					text: "联系人不能为空"
				}, {
					reg: /^.{1,20}$/,
					text: "联系人不超过20个字"
				} ]
			}, {
				eleinput: "reg_info_email",
				eletext: "reg_info_email_text",
				rule: [ {
					reg: /^.+$/,
					text: "Email地址不能为空"
				}, {
					reg: /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
					text: "Email地址格式错误"
				} ]
			} ];

			var noregconfig = [ {
				eleinput: "reg_info_www",
				eletext: "reg_info_www_text",
				rule: [ {
					reg: /(^(((^https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)$)|(^$)/,
					text: "请输入正确的网址"
				} ]
			}, {
				eleinput: "reg_info_address",
				eletext: "reg_info_address_text",
				rule: [ {
					reg: /^.{0,40}$/,
					text: "公司所在地址，不超过40个字"
				} ]
			}, {
				eleinput: "reg_info_textarea",
				eletext: "reg_info_textarea_text",
				rule: [ {
					reg: /^.{0,200}$/,
					text: "简介不超过200个字"
				} ]
			} ];
		} );
	</script>
</body>

</html>