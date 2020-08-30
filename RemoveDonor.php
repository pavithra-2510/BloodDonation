<?php
include 'home.php';
?>
<!DOCTYPE html>
<html>
<head>
	<div class="group">
	<title>Remove Donor</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="homeCSS.css">
	<link rel="stylesheet" type="text/css" href="RegCSS.css">
</head>
<body>

<?php
	$conn = new mysqli("localhost","root","","Blood_Donor");	
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
	if($remail != $email)
	{
			echo "<form name = \"f\" action = \"addDonor.php\" method =\"POST\"> ";
			echo "<script>alert(' You Can Remove Your Details If You Are Already Added')</script>";
			echo "<h1 class = \"edit\">Can You Add Your Details...</h1><center><input type = \"submit\" class = \"btn btn-danger\" name = \"add\" value = \"Click Here\"></center>";
	}
	else
	{


?>

<center>
<font size="10" face="Times New Roman">	
<h1>Remove Details</h1>
</center></font>

<font size=5 face="Times New Roman">
<form name="f" action="" method="POST">
Name<input type="text" class="form-control" name="Dname" value=<?php echo $name; ?>>
Age<input type="number" class="form-control" name="Dage" value=<?php echo $age; ?>>
Gender<input type="text" class="form-control" name="Dgender" value=<?php echo $Gender; ?>>
Date of Birth<input type="text" class="form-control" name="Ddob" placeholder="yyyy-mm-dd" value=<?php echo $Date_Of_Birth; ?>>
Weight<input type="number" class="form-control" name="Dweight" value=<?php echo $Weight; ?>>
Blood Type<input type="text" class="form-control" name="Dbt" value=<?php echo $BloodType; ?>>
<br>
<center><input type="submit" class="btn btn-danger" name="submit" value="Remove"></center>
</form>
</div>


<?php
	}
	if(isset($_POST['submit']))
	{
	$Name = $_POST['Dname'];
	$Age = $_POST['Dage'];
	$Gender = $_POST['Dgender'];
	$Date_Of_Birth = $_POST['Ddob'];
	$Weight = $_POST['Dweight'];
	$BloodType = $_POST['Dbt'];

	$sqqql = "DELETE FROM Donor WHERE Donor_Email = '$remail'";
	mysqli_query($conn,$sqqql);
	echo "<script>alert('Removed Successfully...')</script>";
	header("Location:Dashboard.php");
}
?>

</body>
</div>
</html>