<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare2') or die('connection failed');

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $aadhar = $_POST['aadhar'];
  $email = $_POST['email'];
  $vehicle = $_POST['vehicle'];
  $sel = "SELECT * FROM details WHERE mobile='$mobile'";
  $result = mysqli_query($conn, $sel);

  if (mysqli_num_rows($result) == 0) {
    $ins = "INSERT INTO details(name, mobile, aadhar, email, vehicle) VALUES('$name', '$mobile', '$aadhar', '$email', '$vehicle')";
    
    if (mysqli_query($conn, $ins)) {
      session_start();
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
      
      // Redirect to the addmembers.php file
      header('Location: addmembers.php');
      exit();
    } else {
      echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="verify" align="center">Error in inserting Data </span>';
    }
  } else {
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
</head>
<body>
	<form method="post" action="form.php">
		<fieldset>
			<center class="h">Fill the details<br></center>
			<center><br>
            Name &emsp; <input type="text" id="name" name="name" placeholder="Enter name" autocomplete="off" autocomplete="off" required >
			<br><br>
            Mobile Number &emsp; <input type="tel" id="mobile" name="mobile" placeholder="Enter mobile number" autocomplete="off" autocomplete="off" required >
			<br><br>
            Aadhar &emsp; <input type="tel" id="aadhar" name="aadhar" placeholder="Enter aadhar number" autocomplete="off"  autocomplete="off" required >
			<br><br>
            Email  &emsp; <input type="text" id="email" name="email" placeholder="Enter email" autocomplete="off" autocomplete="off" required >
			<br><br>
			Vehicle Number &emsp; <input type="text" id="vehicle" name="vehicle" placeholder="Enter vehicle number" autocomplete="off" autocomplete="off" required >
			<br><br>
			<button type="submit" name="submit">Submit</button><br><br>
			</center>
		</fieldset>
	</form>
</body>
</html>