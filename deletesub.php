<?php
session_start();
if(isset($_GET['id'])){
$_SESSION['id']=$_GET['id'];
	 ?>
<script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Are you sure you want to delete the subscriber ?") == true) { 
    window.location.href = "deletes.php";
}
else{
  window.location.href = "manage_subscribers.php";
}</script>

<?php
}

?>