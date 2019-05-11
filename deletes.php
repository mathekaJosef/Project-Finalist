<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');
$d=mysqli_query($con,"DELETE FROM subscribe WHERE id='$id' ");
if($d){
	header('location:manage_subscribers.php');
}
else{
	echo mysqli_error($con);
}

?>