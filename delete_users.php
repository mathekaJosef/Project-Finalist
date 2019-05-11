<?php
session_start();
if(isset($_GET['id'])){
$_SESSION['id']=$_GET['id'];
	 ?>
<script>
var x=window.onbeforeunload;
if (confirm("Do you want to delete this user?") == true) { 
    window.location.href = "confirm_delete_user.php";
}
else{
  window.location.href = "registered_users.php";
}</script>

<?php
}

?>