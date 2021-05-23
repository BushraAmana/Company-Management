<?php
  require "../include/db_connect.inc.php";
	session_start();
	$username=$_SESSION["user_name"];

	if(!isset($_SESSION["user_name"]))
	{
		header("location:HRindex.php");
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
			<h2>Absent Request response</h2>
      <?php


      	$sql = "SELECT A_id, absensedate, status FROM absentrequest where username='$username'";

      	$result = $conn->query($sql);
        $ResultCount = mysqli_num_rows($result);

      	if ($ResultCount > 0) {
      		// output data of each row
      		?>



      		<?php
      		while($row = $result->fetch_assoc()) {

      			echo $row["absensedate"]." has been ".$row["status"]."<br>";

      			//echo "<td>".$row["password"]."</td>";
      			//echo "<td>".$row["mobile"]."</td>";
      			//echo "<td>".$row["address"]."</td>";

      		}

      	} else {
      		echo "0 results";
      	}

      	$conn->close();
      ?>
      </div>
      <script>
      function deletefn(del_em_id){
        var choice=confirm("Do you want to delete this?");
        if(choice){
          location.assign("deleteAdmin.php?A_id="+del_em_id);
        }

      }

      function updatefn(upd_em_id)
      {
        location.assign("updateAdmin.php?A_id="+upd_em_id);
      }

      </script>

      </body>
      </html>
