<?php
  require "../include/db_connect.inc.php";
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
        <li><a href="AdminInformation.php">Admin Information</a></li>
        <li><a href="InformationHR.php">HR Information</a></li>
        <li><a href="InformationEmployees.php">Employees Information</a></li>
        <li><a href="AddHR.php">New HR Account</a></li>
        <li><a href="AddEmployees.php">New Employees Account</a></li>
        <li><a href="AddAdmin.php">New Admin Account</a></li>


			</ul>
		</div>
		<div class="content_right">
			<div class="content_right_l">
				<h3>Profile</h3>

        <?php

        $sql = "SELECT A_id, name, username, email, phone, Gender, Address FROM admin WHERE username='".$_SESSION["user_name"]."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          echo "<table>";
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>Name :</td>";
            echo "<td>".$row["name"]."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Username :</td>";
            echo "<td>".$row["username"]."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Email :</td>";
            echo "<td>".$row["email"]."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Gender :</td>";
            echo "<td>".$row["Gender"]."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Phone :</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Address :</td>";
            echo "<td>".$row["Address"]."</td>";
            echo "</tr>";


          }
          echo "</table>";
        } else {
          echo "0 results";
        }

        $conn->close();


       ?>
			</div>

		</div>
	</div>

</body>
</html>
