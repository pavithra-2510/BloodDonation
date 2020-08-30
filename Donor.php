<?php 
include 'Dashboard.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Donor</title>
 	<link rel="stylesheet" type="text/css" href="homeC.css">
 </head>
 <body>
 	<div class="sidebar">
		<ul>
			<li><a href="Dashboard.php">Dashboard</a></li>
			<li><a href="edit.php">Edit</a></li>
			<li><a href="Donor.php">Donor Login</a>
				<ul class="donor">
					<li><a href="addDonor.php">Add Donor</a></li>
					<li><a href="editDonor.php">Edit Donor</a></li>
					<li><a href="viewDonor.php">View Donors</a></li>
					<li><a href="RemoveDonor.php">Remove Donor</a></li>
				</ul>
	
			</li>
			<li><a href="User.php">User Login</a></li> 
			<li><a href="index.php">Logout</a></li>
		</ul>
	</div>
    
 </body>
 </html>