<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare2') or die('connection failed');

if (isset($_POST['sub'])) {
  $posts = $_POST['posttt'];
  $res = "SELECT email FROM details where mobile='$posts' or aadhar='$posts' or vehicle='$posts'";
  $result = mysqli_query($conn, $res);
  
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $email = $row['email'];
      $res1 = "SELECT email1,email2,email3,email4,email5 FROM members where email='$email'";
      $result1 = mysqli_query($conn, $res1);
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
        }
     else {
        echo "Error executing the query: " . mysqli_error($conn);
      }
    echo "<script>location.href='index_popup.php'</script>";
    exit(); // Add exit() to prevent further execution of the code
  } else {
    echo "Error executing the query: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aasishare</title>
    <link rel="stylesheet" href="style11.css"> 
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Aasishare</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#About">ABOUT</a></li>
                    <li><a href="#Service">SERVICE</a></li>
                    <li><a href="#Contact">CONTACT</a></li>
                    <div class="search">
                        <button class="cn"><a href="signup.php">JOIN US</a></button>
                    </div>
                </ul>
            </div>
        </div> 
       
        <div class="content">
            <div class="aass">
            <table>
            <tr>
            <td><div class="column">
            <h1>Alert & <br><span>Intimate</span> </h1>
            <p class="par">Alert about the accident and Intimate the news to family <br> 
            quick sharing may reduce the threat.
                            <br> </p>
                        </div></td>
                <td><form method="post" action="index.php"><div class="column1">
                <div class=" dropdown">
                    <select id="posts" name="posts">
                        <option value="">Select One</option>
                        <option value="Phone Number">Phone Number</option>
                        <option value="ide">Aadhar</option>
                        <option value="vehicle Number">vehicle Number</option>
                    </select>
                    </div>
                    <input class="textbar" id="posttt" name="posttt" type="text" placeholder="Enter Details">
                    <br>
                    <button class="sub" name="sub">SEARCH</button>
                </div>
</form>
            </td>
            </div>
        </tr>
        </div>
    </table>
</div>
    <div class="about" id="About">
    <div class="about_main">
        <div class="image">
            <img src="abbout.jpg">
        </div>
        <div class="about_text">
            <h2><span>About</span>Us</h2><br><br>
            <h3>Why Choose us?</h3>
            <p>
                Aasishare sends an alert message to all the members of the who belongs to the person.
                whose identity is specified their.
                The alert message includes a message informing that some thing happened to the person.
            </p>
        </div>
    </div>
</div>
<div class="about" id="Service">
    <div class="about_main">
    <div class="image">
            <img src="service.jpg">
        </div>
        <div class="about_text">
            <h2><span>Services</span></h2><br><br>
            <h3>Why Choose us?</h3>
            <h5>Easy to use.</h5>
            <p>So easy to use, even your dog could do it.</p>
            <h5>Elite Clientele</h5>
            <p>We have all the dogs, the greatest dogs.</p>
            <h5>Guaranteed to work.</h5>
            <p>Find the love of your dog's life or your money back.</p>
        </div>
    </div>
</div>
  <!-- Features -->

  <div class="Contact" id="Contact">
    <h2><span>Contact</span>Us</h2>
    <div class="Contact_main">
        <div class="Contact_image">
            <img src="contact.jpg">
        </div>
        <form action="#">
            <div class="input">
                <p>Name</p>
                <input type="text" placeholder="your name">
            </div>
            <div class="input">
                <p>Email</p>
                <input type="email" placeholder="your email">
            </div>
            <div class="input">
                <p>Phone Number</p>
                <input placeholder="your Phone number">
            </div>
            <div class="input">
                <p>Address</p>
                <input placeholder="Your Address">
            </div>
            <button><a href="#" class="order_btn">Submit</a></button>
        </form>
    </div>
</div>
</div>
</body>
</html>