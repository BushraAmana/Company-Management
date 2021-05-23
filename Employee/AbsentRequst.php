<?php
  require "../include/db_connect.inc.php";
	session_start();
	$username=$_SESSION["user_name"];

	if(!isset($_SESSION["user_name"]))
	{
		header("location:index.php");
	}
?>

<?php

$name=$date=$cause="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(!empty(($_POST['u_name']) && ($_POST['date']) && ($_POST['cause']))){

		$name=$_POST['u_name'];
		$date=$_POST['date'];
		$cause=$_POST['cause'];

		$sql = "INSERT INTO absentrequest (name, absensedate, username, description, status) VALUES ('$name', '$date', '$username', '$cause', '')";

				if ($conn->query($sql) === TRUE) {
					 echo "<script>alert('Absent request has been Submitted')</script>";

				}

				else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				}

	}

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
			<h2>Request for oneday leave of absence</h2>


			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table align="center">
					<tr>
						<td><label><b> Name :</b></label></td>
						<td><input type="text" name="u_name" required></td>

					</tr>

					<tr>
						<td><label><b>Username :</b></label></td>
						<td><input type="text" name="user_name" value="<?php echo $username;?>" disabled></td>

					</tr>


					<tr>
						<td><label><b>Date :</b></label></td>
						<td><input type="date" name="date" required></td>

					</tr>


	        <tr>
	          <td valign="top"> <label><b>Cause: </b></label> </td>
	          <td> <textarea name="cause" rows="6" cols="80"></textarea> </td>
	        </tr>



					<tr>
						<td align="center" colspan="2"><button type="submit"><b>Request </b></button></td>

					</tr>

				</table>


			</form>

		</div>
	</div>

</body>
</html>
