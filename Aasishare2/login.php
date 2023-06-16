<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare2') or die('Connection failed');
if (isset($_POST['login'])) {
	$mb = $_POST['mb'];
	$pswd = $_POST['pswd'];
	$sel = "SELECT * FROM registration WHERE mobile='$mb' AND password='$pswd'";
	$res = mysqli_query($conn, $sel);
	if (mysqli_num_rows($res) == 1) {
		session_start();
		$_SESSION['mb'] = $mb;
		header('Location: manage.php');
		exit();
	} else {
		echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="verify" align="center">Invalid login details </span>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript">
		function validatePhoneNumber(mb) 
		{
		  var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
		  return re.test(mb);
		}
		function validate_mobile() 
		{
		var mb=document.getElementById("mb");
		var p1=document.getElementById("p1");
		if(validatePhoneNumber(mb.value))
		{
			p1.innerHTML = "&#10004;";
			p1.style.color="skyblue";
			mb.style.color="green";
		}
		else
		{
			p1.innerHTML = "x";
			p1.style.color="red";
			mb.style.color="red";
		}
		}
		function validate_password()
		{
			var pswd=document.getElementById("pswd");
			var p2=document.getElementById("p2");
			if(pswd.value.length>=8 && pswd.value.length<=15)
			{
				p2.innerHTML = "&#10004;";
				p2.style.color="skyblue";
				pswd.style.color="green";	
			}
			else
			{
				p2.innerHTML = "x";
				p2.style.color="red";
				pswd.style.color="red";
			}
		}
	</script>
</head>
<body>
	<form method="post" action="login.php">
		<fieldset>
			<center class="h">Login<br></center>
			<center><br>
			Mobile <sup id="b">&starf;</sup> &emsp; <input type="tel" name="mb" id="mb" placeholder="Enter mobile number" onkeyup="validate_mobile()" autocomplete="off" required>
			<span id="p1"></span> <br><br>
			Password <sup id="b">&starf;</sup> &nbsp; <input type="password" name="pswd" id="pswd" placeholder="Enter password" onkeyup="validate_password()" required>
			<span id="p2"></span><br><br>
			<a href="recover_password.php">Forgot password</a><br><br>
			<button type="submit" name="login">Login</button><br><br>
			Don't have an account?
			<a href="signup.php">Signup</a>
			</center>
		</fieldset>
	</form>
</body>
</html>