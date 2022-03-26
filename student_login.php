<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	.d1{
		width:480px;
		height:580px;
		border:black;
		border-radius:10px;
		border-style:inset;
		position:absolute;
		background-color : #ffffff;
		border-radius : 20px;
		box-shadow: 0px 0px 25px black;
		opacity:0.50;
		border-color : black; 
		border-style : solid;
		}
	.bb{
		width:285px;
		height:40px;
		color:#ffffff;
		border-radius:30px;
		margin-left:20px;
		border:none;
		background-image:linear-gradient(to right,#7474BF 0%, #348AC7 51%, #7474BF 100%)
	   }
</style>
<body style="background-image:url('studbg.JPG');font-family:Century Gothic;">
	<center><br><br>
		
		<div class="d1" style="margin-left:800px;margin-top:10px;">
		<h3 style="margin-top:100px;">Student LogIn Page</h3><br>
		<form action="" method="post">
		<img src="contact.png" style="width:50px ;height:50px;">
			<input type="text" name="email" required placeholder="Enter Email-ID" style="width:250px ;height:30px;border-radius:30px;text-align:center;"><br><br>
			<img src="lock.png" style="width:50px ;height:50px;">	
			<input type="password" name="password" required placeholder="Enter Password" style="width:250px ;height:30px;border-radius:30px;text-align:center;"><br><br>
			<input type="submit" name="submit" value="LogIn" class="bb">
		</form><br>
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>
	</center>
</body>
</html>