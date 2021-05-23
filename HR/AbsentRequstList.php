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
        <li><a href="InformationEmployees.php">Employees Information</a></li>
        <li><a href="AddEmployees.php">New Employees Account</a></li>
        <li><a href="SubmittedReports.php">Submitted Reports</a></li>
        <li><a href="AbsentRequstList.php">Leave of Absense Request </a></li>
        <li><a href="AsignTasks.php">Asign Tasks</a></li>
        <li><a href="loanRequstList.php">Loan Request List</a></li>



			</ul>
		</div>
		<div class="content_right">
			<h2> All Leave of Absense Request From Employees</h2>

      <?php


      	$sql = "SELECT A_id, name, absensedate, description, status, username FROM absentrequest";
      	$result = $conn->query($sql);
        $ResultCount = mysqli_num_rows($result);

      	if ($ResultCount > 0) {
      		// output data of each row
      		?>
          <table border=1px >

      			<tr>
      				<th>   Id    </th>
      				<th>   Name   </th>
      				<th>   username   </th>
      				<th>   Date for leave of absense   </th>
      				<th>   Cause  </th>
              	<th>   Status  </th>
              <th>   Accept  </th>
      				<th>   Reject   </th>

      			</tr>
      		<?php
      		while($row = $result->fetch_assoc()) {
      			echo "<tr>";
      			echo "<td>".$row["A_id"]."</td>";
      			echo "<td>".$row["name"]."</td>";
      			echo "<td>".$row["username"]."</td>";
      			echo "<td>".$row["absensedate"]."</td>";
      			echo "<td>".$row["description"]."</td>";
            echo "<td>".$row["status"]."</td>";

      			?>
            <td><button type="submit" onclick="acceptfn(<?php echo $row["A_id"] ?>);"><b>Accept</b> </button></td>
            <td><button type="submit" onclick="rejectfn(<?php echo $row["A_id"] ?>);"><b>Reject</b> </button></td>


      			<?php
      			//echo "<td>".$row["password"]."</td>";
      			//echo "<td>".$row["mobile"]."</td>";
      			//echo "<td>".$row["address"]."</td>";
      			echo "</tr>";
      		}
      		echo "</table>";
      	} else {
      		echo "0 results";
      	}

      	$conn->close();
      ?>

      <script>
      function rejectfn(rej_a_id){
        var choice=confirm("Are you sure to reject this request?");
        if(choice){
          location.assign("rejectRequest.php?A_id="+rej_a_id);
        }

      }

      function acceptfn(acc_a_id)
      {
        var choice=confirm("Are you sure to accept this request?");
        if(choice){
        location.assign("acceptRequest.php?A_id="+acc_a_id);
      }
    }
      </script>


		</div>
	</div>

</body>
</html>
