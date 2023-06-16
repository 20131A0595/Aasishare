<?php
$conn = mysqli_connect('localhost','root','','aasishare2') or die('connection failed');
if(isset($_POST['signup']))
{
$mb=$_POST['mb'];
$pswd=$_POST['pswd'];
$sc=$_POST['sc'];
$sel="SELECT *FROM registration where mobile='$mb'";
if(mysqli_num_rows(mysqli_query($conn, $sel)) == 0)
{
$ins="INSERT INTO registration(mobile,password,security_code) VALUES('$mb', '$pswd','$sc')";
if(mysqli_query($conn, $ins))
	{
	echo "<script>location.href='signup_popup.php'</script>";
	}
	else
	{
		echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="verify" align="center">Error in inserting Data </span>';
	}
}
else
	{
		echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="verify" align="center">Error in inserting Data </span>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup page</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
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
		function validate_password2()
		{
			var pswd=document.getElementById("pswd");
			var pswd2=document.getElementById("pswd2");
			var p3=document.getElementById("p3");
			if(pswd.value==pswd2.value)
			{
				p3.innerHTML = "&#10004;";
				p3.style.color="skyblue";
				pswd2.style.color="green";	
			}
			else
			{
				p3.innerHTML = "x";
				p3.style.color="red";
				pswd2.style.color="red";
			}
		}
		function validate_sec_code()
		{
			var sc=document.getElementById("sc");
			var p4=document.getElementById("p4");
			if(sc.value.length==6)
			{
				p4.innerHTML = "&#10004;";
				p4.style.color="skyblue";
				sc.style.color="green";	
			}
			else
			{
				p4.innerHTML = "x";
				p4.style.color="red";
				sc.style.color="red";
			}
		}
	</script>
</head>
<body>
	<form method="post" action="signup.php">
		<fieldset>
			<center class="h">Signup<br></center>
			<center><br>
			Mobile <sup id="b">&starf;</sup> &emsp; <input type="tel" id="mb" name="mb" placeholder="Enter mobile number" autocomplete="off" onkeyup="validate_mobile()" autocomplete="off" required >
			<span id="p1"></span>
			<br><br>
			Password <sup id="b">&starf;</sup> &nbsp; <input type="text" name="pswd" id="pswd" placeholder="Enter password(min 8 letters)" onkeyup="validate_password()" autocomplete="off" required>
			<span id="p2"></span>
			<br><br>
			&emsp; &emsp; &emsp; &nbsp; Re-enter Password <sup id="b">&starf;</sup> &nbsp; <input type="password" name="pswd2" id="pswd2" placeholder="Re-enter password" onkeyup="validate_password2()" autocomplete="off" required>
			<span id="p3"></span>
			<br><br>
			&emsp; &emsp; &emsp; &nbsp; &nbsp; Enter security code <sup id="b">&starf;</sup> &nbsp; <input type="number" name="sc" id="sc" placeholder="Enter 6 digit security code" autocomplete="off" onkeyup="validate_sec_code()" required>
			<span id="p4"></span>
			<br>&emsp;&emsp;
			<small>**Remember your security code to recover your password**</small>
			<br><br>
			<button type="submit" name="signup">Signup</button><br><br>
			Back to login&emsp;
			<a href="login.php">Login</a><br>
			Back to home&emsp;
			<a href="index.php">Home</a>
			</center>
		</fieldset>
	</form>
</body>
</html>