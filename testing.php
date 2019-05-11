<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
   <?php
	  include('connect.php');

	  // $sql = mysqli_query($con, "SELECT * FROM book WHERE MONTH(STR_TO_DATE(date, '%y/%m/%d')) = '3'");
	  $sql = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 3");

	  $result = mysqli_num_rows($sql);
	  echo $result;

	  // while($row = mysqli_fetch_assoc($output)){
	  // 	echo $row['month'];
	  // }

   ?>
</body>
</html>