<?php
session_start();
if(isset($_GET['id'])){
$_SESSION['id']=$_GET['id'];
	 ?>
<script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Are you sure you want to delete the vehicle ?") == true) { 
    window.location.href = "deletev.php";
}
else{
  window.location.href = "manage_vehicles.php";
}</script>

<?php
}

?>