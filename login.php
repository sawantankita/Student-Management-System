<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	.bb{
		width:285px;
		height:50px;
		color:#ffffff;
		border-radius:30px;
		margin-left:150px;
		border:none;
		background-image:linear-gradient(to right,#00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)
	   }
</style>
<body style="background-image:url('bg15.jpg');font-family:Century Gothic;">
	
	<h1 style="margin-left:120px;color:#ffffff;font-size:50px;margin-top:50px;"><b>Student Management System</b></h1><br>
	<form action="" method="POST">
	<img src="adminlogo.png" style="width:250px ;height:250px;margin-top:100px;margin-left:180px;">	
	<img src="studlogo.png" style="width:300px ;height:300px;margin-top:60px;margin-left:150px;">	<br>
		<input type="submit" name="admin_login" value="Admin Login" required class="bb">
		
			
		<input type="submit" name="student_login" value="Student Login" required class="bb">
	</form>
	<?php
		if(isset($_POST['admin_login'])){
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			header("Location: student_login.php");
		}
	?>
	</center>
</body>
</html>