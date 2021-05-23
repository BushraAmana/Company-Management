<?php
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
			<h2>Welcome <?php echo $username; ?></h2>

			<button type="button" name="button_1" id="btn_1">Motto</button>
	    <br><br>
	    <div style="border: 1px solid black;" id="content_1">

	    </div>

	    <script type="text/javascript">

	      document.getElementById('btn_1').addEventListener('click',loadResponse);

	      function loadResponse(){
	        //Creates an XMLHttpRequest object
	        var xhr = new XMLHttpRequest();

	        //opens the file with a specific request in asyncronous communication mode
	        xhr.open('GET', 'txt.txt', true);
	        //sends the request
	        xhr.send();

	        xhr.onload = function(){
	          if(this.status == 200){
	            document.getElementById('content_1').innerHTML = this.responseText;
	          }else if(this.status == 404){
	            document.getElementById('content_1').innerHTML = "404 - NOT FOUND";
	          }
	        };

	      }

	    </script>

		</div>
	</div>

</body>
</html>
