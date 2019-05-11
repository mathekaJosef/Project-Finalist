<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');
$d=mysqli_query($con,"DELETE FROM clients WHERE client_id='$id' ");
if($d){
	header('location:registered_users.php');
}
else{
	echo mysqli_error($con);
}

?>