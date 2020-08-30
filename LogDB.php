<?php
session_start();
$conn=new mysqli('localhost', 'root', '','Blood_Donor' );
if($conn->connect_error)
{
	echo 'Connection error...'.$conn->connect_error;
}
else
{
$Uemail=$_POST['Uemail'];
$Upassword=$_POST['Upassword'];
$dbemail = "SELECT Reg_Email From Registration Where Reg_Email = '$Uemail' ";
$result = $conn->query($dbemail);
  	 if($result->num_rows>0)
     {  
         $dbpass = "SELECT Reg_Username,Reg_Password From Registration Where Reg_Email = '$Uemail' ";
         $re = $conn->query($dbpass);
         if($re->num_rows>0)
         {
          while($row = $re->fetch_assoc())
          {
           $dblgp = $row["Reg_Password"];
           $User = $row["Reg_Username"];
          }
      }
      
         if($dblgp===$Upassword)
         {
	       $stmt = $conn->prepare("INSERT INTO Login(Log_Username,Log_Email,Log_Password) VALUES(?,?,?)");
	       $stmt->bind_param("sss",$User,$Uemail,$Upassword);
	       $stmt->execute();
	       $stmt->close();
	       $conn->close();
         require "Dashboard.php";
         }
         else
         {
          echo "<script>alert('Password wrong...')</script>";
              require "index.php";
         }
       }
       else
       {
         $dbemailid = "SELECT email From Registration Where Reg_Email <> '$Uemail' ";
         $res = $conn->query($dbemailid); 
              echo "<script>alert('This mail is not Registered...')</script>";
              require "index.php";
         
  }    
}
?> 