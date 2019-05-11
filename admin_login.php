<!DOCTYPE html>
<html>
<head>
	<title>InstaRide</title>
   <link rel="icon" href="car13.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll"> 

<?php
include('connect.php');
session_start();

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $pass = $_POST['password'];
$sql = mysqli_query($con,"SELECT * FROM login WHERE email='$email' AND password = '$pass' ");
if(mysqli_num_rows($sql)>0){

$_SESSION['admin']=$email;

?>
  <script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Login successful") == true) {
    window.location.href = "admin_dashboard.php";
}
else{
  window.location.href = "admin_dashboard.php";
}</script><?php
  
}
else{

?>
  <script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Incorrect login details. please try again") == true) {
    window.location.href = "admin_login.php";
}
else{
  window.location.href = "admin_login.php";
}</script><?php
  
}

}
?>

    <div class="login_img">
    <div class="login_banner">
         <h1 id="sign_in">Sign In</h1>
         <div class="well" id="login-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                    <input type="email" name="email" id="inp_modal" class="form-control" placeholder="Email Address*">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="inp_modal" class="form-control" placeholder="Password*">
                  </div>

                  <div class="form-group">
                    <input type="submit" name="submit" id="btn_modal" class="btn btn-default mt-3" value="Login">
                  </div>
                </form>
              </div>                             
        </div>                 
    </div>
</body>
</html>