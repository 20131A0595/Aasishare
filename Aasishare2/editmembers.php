<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare2') or die('Connection failed');
session_start();
$name = $_SESSION['name'];
$sel = "SELECT name1, email1, name2, email2, name3, email3, name4, email4, name5, email5 FROM members WHERE name='$name'";
$sel2 = mysqli_query($conn, $sel);

if (isset($_POST['name1'])) {
	$name1 = $_POST['nam1'];
	$email1 = $_POST['mail1'];
	$edit = "UPDATE members SET name1='$name1', email1='$email1' WHERE name='$name'";
	$edit2 = mysqli_query($conn, $edit);
	if ($edit2) {
		echo '<script>alert("Member edited successfully!");</script>';
	} else {
		echo '<script>alert("Editing was unsuccessful!");</script>';
	}
} elseif (isset($_POST['name2'])) {
	$name2 = $_POST['nam2'];
	$email2 = $_POST['mail2'];
	$edit = "UPDATE members SET name2='$name2', email2='$email2' WHERE name='$name'";
	$edit2 = mysqli_query($conn, $edit);
	if ($edit2) {
		echo '<script>alert("Member edited successfully!");</script>';
	} else {
		echo '<script>alert("Editing was unsuccessful!");</script>';
	}
} elseif (isset($_POST['name3'])) {
	$name3 = $_POST['nam3'];
	$email3 = $_POST['mail3'];
	$edit = "UPDATE members SET name3='$name3', email3='$email3' WHERE name='$name'";
	$edit2 = mysqli_query($conn, $edit);
	if ($edit2) {
		echo '<script>alert("Member edited successfully!");</script>';
	} else {
		echo '<script>alert("Editing was unsuccessful!");</script>';
	}
} elseif (isset($_POST['name4'])) {
	$name4 = $_POST['nam4'];
	$email4 = $_POST['mail4'];
	$edit = "UPDATE members SET name4='$name4', email4='$email4' WHERE name='$name'";
	$edit2 = mysqli_query($conn, $edit);
	if ($edit2) {
		echo '<script>alert("Member edited successfully!");</script>';
	} else {
		echo '<script>alert("Editing was unsuccessful!");</script>';
	}
} elseif (isset($_POST['name5'])) {
	$name5 = $_POST['nam5'];
	$email5 = $_POST['mail5'];
	$edit = "UPDATE members SET name5='$name5', email5='$email5' WHERE name='$name'";
	$edit2 = mysqli_query($conn, $edit);
	if ($edit2) {
		echo '<script>alert("Member edited successfully!");</script>';
	} else {
		echo '<script>alert("Editing was unsuccessful!");</script>';
	}
}

header("refresh:0; url=editmembers.php"); // Refresh the page after editing
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit members</title>
	<link rel="stylesheet" href="editmembers.css">
</head>
<body style="padding: margin:0; padding:150px; width:100%; height:100%; overflow:hidden; text-align: center;">
	<table border="1" style="height: 300px; width: 800px;">
		<thead>
			<tr style="height: 50px; width: 800px;">
				<td>Person Name</td>
				<td>Person Email</td>
				<td>Edit member</td>
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
					<form method="post" action="editmembers.php">
						<td>
							<input type="text" value="<?php echo $row[$name]; ?>" name="nam<?php echo $i; ?>" contenteditable>
						</td>
						<td>
							<input type="text" value="<?php echo $row[$email]; ?>" name="mail<?php echo $i; ?>" contenteditable>
						</td>
						<td>
							<button type="submit" name="name<?php echo $i; ?>">edit</button>
						</td>
					</form>
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
