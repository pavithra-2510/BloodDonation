<?php
$log_user = $_POST['log_user'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$lgp = $_POST['lgp'];
$log_password = $_POST['log_password'];

if($lgp!=$log_password)
{

	echo "<script>alert('Password not Matching')</script>";
	 require "Register.php";
}
else
{

$conn = new mysqli('localhost','root','','Blood_Donor');

if($conn->connect_error)
{
	echo 'Connection error...'.$conn->connect_error;
}
else
{
  $SELECT="SELECT Log_Email From Login Where Log_Email = ? Limit 1";
  $INSERT="INSERT Into Registration (Reg_Username,Reg_Email,ReG_Phoneno,Reg_Password,Reg_Confirmpassword) values(?,?,?,?,?)";

  $stmt=$conn->prepare($SELECT);
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum=$stmt->num_rows;
  if($rnum==0)
  {
    $stmt->close();
  $stmt=$conn->prepare($INSERT);
  $stmt->bind_param("sssss",$log_user,$email,$phone,$lgp,$log_password);
  $stmt->execute();
 /* $mailfrom = "kowsalyaramesh4@gmail.com";
  $subject = "Verification!";
  $headers = "From: ".$mailfrom;
  $txt = "<a href = 'http://localhost/php/Login.php'>Login Here</a>";
  mail($email,$subject,$txt,$headers);
  */
  require "index.php";
  }
  else 
  {
    echo "<script>alert('Someone Already Register Using this Email..')</script>";
    require "Register.php";
  }
$stmt->close();
$conn->close();
}
}
?>

