<?php
include 'home.php';
?>
<!DOCTYPE html>
<html>
<head>
	<div class="group">
	<title>Add Donor</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="homeCSS.css">
	<link rel="stylesheet" type="text/css" href="RegCSS.css">
</head>
<body>
	<center>
<font size="10" face="Times New Roman">	
<h1>Add Details</h1>
</center></font>

<?php
	$conn = new mysqli("localhost","root","","Blood_Donor");
	$sql = "SELECT * FROM Login ORDER BY Id DESC LIMIT 1 ";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$mtemail = $row['Log_Email'];
		}
	}
    $sqll = "SELECT * FROM Registration WHERE Reg_Email = '$mtemail'";
    $resultt = mysqli_query($conn,$sqll);
    if(mysqli_num_rows($resultt)>0)
	{
		while($rowmtb=mysqli_fetch_assoc($resultt))
		{
			$mtbname = $rowmtb['Reg_Username'];
			$mtbemail = $rowmtb['Reg_Email'];
			$mtbphone = $rowmtb['Reg_Phoneno'];
		}
	}
	?>



<font size=5 face="Times New Roman">
<form name="f"  method="POST">
Name<input type="text" class="form-control" name="Dname" value=<?php echo $mtbname; ?>>
Age<input type="number" class="form-control" name="Dage" value="" required="">
Gender<input type="text" class="form-control" name="Dgender" value="" required="">
Date of Birth<input type="text" class="form-control" name="Ddob" placeholder="yyyy-mm-dd" value="" required="">
Weight<input type="number" class="form-control" name="Dweight" value="" required="">
Blood Type<input type="text" class="form-control" name="Dbt" value="" required="">
<br>
<center><input type="submit" class="btn btn-danger" name="submit" value="Add"></center>

<?php

	$sql = "SELECT * FROM Login ORDER BY Id DESC LIMIT 1";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$remail = $row['Log_Email'];
	}
	$sqql = "SELECT * FROM Donor";
	$resultt = mysqli_query($conn,$sqql);
	while($roww = mysqli_fetch_assoc($resultt))
	{
		$email = $roww['Donor_Email'];
		$id = $roww['Id'];
		$name = $roww['Donor_Name'];
		$age = $roww['Donor_Age'];
		$Gender  = $roww['Donor_Gender'];
		$Date_Of_Birth = $roww['Donor_Dateofbirth'];
		$Weight = $roww['Donor_Weight'];
		$BloodType = $roww['Donor_BloodType'];
	}	                                                                                                                                                                                                                                                          
	//echo $email;
	//echo $remail;
	//echo $name;


	if(isset($_POST['submit']))
	{
	$Name = $_POST['Dname'];
	$Age = $_POST['Dage'];
	$Gender = $_POST['Dgender'];
	$Date_Of_Birth = $_POST['Ddob'];
	$Weight = $_POST['Dweight'];
	$BloodType = $_POST['Dbt'];
	
	if($remail === $email)
	{
			echo "<form name = \"f\" action = \"editDonor.php\" method =\"POST\"> ";
			echo "<script>alert('Your Details Are Already Added...')</script>";
			echo "<script>alert('You Can Only Edit The Details!!!')</script>";
			echo "<h1 class = \"edit\">Can You Edit Your Details...</h1><center><input type = \"submit\" class = \"btn btn-danger\" name = \"add\" value = \"Click Here\"></center>";
	}
	else
	{
		
		$sql = "INSERT INTO donor (Donor_Name,Donor_Age,Donor_Gender,Donor_Email,Donor_Phoneno,Donor_Dateofbirth,Donor_weight,Donor_BloodType) VALUES ('$Name','$Age','$Gender','$mtbemail','$mtbphone','$Date_Of_Birth','$Weight','$BloodType') ";
	mysqli_query($conn,$sql);
	echo "<script>alert('Added Successfully...')</script>";
	}
	//header("Location:Dashboard.php");
    }
?>

</form>
</div>
</body>
</html>