<?php
  require "../include/db_connect.inc.php";
	session_start();
	$uname=$_SESSION["user_name"];
	if(!isset($_SESSION["user_name"]))
	{
		header("location:index.php");
	}
	$error="";
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>

</head>
<body>
	<div class="header_area">
		<div class="logoarea">
      	<link rel="stylesheet" href="style.css">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Logged in as <a style="color:red;" href="profile.php"><?php echo $uname; ?></a></li>
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
			<h3>Change Password</h3>
			<?php

        $uPassInDB=$uPassToDB=$password="";

				$sql = "SELECT H_id, name, username, email,password FROM hrs WHERE username='".$_SESSION["user_name"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
        {
					// output data of each row

					while($row = mysqli_fetch_assoc($result))
           {

						$eid=$row["H_id"];
						$ename=$row["name"];
						$eemail=$row["email"];
						$uuname=$row["username"];
            $uPassInDB =$row["password"];

					}

				}
         else
        {
					echo "0 results";
				}



?>
		<form method="post">
		<table>
			<tr>
				<td><b>Current password :</b></td>
				<td><input type="password" name="oldpass" /></td>

			</tr>
			<tr>
				<td><b>New password :</b></td>
				<td><input type="password" name="newpass"/></td>

			</tr>

			<tr>
				<td><b>Retype New Password :</b></td>
				<td><input type="password" name="renewpass"/></td>

			</tr>




			<tr>
				<td align="center" colspan="2"><button type="submit">Submit</button></td>

			</tr>

		</table>
<?php
    		if ($_SERVER["REQUEST_METHOD"] == "POST")
        {


              if(password_verify($_POST['oldpass'], $uPassInDB))
              {



                if(!empty($_POST['newpass']) && ($_POST['newpass'])==($_POST['renewpass']))
                {

                       $password = mysqli_real_escape_string($conn, $_POST['newpass']);
                      $uPassToDb = password_hash($password, PASSWORD_DEFAULT);

    					$sql = "UPDATE hrs SET password='$uPassToDb' WHERE username='$uuname'";
    					//$sql = "INSERT INTO products (product_name, description, quantity)
    					//VALUES ('".$_POST["pname"]."', '".$_POST["description"]."', '".$_POST["quantity"]."')";

    					if ($conn->query($sql) === TRUE)
              {

                echo "<script>alert('Password changed successfully')</script>";
    					}
               else
              {
    						echo "Error: " . $sql . "<br>" . $conn->error;
    					}

    					$conn->close();
    				  header("Location:../login.php");
    				}
    				else
            {
    					$error="Password don't match";
    				}
    			}
    			else
          {
    				$error="Incorrect Password";
    			}
        }


    			//header("Location:profile.php");



    	?>


	</form>
		<?php echo $error; ?>
		</div>
	</div>
	<div class="footer_area">
		<h3>&copy; all right reserved Shakil Ahammed</h3>
	</div>

</body>
</html>
