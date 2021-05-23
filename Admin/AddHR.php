<?php
session_start();
$username=$_SESSION["user_name"];

if(!isset($_SESSION["user_name"]))
{
  header("location:index.php");
}

  require "../include/db_connect.inc.php";

$name=$username=$email=$password=$gender=$address=$phone=$insert="";
$nameEr=$usernameEr=$emailEr=$genderEr=$phoneEr=$passEr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(empty($_POST['u_name'])){
    $nameEr = "Name cannot be empty!";
  }else{
    $name =mysqli_real_escape_string($conn, $_POST['u_name']);
  }
  if(empty($_POST['username'])){
    $usernameEr = "Username cannot be empty!";
  }else{
    $username =mysqli_real_escape_string($conn, $_POST['username']);
  }
  if(empty($_POST['u_email'])){
    $emailEr = "Email cannot be empty!";
  }else{
    $email = mysqli_real_escape_string($conn, $_POST['u_email']);
  }
  if(empty($_POST['gender'])){
    $genderEr = "Gender cannot be empty!";
  }else{
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  }
  if(empty($_POST['phone'])){
    $phoneEr = "Phone cannot be empty!";
  }else{
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  }
  if(!empty($_POST['address'])){
        $address = mysqli_real_escape_string($conn, $_POST['address']);
  }


      if(!empty($_POST['pass']) && ($_POST['pass'])==($_POST['c_pwd'])){

        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        $uPassToDb = password_hash($password, PASSWORD_DEFAULT);

        $sqlUers = "select h_id from hrs where username = '$username'";
        $results = mysqli_query($conn, $sqlUers);

        $rowCount = mysqli_num_rows($results);

        if($rowCount > 0){
          $usernameEr = "UserName already exists!";

        }
        else{
          $sql = "INSERT INTO hrs (name, email, username, password, Gender, phone, Address) VALUES ('$name', '$email', '$username', '$uPassToDb', '$gender', '$phone', '$address')";

              if ($conn->query($sql) === TRUE) {
              $insert="New record created successfully";
              }

              else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              }

        }
      }
      else {
        $passEr="password doesn't match";
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
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        		<h2 style="color:white">HR REGISTRATION</h2>
  			<table align="center">
  				<tr>
  					<td><label><b> Name :</b></label></td>
  					<td><input type="text" name="u_name" required></td>

  				</tr>
  				<tr>
  					<td><label><b>Email :</b></label></td>
  					<td><input type="email" name="u_email" required></td>

  				</tr>
  				<tr>
  					<td><label><b>UserName :</b></label></td>
  					<td><input type="text" name="username" required></td>


  				</tr>
  				<tr>
  					<td><label><b>Password :</b></label></td>
  					<td><input type="password" name="pass" required></td>

  				</tr>
          <tr>
            <td> <label><b>Confirm Password:</b> </label> </td>
            <td> <input type="password" name="c_pwd" value="" required> </td>
          </tr>
          <tr>
            <td valign="top"> <label><b>Gender: </b></label> </td>
            <td>
                <input type="radio" name="gender" value="male" checked> Male <br>
                <input type="radio" name="gender" value="female" checked>  Female <br>
                <input type="radio" name="gender" value="others" checked> Others <br>

            </td>
          </tr>

          <tr>
            <td valign="top"> <label><b>Address: </b></label> </td>
            <td> <textarea name="address" rows="6" cols="80"></textarea> </td>
          </tr>

          <tr>
            <td> <label><b>Phone: </b></label> </td>
            <td>+88 <input type="number" name="phone" value="" min="1" required> </td>
          </tr>

          <tr>
            <td style="color:red"><?php echo $usernameEr ?> </td>
              <td style="color:red"><?php echo $passEr ?> </td>
          </tr>
          <tr>
            <td style="color:green"><?php echo $insert ?> </td>

          </tr>
  				<tr>
  					<td align="center" colspan="2"><button type="submit"><b>Registration </b></button></td>

  				</tr>

  			</table>


  		</form>

			</div>
		</div>
	</div>
