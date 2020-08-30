<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="ForgotCSS.css">
</head>
<body>
<?php
$conn=new mysqli('localhost', 'root', '','Blood_Donor' );
if($conn->connect_error)
{
    echo 'Connection error...'.$conn->connect_error;
}
else
{
    $fe = $_POST['fe'];
         $dbpass = "SELECT Reg_Password From Registration Where Reg_Email = '$fe' ";
         $re = $conn->query($dbpass);
         if($re->num_rows>0)
         {
          while($row = $re->fetch_assoc())
          {
            
?>          
   <div class="login">
    <font align="center"  face="Bold Italic">
     <h1>Wonderfulll!!!!!</h1>
    <form name = "f" action="index.php" method="POST">
    <p>Your Password is  </p>
    <br>
<?php 
      echo "<h3>".$row["Reg_Password"]."</h3>";
?>

<h5 align="center">
    <br><BUTTON class ="bt" name="LOG"> GOLTO  LOGIN</BUTTON></h5>
<?php
          }
        }
    
    else
    {
        echo "<script>alert('This mail is not Registered...')</script>";
              require "index.php";
    }
}
if(isset($_POST['LOG']))
{
    header("location:index.php");
}
?>
</form>
</div>
</body>
</html>