<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');
$d=mysqli_query($con,"DELETE FROM vehicle WHERE vehicle_id='$id' ");
if($d){
	
	$dd=mysqli_query($con,"DELETE FROM acess WHERE vehicle_id='$id' ");
	if($dd){
header('location:manage_vehicles.php');
	}
	else{
		echo mysqli_error($con);
	}
}
else{
	echo mysqli_error($con);
}

?>