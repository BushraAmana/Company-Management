<?php
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
		<form method="post" enctype="multipart/form-data" action="AsignTasks.php" >

      <h2 style="color:green">Submit your Reports here</h2>
      <input type="file" name="fileToUpload">
      <input type="submit" name="upload">
    </form>

    <?php

    $files = scandir("../tasks");
    for ($a = 2; $a < count($files); $a++)
    {
    ?>
    <P style="color:green"><a download="<?php echo $files[$a] ?>" href="../tasks/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a> </p>
    <?php
    }
    ?>


		</div>
	</div>

</body>
</html>
<?php

  if($_SERVER["REQUEST_METHOD"]=="POST"){

    $target_dir = "../tasks/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    //$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image




    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 900000) {
    //  echo "Sorry, your file is too large.";
        echo "<script>alert('Sorry, your file is too large!')</script>";
      $uploadOk = 0;
    }
    if (file_exists($target_file)) {
      //echo "Sorry, file already exists.";
      echo "<script>alert('Sorry, file already exists!')</script>";
      //  echo "<script>alert('password cannot be empty!')</script>";

      $uploadOk = 0;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      //echo "Sorry, your file was not uploaded!";
      echo "<script>alert('Sorry, your file was not uploaded!')</script>";

    //  header("location:SubmitReports.php");
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //echo "<script>prompt('The file has been uploaded!')</script>";
        echo "<script>alert('The file has been uploaded!')</script>";

      //  header("location:SubmitReports.php");
      } else {
        //echo "Sorry, there was an error uploading your file.";
        echo "<script>alert('Sorry, there was an error uploading your file!')</script>";

      //  header("location:SubmitReports.php");
      }
    }

  }
?>
