<?php
include 'home.php';
?>
<!DOCTYPE html>
<html>
<head>
	<div class="group">
	<title>Edit Donor</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="homeCSS.css">
	<link rel="stylesheet" type="text/css" href="ViewDonorCSS.css">
</head>
<body>
	<center><h1>Donor's  Details</h1></center>
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
		$conn = new mysqli("localhost","root","","Blood_Donor");
		$sql = "SELECT * FROM Donor";
		$result = mysqli_query($conn,$sql);
		if ($result->num_rows>0)
	    {
			$i = 0;
			while ($row = mysqli_fetch_assoc($result))
			 {
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

	?>
</div>
</tbody>
	</table>
</center>
</body>
</div>
</html>