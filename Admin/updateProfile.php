<?php
require "../include/db_connect.inc.php";
session_start();
$username=$_SESSION["user_name"];

if(!isset($_SESSION["user_name"]))
{
header("location:index.php");
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['Address']) && isset($_POST['up_id']))
{
  $newname=$_POST['name'];
  $newemail=$_POST['email'];
  $newphone=$_POST['phone'];
  $newaddress=$_POST['Address'];
  $id=$_POST['up_id'];

  $mysqlquery="UPDATE admin set name='$newname', email='$newemail', phone='$newphone', Address='$newaddress' where A_id=$id";

  if ($conn->query($mysqlquery) === TRUE) {
  echo "<script>location.assign('profile.php')</script>";
  }

  else {
  echo "Error: " . $mysqlquery . "<br>" . $conn->error;
  }
}

 ?>
