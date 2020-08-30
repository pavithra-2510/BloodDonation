<?php
session_start();	

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

      
      	  
  

$sub = $_POST['Upload'];
if(isset($sub))
{	
	
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png','pdf');

	if(in_array($fileActualExt, $allowed))
	{
		if($fileError === 0)
		{
             if($fileSize<1000000)
             {
             	$fileNameNew = "profile".$id;
             	$fileDestination = $fileNameNew;
             	move_uploaded_file($fileTmpName, $fileDestination);
             	$sql = "UPDATE profile_photo SET Profile_Status = 0 WHERE Profile_Id = '$id'"; 
             	$result = mysqli_query($conn,$sql);
              header("Location:edit.php");
             }
		}
		else
		{
			echo "There was an error uploading file";
		}
	}
	else
	{
		echo "You cannot upload  such files of type";
	}
}	
?>
