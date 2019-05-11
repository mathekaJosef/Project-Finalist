<?php
session_start();
if(isset($_GET['id'])){
$_SESSION['id']=$_GET['id'];
	 ?>
<script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Are you sure you want to delete the brand ?") == true) { 
    window.location.href = "delete.php";
}
else{
  window.location.href = "manage_brands.php";
}</script>

<?php
}

?>