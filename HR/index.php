<?php
	session_start();
	$username=$_SESSION["user_name"];

	if(!isset($_SESSION["user_name"]))
	{
		header("location:index.php");
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Logged in as <a style="color:red;" href="profile.php"><?php echo $username; ?></a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div class="content_area">
		<div class="content_left">
			<h3>Account</h3>
			<ul>
				<li><a href="profile.php">View Profile</a></li>
				<li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
				<li><a href="InformationEmployees.php">Employees Information</a></li>
				<li><a href="AddEmployees.php">New Employees Account</a></li>
        <li><a href="SubmittedReports.php">Submitted Reports</a></li>
        <li><a href="AbsentRequstList.php">Leave of Absense Request </a></li>
        <li><a href="AsignTasks.php">Asign Tasks</a></li>
				<li><a href="loanRequstList.php">Loan Request List</a></li>



			</ul>
		</div>
		<div class="content_right">
			<h2>Welcome <?php echo $username; ?></h2>

		</div>
	</div>

</body>
</html>
