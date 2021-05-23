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
        <li><a href="Tasks.php">Monthly Tasks</a></li>
        <li><a href="AbsentRequst.php">Leave of Absense Request </a></li>
        <li><a href="SubmitReports.php">Monthly Reports Submittion</a></li>
        <li><a href="notification.php">Absense request status</a></li>
          <li><a href="LoanRequest.php">Requesting a loan from company</a></li>



			</ul>
		</div>
		<div class="content_right">
		<form method="post" enctype="multipart/form-data" action="SubmitReports.php" >

      	<h2 style="color:green">All Tasks for this month is given below</h2>
      <?php

      $files = scandir("../tasks");
      for ($a = 2; $a < count($files); $a++)
      {
      ?>
      <P style="color:green"><a download="<?php echo $files[$a] ?>" href="../tasks/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a> </p>
      <?php
      }
      ?>


    </form>




		</div>
	</div>

</body>
</html>
