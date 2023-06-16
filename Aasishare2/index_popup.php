<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Sign Up Verified</title>
   <link rel="stylesheet" type="text/css" href="popup.css">
</head>
<body onload="openPopup()">
      <div class="popup" id="popup">
         <img src="tick_mark.jpg">
         <p>Message sent successfully</p>
         <button type="button" onclick="closePopup()">Ok</button>
      </div>
<script type="text/javascript">
   let popup=document.getElementById("popup");
   function openPopup(){
         popup.classList.add("open-popup");
   }
   function closePopup(){
      location.href='index.php';
   }
</script>
</body>
</html>