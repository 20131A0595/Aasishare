<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recover password</title>
	<link rel="stylesheet" type="text/css" href="recover_password.css">
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
		function validate_sec_code()
		{
			var sc=document.getElementById("sc");
			var p2=document.getElementById("p2");
			if(sc.value.length==6)
			{
				p2.innerHTML = "&#10004;";
				p2.style.color="skyblue";
				sc.style.color="green";	
			}
			else
			{
				p2.innerHTML = "x";
				p2.style.color="red";
				sc.style.color="red";
			}
		}
	</script>
</head>
<body>
	<form method="post" action="recover_password_popup.php">
		<fieldset>
			<center class="h">Recover password<br></center>
			<center><br>
			Mobile <sup id="b">&starf;</sup> &emsp; <input type="tel" name="mb" id="mb" placeholder="Enter mobile number" onkeyup="validate_mobile()" autocomplete="off" required>
			<span id="p1"></span><br><br>
			&emsp; &emsp; &emsp; &nbsp; &nbsp; Enter security code <sup id="b">&starf;</sup> &nbsp; <input type="number" name="sc" id="sc" placeholder="Enter security code" onkeyup="validate_sec_code()" autocomplete="off" required>
			<span id="p2"></span><br><br>
			<button type="submit" name="recover_pswd">Submit</button><br><br>
			Back to login&emsp;
			<a href="login.php">Login</a>
			</center>
		</fieldset>
	</form>
</body>
</html>