<?php
$con=mysqli_connect('localhost','root','','car');
if(isset($_POST['submit'])){
  $user_name = $_POST['name'];
  $email = $_POST['email'];
  
  $name=$_FILES['upload']['name'];
$size=$_FILES['upload']['size'];
$type=$_FILES['upload']['type'];
$temp=$_FILES['upload']['tmp_name'];

move_uploaded_file($temp,"photo/".$name);

$password = $_POST['password'];

$input = mysqli_query($con,"INSERT INTO login VALUES('','$user_name','$email','$name','$password') ");

if(!$input){
	mysqli_error();
}
else{
	echo "details inserted";
}

}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
  	<input type="text" name="name" placeholder="name">
  	<input type="email" name="email" placeholder="email">
  	<input type="file" name="upload">
  	<input type="password" name="password" placeholder="password">
  	<input type="submit" name="submit" value="submit">
  </form>
</body>
</html>

