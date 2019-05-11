<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');
$d=mysqli_query($con,"DELETE FROM query WHERE id='$id' ");
if($d){
	header('location:manage_queries.php');
}
else{
	echo mysqli_error($con);
}

?>