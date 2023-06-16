<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare') or die('connection failed');

if (isset($_POST['sub'])) {
  $posts = $_POST['posttt'];
  $res = "SELECT email FROM details where mobile='$posts' or aadhar='$posts' or vehicle='$posts'";
  $result = mysqli_query($conn, $res);
  
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $email = $row['email'];
      $res1 = "SELECT email1,email2,email3,email4,email5 FROM members where email='$email'";
      $result1 = mysqli_query($conn, $res1);
      
      if ($result1) {
        if (mysqli_num_rows($result1) > 0) {
          $row = mysqli_fetch_assoc($result1);
          $email1 = $row['email1'];
          $email2 = $row['email2'];
          $email3 = $row['email3'];
          $email4 = $row['email4'];
          $email5 = $row['email5'];
          $recipients = array(
            $email1,
            $email2,
            $email3,
            $email4,
            $email5
          );
          $subject = "Accident alert";
          $body = "The person using your vehicle is in trouble";
          $sender = "From: nanikillamsetti2003@gmail.com";
          
          foreach ($recipients as $receiver) {
            if (mail($receiver, $subject, $body, $sender)) {
              echo "Email sent successfully to $receiver<br>";
            } else {
              echo "Sorry, failed while sending mail to $receiver<br>";
            }
          }
        } else {
          echo "No rows found in the members table.";
        }
      } else {
        echo "Error executing the query: " . mysqli_error($conn);
      }
    } else {
      echo "No rows found in the details table for the given criteria.";
    }
    echo "<script>location.href='index_popup.php'</script>";
    exit(); // Add exit() to prevent further execution of the code
  } else {
    echo "Error executing the query: " . mysqli_error($conn);
  }
  
  echo "Msg sent";
}
?>