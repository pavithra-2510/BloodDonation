<html>
<head><title>Login Here</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="LoginCSS.css">
</head>
<body>
<div class="login">
<font align="center"  face="Bold Italic">
<h1>Login Here</h1>
<form action="LogDB.php" method="POST">

<p>Email</p>
<input type="text" name="Uemail"  placeholder="Enter Email" >
<p>Password</p>
<input type="password" name="Upassword" placeholder="Enter Password">
<h5 align="center"><input type="submit"  class="btn btn-success"  value="LOGIN" name="LOGIN">
</h5>
<h4>Don't Have an Account?</h4><BUTTON class="bt" name = "REGISTER">REGISTER HERE...</BUTTON>
<br>
<br>
<br>
<h4 align="right"><BUTTON class="btn btn-danger" name="FORGOT">FORGOT  PASSWORD?</BUTTON></h4>
<br>
<?php
if(isset($_POST['REGISTER']))
{
	header("Location:Register.php");
}
if(isset($_POST['FORGOT']))
{
	header("Location:Forgot.php");
}
?>
</form>
</div>
</body>
</html>
