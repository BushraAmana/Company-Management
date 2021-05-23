<?php

  require "include/db_connect.inc.php";

  session_start();

  $uName = $uPass = $uPassInDB = "";
  $uNameErr = $uPassErr = "";

  if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(empty($_POST['uname'])){
    //  $uNameErr = "Username cannot be empty!";
  echo "<script>alert('Username cannot be empty!')</script>";
    }else{
      $uName = $_POST['uname'];
    }

    if(empty($_POST['pass'])){
      //$uPassErr = "Password cannot be empty!";
        echo "<script>alert('password cannot be empty!')</script>";
    }else{
      $uPass = $_POST['pass'];
    }

    if(!empty($uName) && !empty($uPass))
    {
      $sqlUserCheck = "select * from admin where username = '$uName';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1)
      {
        $sqlUserCheck = "select * from hrs where username = '$uName';";

        $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
        $userCount = mysqli_num_rows($resultUserCheck);

        if($userCount < 1)
        {
          $sqlUserCheck = "select * from Employees where username = '$uName';";

          $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
          $userCount = mysqli_num_rows($resultUserCheck);

              if($userCount < 1)
              {
               //$uNameErr = "User does not exist";
              echo "<script>alert('User does not exist')</script>";
              }
              else
              {

               while($row = mysqli_fetch_assoc($resultUserCheck)){
               $uPassInDB = $row['password'];

                }

                if(password_verify($uPass, $uPassInDB)){
                   $_SESSION["user_name"] = $uName;
                   $cookie_name = "username";
                   $cookie_value = $uName;
                   setcookie($cookie_name, $cookie_value, time() + (86400 * 30));


                  header("Location: Employee/index.php");
                }
               else
               {
               //$uPassErr = "Wrong password!";
                 echo "<script>alert('Wrong password!')</script>";
               }
           }
        }
        else{
        //  $uNameErr = "User does not exist";
           while($row = mysqli_fetch_assoc($resultUserCheck))
           {
             $uPassInDB = $row['password'];

          }

          if(password_verify($uPass, $uPassInDB))
          {
          $_SESSION["user_name"] = $uName;
          $cookie_name = "username";
          $cookie_value = $uName;
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30));

          header("Location: HR/index.php");
          }
          else
          {
          //$uPassErr = "Wrong password!";
           echo "<script>alert('Wrong password!')</script>";
          }
        }
      }
      else{
        while($row = mysqli_fetch_assoc($resultUserCheck))
        {
          $uPassInDB = $row['password'];

        }

        if(password_verify($uPass, $uPassInDB))
        {
          $_SESSION["user_name"] = $uName;
          $cookie_name = "username";
          $cookie_value = $uName;
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30));

          header("Location: Admin/index.php");
        }
				else{
          //$uPassErr = "Wrong password!";
           echo "<script>alert('Wrong password!')</script>";
        }
      }



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

		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>

		</div>

	<div class="content_area">
		<h2>LOG IN</h2>
		<form method="post">
			<table align="center">

				<tr>
					<td><b>Username :</b></td>
					<td><input type="text" name="uname" placeholder="Username" title="Enter your username here"/></td>

				</tr>

				<tr>
					<td><b>Password :</b></td>
					<td><input type="password" name="pass" placeholder="Password" title="Enter your password here"/></td>

				</tr>
				

				<tr>
					<td align="center" colspan="2"><button type="submit" > <b>Log in </b></button></td>

				</tr>

			</table>


		</form>

	</div>


</body>
</html>
