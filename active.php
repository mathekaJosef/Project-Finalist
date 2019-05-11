<?php

$id=$_GET['id'];

include('connect.php');


$up = mysqli_query($con,"UPDATE testimonials SET status = 'active' WHERE id = '$id' ");
if($up){
header('location:manage_testimonials.php');
}
else{
	echo mysqli_error($con);
}

?>