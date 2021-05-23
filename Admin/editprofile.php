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
			<h2>UPDATE Profile Information</h2>

<?php


      $sql="SELECT * from admin where username='$username'";

    //  $result=$conn->query($mysqlquery);
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()){
          $eid=$row["A_id"];
          $ename=$row["name"];
          $eemail=$row["email"];
        $uuname=$row["username"];
          //$egender=$row["Gender"];
          $ephone=$row["phone"];
          $eaddress=$row["Address"];



        }

      }
      else
      {
        echo "no data";
      }


?>

<form action="updateProfile.php" method="post">

  <table>
    <tr>
      <td><b>Name :</b></td>
      <td><input type="text" name="name" value="<?php echo $ename; ?>"/></td>

    </tr>
    <tr>
      <td><b>Email :</b></td>
      <td><input type="text" name="email" value="<?php echo $eemail; ?>"/></td>

    </tr>



    <tr>
      <td><b>Phone :</b></td>
      <td><input type="text" name="phone" value="<?php echo $ephone; ?>"></input></td>

    </tr>

    <tr>
      <td><b>Address :</b></td>
      <td><input name="Address" rows="4" cols="60" value="<?php echo $eaddress; ?>"></input></td>

    </tr>

    <tr>

      <td><input type="hidden" name="up_id" value="<?php echo $eid; ?>"></input></td>

    </tr>

    <tr>
      <td align="left" colspan="2"><button type="submit"><b>UPDATE DATA </b></button></td>

    </tr>

  </table>
  </form>



		</div>
	</div>

</body>
</html>
