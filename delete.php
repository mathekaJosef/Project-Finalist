<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');
$d=mysqli_query($con,"DELETE FROM brand WHERE brand_id='$id' ");
if($d){
	header('location:manage_brands.php');
}
else{
	echo mysqli_error($con);
}

?>