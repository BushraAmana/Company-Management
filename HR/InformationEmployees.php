<?php
	session_start();
	require "../include/db_connect.inc.php";


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
<?php
			$sql = "SELECT e_id, name, email, Gender, phone , Address FROM employees";
			$result = $conn->query($sql);
		  $ResultCount = mysqli_num_rows($result);

			if ($ResultCount > 0) {
				// output data of each row
				?>
		    <table border=1px >

					<tr>
						<th>   Id    </th>
						<th>   Name   </th>
						<th>   email   </th>
						<th>    Gender   </th>
						<th>   phone   </th>
						<th>   Address  </th>
		        <th>   Edit  </th>
						<th>   Delete   </th>

					</tr>
				<?php
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$row["e_id"]."</td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["email"]."</td>";
					echo "<td>".$row["Gender"]."</td>";
					echo "<td>".$row["phone"]."</td>";
		      echo "<td>".$row["Address"]."</td>";
					?>
		      <td><button type="submit" onclick="updatefn(<?php echo $row["e_id"] ?>);"><b>Edit</b> </button></td>
		      <td><button type="submit" onclick="deletefn(<?php echo $row["e_id"] ?>);"><b>Delete</b> </button></td>


					<?php
					//echo "<td>".$row["password"]."</td>";
					//echo "<td>".$row["mobile"]."</td>";
					//echo "<td>".$row["address"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			else {
				echo "0 results";
			}

			$conn->close();
		?>


		</div>
	</div>

	<script>
	function deletefn(del_em_id){
	  var choice=confirm("Do you want to delete this?");
	  if(choice){
	    location.assign("deleteEmployee.php?e_id="+del_em_id);
	  }

	}

	function updatefn(upd_em_id)
	{
	  location.assign("updateEm.php?e_id="+upd_em_id);
	}

	</script>

</body>
</html>
