<?php
session_start();
$id=$_GET['id'];
include('connect.php');
$_SESSION['id']=$id;

$up=mysqli_query($con,"UPDATE book SET status='CONFIRMED' WHERE id = '$id' ");
if($up){
header('location:send_confirmation.php');
}
else{
	echo mysqli_error($con);
}
?>