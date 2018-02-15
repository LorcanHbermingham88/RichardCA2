<?php

include("config.php");
session_start();

$countEmail = 0;
$var_value = $_SESSION['token'];
echo $var_value;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $enteredToken = $_POST['passwordToken'];
    $sqlEmail = mysqli_query($db,"Select Email FROM tester");

    if($sqlEmail->num_rows>0)
    {
        while($row = $sqlEmail -> fetch_assoc())
        {
            $returnEmail = $row["Email"];
            if(hash_equals($returnEmail,crypt($email,$returnEmail)))
            {
                $countEmail ++;
                $userEmail = $returnEmail;
                $tokenResult = mysqli_query($db,"SELECT resetToken FROM tester WHERE Email = '$userEmail'");// query to select the username with the matching username and hashedpassword
                $row = mysqli_fetch_all($tokenResult,MYSQLI_ASSOC);
                $returned = $row[0]['resetToken'];
            }
        }
    }
    if($returned == $enteredToken)
    {
        $RESET = '';
        $result = mysqli_query($db,"UPDATE tester SET hashedPassword = '$newPassword' WHERE Email = '$userEmail'");
        $result = mysqli_query($db,"UPDATE tester SET resetToken = '$RESET' WHERE Email = '$userEmail'");
        header("location:Login.php"); // query to update the users stored password

    }

}



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
                  <label>Enter new Password:</label><br><input type = "text" name = "newPassword" class = "box"/><br /><br />
                  <br>
                  <label>Re-Enter Password:</label><br><input type = "text" name = "re-enterNewPassword" class = "box"/><br /><br />
                  <br>

                  <input type = "submit" value = " Submit "/><br />
               </form>

            </div>

         </div>

      </div>

   </body>
</html>
