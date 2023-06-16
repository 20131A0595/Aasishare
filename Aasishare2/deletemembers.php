<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare2') or die('Connection failed');
session_start();
$name = $_SESSION['name'];
$sel = "SELECT name1,email1,name2,email2,name3,email3,name4,email4,name5,email5 FROM members WHERE name='$name'";
$sel2 = mysqli_query($conn, $sel);

if (isset($_POST['name1'])) {
	$del = "UPDATE members SET name1=NULL, email1=NULL WHERE name='$name'";
	$del2 = mysqli_query($conn, $del);
	if ($del2) {
		echo '<script>alert("Member deleted successfully!");</script>';
	} else {
		echo '<script>alert("Deletion unsuccessful!");</script>';
	}
} elseif (isset($_POST['name2'])) {
	$del = "UPDATE members SET name2=NULL, email2=NULL WHERE name='$name'";
	$del2 = mysqli_query($conn, $del);
	if ($del2) {
		echo '<script>alert("Member deleted successfully!");</script>';
	} else {
		echo '<script>alert("Deletion unsuccessful!");</script>';
	}
} elseif (isset($_POST['name3'])) {
	$del = "UPDATE members SET name3=NULL, email3=NULL WHERE name='$name'";
	$del2 = mysqli_query($conn, $del);
	if ($del2) {
		echo '<script>alert("Member deleted successfully!");</script>';
	} else {
		echo '<script>alert("Deletion unsuccessful!");</script>';
	}
} elseif (isset($_POST['name4'])) {
	$del = "UPDATE members SET name4=NULL, email4=NULL WHERE name='$name'";
	$del2 = mysqli_query($conn, $del);
	if ($del2) {
		echo '<script>alert("Member deleted successfully!");</script>';
	} else {
		echo '<script>alert("Deletion unsuccessful!");</script>';
	}
} elseif (isset($_POST['name5'])) {
	$del = "UPDATE members SET name5=NULL, email5=NULL WHERE name='$name'";
	$del2 = mysqli_query($conn, $del);
	if ($del2) {
		echo '<script>alert("Member deleted successfully!");</script>';
	} else {
		echo '<script>alert("Deletion unsuccessful!");</script>';
	}
}

header("refresh:0; url=deletemembers.php"); // Refresh the page after deletion
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete members</title>
	<link rel="stylesheet" href="deletemembers.css">
</head>
<body style="padding: margin:0; padding:150px; width:100%; height:100%; overflow:hidden; text-align: center;">
	<table border="1" style="height: 300px; width: 800px;">
	<thead>
	<tr style="height: 50px; width: 800px;">
		<td>Person Name</td>
		<td>Person Email</td>
		<td>Delete member</td>
	</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		$row = mysqli_fetch_assoc($sel2);
        while ($i <= 5) {
			$name = 'name' . $i;
			$email = 'email' . $i;
		?>
			<tr>
				<td><?php echo $row[$name]; ?></td>
				<td><?php echo $row[$email]; ?></td>
				<td>
					<form method="post" action="deletemembers.php">
						<button type="submit" name="<?php echo $name; ?>">delete</button>
					</form>
				</td>
			</tr>
		<?php
			$i++;
		}
		?>
	</tbody>
	</table>
	<br><br>
	<a href="manage.php">Home</a>
</body>
</html>
