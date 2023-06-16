<?php
$conn = mysqli_connect('localhost','root','','aasishare2') or die('connection failed');
if(isset($_POST['recover_pswd']))
{
$mb=$_POST['mb'];
$sc=$_POST['sc'];
$sel="SELECT *FROM registration where mobile='$mb' and security_code=$sc";
$res=mysqli_query($conn, $sel);
   if(mysqli_num_rows($res) == 1)
   {
      $row = mysqli_fetch_assoc($res);
      if ($row['mobile'] == $mb && $row['security_code'] == $sc) {
         $pswd=$row['password']; ?>
         <!DOCTYPE html>
            <html>
            <head>
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <title>Recover Password</title>
               <link rel="stylesheet" type="text/css" href="popup.css">
            </head>
            <body onload="openPopup()">
                  <div class="popup" id="popup">
                     <img src="tick_mark.jpg">
                     <h2>Thank you!</h2>
                     <p>Your password is <?php echo $pswd; ?></p>
                     <button type="button" onclick="closePopup()">Ok</button>
                  </div>
            <script type="text/javascript">
               let popup=document.getElementById("popup");
                  function openPopup(){
                     popup.classList.add("open-popup");
                  }
               function closePopup(){
                  location.href='login.php';
               }
            </script>
            </body>
            </html>         
      <?php }
   }
   else
   {
      echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="verify" align="center">Invalid details! Please verify your details </span>';
   }
}
?>

