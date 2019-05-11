<?php

include('connect.php');
$cdate=date('y-m-d');
$ty=mysqli_query($con,"SELECT * FROM book WHERE to_date<='$cdate' AND status='CONFIRMED' ");
while($row=mysqli_fetch_assoc($ty)){
	$vid=$row['vehicle_id'];
$up=mysqli_query($con,"UPDATE vehicle SET stat='free' WHERE vehicle_id='$vid' ");
}


?>