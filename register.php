<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	$empid = $_POST['empid'];
	$doj = $_POST['doj'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$salary = $_POST['salary'];
	$email = $_POST['email'];
	$phno = $_POST['phno'];
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];

	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords do not match.')</script>";
	} else {
		//Check if user with the same employee id already exists
		$query = "SELECT * FROM emp where email='$email' or empID='$empid'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User already registered. Please login.')</script>";
		} else {
			//Insert new employee entry into database 
			$query = "INSERT INTO emp (empID, passwd, empName, DoJ, salary, department, mobileNo, email) 
				VALUES ('$empid','$pwd1','$name','$doj','$salary','$dept','$phno','$email')";

			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: index.php");
			} else {
				echo "<script>alert('Something went wrong!')</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

  <style>
    body{
      margin-top: 50px;
    }
    .register-btn{
      padding: 8px 20px;
      font-size: 15px;
      background-color: #337ab7;
      color: white;
      border: none;
      border-radius: 5px;
      margin-right: 10px;
    }

    .register-btn:hover{
      background-color:#4f86b6;
    }

    .panel{
      border: 1px solid black;
    }

    .panel-heading{
      border-bottom: 1px solid black;
      background-color: #337ab7;
      color: white;
      text-align: center;
    }

		.login:link{
      text-decoration: none;
			margin-left: 6px;
			font-size: 16px;
    }
    
    .login:hover{
      color: rgb(27, 194, 194);
    }
  </style>

<body>
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel">
				<div class="panel-heading">
					<h1>Registration Form</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="eid">Employee ID</label>
									<input type="text" class="form-control" name="empid" id="eid" placeholder="EID1" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="joiningDate" class="form-label">Date of Joining</label>
									<input type="date" class="form-control form-control-lg" name="doj" id="joiningDate" required />
								</div>

							</div>
						</div>
						<div class="form-group">
							<label for="name" class="form-label">Full Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Robert Smith" required />
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="dep">Department</label>
									<select class="form-control" id="dep" name="dept">
										<option>Technical</option>
										<option>Human Resources</option>
										<option>Management</option>
										<option>Creative</option>
										<option>Marketing</option>
										<option>Social Media</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="sal" class="form-label">Salary</label>
									<input type="number" class="form-control" id="sal" name="salary" placeholder="30000" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Email ID</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="abc@xyz.com" required />
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label for="phno" class="form-label">Mobile Number</label>
									<input type="tel" class="form-control" id="phno" name="phno" placeholder="9086538055" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="pwd1" class="form-label">Password</label>
							<input type="password" class="form-control" name="pwd1" id="pwd1" required />
						</div>
						<div class="form-group">
							<label for="pwd2" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="pwd2" id="pwd2" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit" class="register-btn">Register</button>
								Already a user? <a class="login" href="index.php">Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
