<?php
include 'home.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="homeCSS.css">
	<link rel="stylesheet" type="text/css" href="RegCSS.css">
	<link rel="stylesheet" type="text/css" href="UserCSS.css">
	<link rel="stylesheet" type="text/css" href="viewdonorCSS.css">
</head>
<body>
	<div class="search">
	<font size=5 face="Times New Roman">
	<center>Enter Blood Type</center>
	<form  name = "f" action="" method="POST">
  <center> <input type="text" name="searchvalue" value="" required="">
  	<BUTTON id = "srch" name = "submit" value = "Search">Search</BUTTON></center>
</font>
</div>


<?php
		if(isset($_POST['submit']))
		{
					$srchvalue = $_POST['searchvalue'];
				$conn = new mysqli("localhost","root","","Blood_Donor");
				$sql = "SELECT * FROM Donor WHERE Donor_BloodType = '$srchvalue'";
				$result = mysqli_query($conn,$sql);
			if($result->num_rows>0)
			{
?>
		

				<table border="3px" class="contenttable">
		<tbody>
	<tr class="tablehead">	
		<th>S.NO</th>
		<th>Name</th>
		<th>Age</th>
		<th>Gender</th>
		<th>PhoneNo</th>
		<th>Date Of Birth</th>
		<th>Weight</th>
		<th>BloodGroup</th>

	</tr>
	<div  class="tablecontent">

<?php	
				while($row = mysqli_fetch_assoc($result))
				{
					$i = 0;

				$i++;
				echo "
						<tr>
							<td>{$i}</td>
							<td>{$row["Donor_Name"]}</td>
							<td>{$row["Donor_Age"]}</td>
							<td>{$row["Donor_Gender"]}</td>
							<td>{$row["Donor_Phoneno"]}</td>
							<td>{$row["Donor_Dateofbirth"]}</td>
							<td>{$row["Donor_Weight"]}</td>
							<td>{$row["Donor_BloodType"]}</td>
						</tr>
						";
			}
		}
		else
		{
			echo "<script>alert('No Datas Found!!!')</script>";
		}
		}
?>

</body>
</html>