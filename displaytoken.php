<<?php
include("config.php");

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$tokenId = generateRandomString();

echo $tokenId;

//$result = mysqli_query($db,"INSERT INTO tester (Username, hashedPassword,Email,DOB) VALUES  ('$cryptUsername', '$saltHash','$cryptEmail','$cryptDOB')");

?>
<html>

   <head>
      <title>Forgot Password</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post" autocomplete = "off">

                  <label>Enter Email  :</label><br><input type = "email" name = "email" class = "box"/><br /><br />
                  <br>
                  <label>Enter DOB  :</label><br><input type = "text" name = "dob" class = "box"/><br /><br />
                  <br>
                  <label>Enter Password Token  :</label><br><input type = "text" name = "passwordToken" class = "box"/><br /><br />
                  <br>

                  <input type = "submit" value = " Submit "/><br />
               </form>

            </div>

         </div>

      </div>

   </body>
</html>
