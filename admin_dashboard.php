<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
			
		}
		#left_side{
			
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}
		.bb{
		margin-top:20px;
		width:250px;
		height:40px;
		color:#ffffff;
		border-radius:30px;
		margin-left:02px;
		border:none;
		background-image:linear-gradient(to right,#AA076B 0%, #61045F 51%, #AA076B 100%)
	   }
	   .bbb{
		  margin-top:20px;
		width:250px;
		height:40px;
		color:#ffffff;
		border-radius:30px;
		margin-left:02px;
		border:none;
		background-image:linear-gradient(to right,#00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)
	   }
	    .bbbb{
		width:200px;
		height:30px;
		color:#ffffff;
		border-radius:30px;
		border:none;
		background-image:linear-gradient(to right,#FF0084 0%, #33001B 49%, #FF0084 100%)
	   }
	   
	</style>
	<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>
<body style="font-family:Century Gothic;">
	<div id="header"><br>
		<center>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
		<a href="logout.php">Logout</a>
		</center>
	</div>
	<span id="top_span"><marquee>Note:- This portal is open till 31st June 2021...Plz edit your information, if wrong.</marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<input type="submit" name="search_student" value="Search Student" class="bb">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_student" value="Edit Student" class="bbb">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add_new_student" value="Add New Student" class="bb">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="delete_student" value="Delete Student" class="bbb">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show teacher" value="Show Teachers" class="bb">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side" style="background-image:url('bg4.JPG');"><br><br>
		<div id="demo">
		<!-- #Code for search student---Start-->
			<?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">
					<h2 style="color:#006622;"><b></u>View Student Details</u></b></h2><br><br>
					&nbsp;&nbsp;<b style="color:#0000cc;">Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no" style="border-radius:30px;">
					<input type="submit" name="search_by_roll_no_for_search" value="Search" class="bbbb">
					</form><br><br>
					
					</center>
					<?php
				}
				if(isset($_POST['search_by_roll_no_for_search']))
				{
					$query = "select * from students where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<table style="color:#0000cc;margin-top:50px;" align="center">
							<tr>
								<td>
									<b>Roll No:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['roll_no']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Father's Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['father_name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Class:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['class']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Mobile:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['mobile']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Password:</b>
								</td> 
								<td>
									<input type="password" value="<?php echo $row['password']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Remark:</b>
								</td> 
								<td>
									<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
								</td>
							</tr>
						</table>
						<?php
					}
				}
			?>
		<!-- #Code for edit student details---Start-->
		<?php
			if(isset($_POST['edit_student']))
			{
				?>
				<center>
				<form action="" method="post">
				<h2 style="color:#006622;"><b></u>Update Student Details</u></b></h2><br><br>
				&nbsp;&nbsp;<b style="color:#0000cc;">Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no" style="border-radius:30px;">
				<input type="submit" name="search_by_roll_no_for_edit" value="Search" class="bbbb">
				</form><br><br>
				
				</center>
				<?php
			}
			if(isset($_POST['search_by_roll_no_for_edit']))
			{
				$query = "select * from students where roll_no = $_POST[roll_no]";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="admin_edit_student.php" method="post">
						<table style="color:#0000cc;margin-top:50px;" align="center">
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text"  name="roll_no" value="<?php echo $row['roll_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" value="<?php echo $row['class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="edit" value="Save" class="bbbb">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
		?>
		<!-- #Code for Delete student details---Start-->
		<?php
			if(isset($_POST['delete_student']))
			{
				?>
				<center>
				<form action="delete_student.php" method="post" style="margin-top:80px;">
				<h2 style="color:#006622;"><b></u>Delete Student Details</u></b></h2><br><br>
				&nbsp;&nbsp;<b style="color:#0000cc;">Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no" style="border-radius:30px;">
				<input type="submit" name="search_by_roll_no_for_delete" value="Delete" class="bbbb">
				</form><br><br>
				</center>
				<?php
			}
			?>

			<?php 
				if(isset($_POST['add_new_student'])){
					?>
					<center><h2 style="color:#006622;margin-bottom:50px;"><b>Fill the given details:</b></h2></center>
					<form action="add_student.php" method="post">
						<table style="color:#0000cc;" align="center">
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" name="roll_no" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" placeholder="Optional" name="remark"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input type="submit" name="add" value="Add Student"  class="bbbb"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			<?php
				if(isset($_POST['show_teacher']))
				{
					?>
					<center>
						<h2 style="color:#006622;margin-bottom:80px;"><b>Teacher's Details</b></h2>
						<table>
							<tr>
								<td id="td"><b>ID</b></td>
								<td id="td"><b>Name</b></td>
								<td id="td"><b>Mobile</b></td>
								<td id="td"><b>Courses</b></td>
								<td id="td"><b>View Detail</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from teachers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;color:#0000cc;">
							<tr>
								<td id="td"><?php echo $row['t_id']?></td>
								<td id="td"><?php echo $row['name']?></td>
								<td id="td"><?php echo $row['mobile']?></td>
								<td id="td"><?php echo $row['courses']?></td>
								<td id="td"><a href="#">View</a></td>
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>