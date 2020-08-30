<?php
include 'home.php'; 
?>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="homeCSS.css">
</head>
<body>
  <div class="container">
	    <h1><center> Welcome to Dashboard!!!!!</center></h1>
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
          $sql = "INSERT INTO profile_photo (Profile_Id,Profile_Email,Profile_Username,Profile_Status) VALUES ('$id','$useremail','$username',1)";
          mysqli_query($conn,$sql);
            

          $sqlImg = "SELECT * FROM Profile_Photo WHERE Profile_Id = '$id' LIMIT 1 ";
      		$resultImg = mysqli_query($conn,$sqlImg);
      
      	  
      	  while($rowImg = mysqli_fetch_assoc($resultImg))
       		{	
         	if($rowImg['Profile_Status'] == 0 )
          {
                  echo "<p><img src = 'profile".$id."'></p>";
                  echo "<h2><center>".$username."</center></h2>"; 
          }
          else
          {
               
                  echo "<p><img src = 'images.jpeg'></p>";
                  
                  echo "<h2><center>".$username."</center></h2>"; 
          }  
    	    }
         		        
            		    
      ?>


     
</div>
</body>
</html>