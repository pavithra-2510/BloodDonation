<!DOCTYPE html>
<html>
<head>

	<title>Edit Details</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="editdetailsCSS.css">
<link type="text/javascript">
</head>
<body>
	<div class="group">
<b>
	<font  face="Times new roman">
	<h1>Edit Details</h1></font>
  <font size=5  face="Times new roman">
  <form name="f" action=""   method="POST" >
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


   $sql = "SELECT * FROM Registration WHERE Id = '$id' ";
   $result = mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0)
   {
   	if($row = mysqli_fetch_assoc($result))
   	{

   		$id = $row['Id'];
   		$Ename = $row['Reg_Username'] ;
   		$Eemail = $row['Reg_Email'];
   		$Ephone = $row['Reg_Phoneno'];
   		$Epass = $row['Reg_Password'] ;
   		$Ecpass = $row['Reg_Confirmpassword'];
   		
   	}
   }

    

   ?>
   
Name<input type="text" class="form-control"  class="glyphicon glyphicon-user"  name="Ename" value =<?php echo $Ename?> >
Email Id<input type="email" class="form-control" name="Eemail" value=<?php echo $Eemail ?>>
PhoneNo<input type="number" class="form-control" name="Ephone"  value=<?php echo $Ephone ?>>
Create password<input type="password" class="form-control" name="Epass" value=<?php echo $Epass ?>  >
Confirm password<input type="password" class="form-control" name="Ecpass" value=<?php echo $Ecpass ?> >
<br>
<input type="submit" name="Goback" class="btn btn-danger" value="Go Back" require = "edit.php">
<input type="submit"   class="btn btn-success"  value="Update" name="Update">
   	<?php   	
   	if(isset($_POST['Update']))
   	{

   $Eename = $_POST['Ename'];
   $Eeemail = $_POST['Eemail'];
   $Eephone = $_POST['Ephone'];
   $Eepass = $_POST['Epass'];
   $Eecpass = $_POST['Ecpass'];

	$sql = "UPDATE mytbb SET Reg_Username = '$Eename' WHERE Id = '$id' ";
   $result = mysqli_query($conn,$sql);
   $sqll = "UPDATE mytbb SET  Reg_Email = '$Eeemail' WHERE Id = '$id' ";
   $resultt = mysqli_query($conn,$sqll);
   $sqlll = "UPDATE mytbb SET Reg_Phoneno = '$Eephone' WHERE Id = '$id' ";
   $resulttt = mysqli_query($conn,$sqlll);
   $sqllll = "UPDATE mytbb SET Reg_Password = '$Eepass' WHERE Id = '$id' ";
   $resultttt = mysqli_query($conn,$sqllll);
   $sqlllll = "UPDATE mytbb SET Reg_Confirmpassword = '$Eecpass' WHERE Id = '$id' ";
   $resulttttt = mysqli_query($conn,$sqlllll);
   echo "<script>alert('Updated')</script>";
   header("Location:Dashboard.php");
   }
   ?>
   <?php
   if(isset($_POST['Goback']))
   {
   	header("Location:edit.php");
   }

?>

</form>
</font>
</b>
</div>
</body>
</html>