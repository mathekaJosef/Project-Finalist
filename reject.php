<?php

$id=$_GET['id'];

include('connect.php');

$ee=mysqli_query($con,"SELECT * FROM book WHERE id='$id' ");
while($row=mysqli_fetch_assoc($ee)){
	$vid=$row['vehicle_id'];
}

//$sql = "UPDATE book SET status='REJECTED' WHERE id = '$id' ";
//$output = mysqli_query($con, $sql);

$up=mysqli_query($con,"UPDATE book SET status='REJECTED' WHERE id = '$id' ");
if($up){

	$tt=mysqli_query($con,"UPDATE vehicle SET stat='free' WHERE vehicle_id='$id' ");
	if($tt){
header('location:manage_bookings.php');
}
else{echo mysqli_error($con);}
}
else{
	echo mysqli_error($con);
}

?>