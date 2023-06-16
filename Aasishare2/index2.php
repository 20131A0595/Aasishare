<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index Page</title>
	<link rel="stylesheet" href="index_style.css"> 
	<script type="text/javascript">
			function selected_field() {
				     selectElement = document.querySelector('#select_field');
        			 output = selectElement.value;
        			 document.querySelector('.output').textContent = "Enter "+output+":";
        			 var s=document.getElementById("val");
        			 s.value = output.toLowerCase();
				}	
		</script>
</head>
<body>
	<div class="header">
	<span id="heading">Aasishare</span>
	<button type="submit" class="header1" onclick="location.href='signup.php'">Join Us</button>
	<button type="submit" class="header1">Contact</button>
	<button type="submit" class="header1">About Us</button>
	<button type="submit" class="header1">Home</button>
	</div><br><br><br><br>
	<div class="h">
	<b>Alert &amp;</b> <br><b>Intimate</b>
	<p class="par">Alert about the accident and Intimate the news to family <br>quick sharing may reduce the threat.</p>
	</div>
	<div class="option1">
	Select your preference:&emsp;
	<select  id="select_field" onchange="selected_field()">
		<option name="phonenumber">Phone Number</option>
		<option name="vehiclenumber">Vehicle Number</option>
		<option name="aadhaarnumber">Aadhaar Number</option>
	</select>
	</div><br><br>
	<div class="option2">
	<span class="output">Enter your Number:&emsp;&emsp;</span>
	<input type="text" placeholder="Enter your number" required autocomplete="off">
	</div><br><br><br>
	<button type="submit" class="submit">Submit</button>
</body>
</html>