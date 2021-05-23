
<?php
require "../include/db_connect.inc.php";
session_start();
$username=$_SESSION["user_name"];

if(!isset($_SESSION["user_name"]))
{
header("location:index.php");
}

 if(isset($_GET['A_id'])) $up_id=$_GET['A_id'];
  $msg="Rejected";
 $mysqlquery="UPDATE absentrequest set status='$msg' where A_id=$up_id" ;

   if ($conn->query($mysqlquery) === TRUE) {
     echo "<script>alert('AbsentRequst has been rejected')</script>";
   echo "<script>location.assign('AbsentRequstList.php')</script>";
   }

   else {
   echo "Error: " . $mysqlquery . "<br>" . $conn->error;
   }
 ?>
