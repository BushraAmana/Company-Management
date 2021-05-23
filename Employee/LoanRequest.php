<?php
	session_start();
    require "../include/db_connect.inc.php";
	$username=$_SESSION["user_name"];

	if(!isset($_SESSION["user_name"]))
	{
		header("location:index.php");
	}
?>
<?php

$name=$username=$phone=$amount="";



  if(isset(($_POST['u_name'])) && isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['amount']) ){
    $name=$_POST['u_name'];
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $amount=$_POST['amount'];

   $sql = "INSERT INTO loanrequest (name, username, phone, amount) VALUES ('$name', '$username', '$phone', '$amount')";

    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('loan request is successful')</script>";
    }

    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

 ?>
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
			<h2>Apply for a loan request from the company :</h2>
      <form name="MyForm" action="LoanRequest.php"  method="post" onsubmit="return validateFrom()">

        <table align="center">
  				<tr>
  					<td><label><b> Name :</b></label></td>
  					<td><input type="text" id="u_name" name="u_name" ></td>

  				</tr>

  				<tr>
  					<td><label><b>UserName :</b></label></td>
  					<td><input type="text" id="username" name="username" ></td>

  				</tr>


            <td> <label><b>Phone: </b></label> </td>
            <td>+88 <input type="number" id="phone" name="phone" value="" min="1" > </td>
          </tr>

          <td> <label><b>Loan Amount: </b></label> </td>
          <td><input type="number" id="amount" name="amount"  > </td>
        </tr>



  				<tr>
  					<td align="center" colspan="2"><button type="submit"><b>Submit </b></button></td>

  				</tr>

  			</table>
      </form>

		</div>
	</div>

  <script>


function validateFrom()
  {
    var u_name = document.getElementById("u_name").value;
    var username = document.getElementById("username").value;
    var phone = document.getElementById("phone").value;
    var amount = document.getElementById("amount").value;

  if(u_name == "" || username == "" || phone == "" || amount =="")
  {
    alert('please fill up everything');
    return false;
  }
  else{
    return true;




  }
}

  </script>

</body>
</html>
