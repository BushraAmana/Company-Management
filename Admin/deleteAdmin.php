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
if(isset($_GET['A_id'])) $delete_id=$_GET['A_id'];

$mysqlquery="delete from admin where A_id=$delete_id";

//$conn->quary($mysqlquery);
if ($conn->query($mysqlquery) === TRUE)
{
  echo "<script>location.assign('AdminInformation.php');</script>";

}
else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();




 ?>
