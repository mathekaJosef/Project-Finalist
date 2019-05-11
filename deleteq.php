<?php
session_start();
if(isset($_GET['id'])){
$_SESSION['id']=$_GET['id'];
	 ?>
<script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Are you sure you want to delete the query ?") == true) { 
    window.location.href = "deleteqq.php";
}
else{
  window.location.href = "manage_queries.php";
}</script>

<?php
}

?>