<?php
session_start(); 
include 'home.php';            
?>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="editdetailsCSS1.css">
</head>
<body>
   
    <h1><center> Welcome to Edit!!!!!</center></h1>

<form name="f" action="upload.php" method="POST" enctype="multipart/form-data">
     <h4> <center> <input type="file" class="fmm" name="file"></center></h4>
      <h3><center> <button type="submit" class="btn btn-success" name="Upload">Upload</button></center></h3>
   </form>
   <h5><center>Do You Want To Edit Your Details???</center></h5>
    <h6><center><a href="editdetails.php"> Click Here</a></center></h6>
      
      <?php

      $conn = new mysqli("localhost","root","","Blood_Donor");
      $sql = "SELECT * FROM Login";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
      	while($row = mysqli_fetch_assoc($result))
      	{
      		
      		$useremail = $row['Log_Email'];
      		$sql = "SELECT * FROM Registration WHERE Reg_Email = '$useremail' LIMIT 1";
      	  $resultEmail = mysqli_query($conn,$sql);
         if(mysqli_num_rows($resultEmail)>0)
         {
        	while($rowEmail = mysqli_fetch_assoc($resultEmail))
         	{
         	$logEmail = $rowEmail['Reg_Email'];
       		$username = $rowEmail['Reg_Username'];
          $id = $rowEmail['Id'];
                 
         }
    		}
      }
   		}
           $sql = "INSERT INTO Profile_Photo (Profile_Id,Profile_Email,Profile_Username,Profile_Status) VALUES ('$id','$useremail','$username',1)";
          mysqli_query($conn,$sql);
            

          $sqlImg = "SELECT * FROM Profile_Photo WHERE Profile_Id = '$id' LIMIT 1 ";
          $resultImg = mysqli_query($conn,$sqlImg);
      
      	  
      	  while($rowImg = mysqli_fetch_assoc($resultImg))
      		{	
         		
      			 	if($rowImg['Profile_Status'] == 0 )
               {
                  echo "<p><img src = 'profile".$id."'></p>";
               }

               else
               {
               
                  echo "<p><img src = 'images.jpeg'></p>";
                  
                   
                }  
    	}           

      ?>
   


</body>
</html>