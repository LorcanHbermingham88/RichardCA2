<<?php
include("config.php");

  $countEmail = 0;

if (isset($_POST['email']))
{
  $email = $_POST['email'];
  $sqlEmail = mysqli_query($db,"Select Email FROM tester");


  if($sqlEmail->num_rows>0)
  {
      while($row = $sqlEmail -> fetch_assoc())
      {
          $returnEmail = $row["Email"];
          if(hash_equals($returnEmail,crypt($email,$returnEmail)))
          {
              $countEmail ++;
              echo "found";
              //$token =   $salt = random_bytes(32);
              header("location:displaytoken.php");
          }
          else
            {
              echo"not found";

            }
        }
    }
  }


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

                  <label>Enter Email  :</label><input type = "email" name = "email" class = "box"/><br /><br />

                  <input type = "submit" value = " Submit "/><br />
               </form>

            </div>

         </div>

      </div>

   </body>
</html>
