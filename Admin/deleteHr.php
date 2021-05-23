<?php
require "../include/db_connect.inc.php";
	session_start();
	$username=$_SESSION["user_name"];

	if(!isset($_SESSION["user_name"]))
	{
		header("location:index.php");
	}
?>
<?php
if(isset($_GET['H_id'])) $delete_id=$_GET['H_id'];

$mysqlquery="delete from hrs where H_id=$delete_id";

//$conn->quary($mysqlquery);
if ($conn->query($mysqlquery) === TRUE)
{
  echo "<script>location.assign('InformationHR.php');</script>";

}
else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();




 ?>
