<?php
session_start();
include('connect.php');
if(isset($_POST['submit'])){
  $full_name=$_POST['full_name'];
  $email=$_POST['email'];
  $phone=$_POST['phone_no'];
  $password=$_POST['password'];
  $cpassword=$_POST['confirm_password'];

  if($cpassword==$password){

$in=mysqli_query($con,"INSERT INTO clients(client_id,fullname,email,phone,password) VALUES('','$full_name','$email','$phone','$password') ");

if($in){ 

?>
  <script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("signup successful, you can now login") == true) {
    window.location.href = "home.php";
}
else{
  window.location.href = "home.php";
}</script><?php
  
}
else{
  echo mysqli_error($con);
}


}
else{
  echo '<script language="javascript">';
echo 'alert("Conformation password does not match password, Please try again")';
echo '</script>';

}

}
if(isset($_POST['submit1'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];
$se=mysqli_query($con,"SELECT * FROM clients WHERE email='$email' AND password = '$pass' ");
if(mysqli_num_rows($se)>0){
$_SESSION['email']=$email;

?>
  <script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Login successful") == true) {
    window.location.href = "car_listing.php";
}
else{
  window.location.href = "car_listing.php";
}</script><?php
  
}
else{

?>
  <script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Incorrect login details. please try again") == true) {
    window.location.href = "home.php";
}
else{
  window.location.href = "home.php";
}</script><?php
  
}

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>InstaRide</title>
   <link rel="icon" href="car13.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="project_f.css">

  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- navbar -->  
   
   <?php
      require_once('navbar.php');
   ?>

   <!-- dashboard -->
    <section id="dashboard">
              <div id="myCarousel" class="carousel slide carousel-fade"  data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol> 

                  <div class="carousel-inner" role="listbox">
                      <div class="item active">
                          <img src="car8.jpg" id="img" style="height: 500px;">
                      <div class="carousel-caption" id="bg-color">
                          <div class="bg_jumbo">
                            <p id="bg_para"></p>
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>About Us</strong></h1>
                            <p id="bg_same2">Home <i class="fa fa-angle-right"></i> About Us</p>
                          </div>
                          <br>
                           <div class="overlay-detail text-center">
                      </div>
                      </div> 
                  </div>
                  </div>
              </div>
        </section>

        <!-- about section -->

        <section id="section_about">
          <h1 style="color: #8d2f5d;"><strong>About Us</strong></h1>
          <p> 
            <?php
              include('connect.php');
              $ee=mysqli_query($con,"SELECT * FROM about");
              while($row=mysqli_fetch_assoc($ee)){
                echo $row['words'];
              }

            ?>
        </p>
        </section>
   


       <!-- section four -->

       <section id="service4">
          <div class="container">
            <div class="row" id="row">
              <br><br><br>
              <div class="col-sm-3">
                <h5><strong>MENU</strong></h5>
                <br>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="home.php" id="menu">Home</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="about_us.php" id="menu" style="color: #fff;">About Us</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="car_listing.php" id="menu">Car Listing</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="" id="menu">FAQ<sup>s</sup></a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="contact_us.php" id="menu">Contact Us</a></p>
              </div>
              <div class="col-sm-3">
                 
              </div>
              <?php
                 include('connect.php');
                 if(isset($_POST['my_submit'])){
                   $myEmail = mysqli_real_escape_string($con, $_POST['my_email']);
                   $my_date = date('y-m-d');

                   $query = "INSERT INTO subscribe (my_email, date_subscribed) VALUES('$myEmail', '$my_date')";
                   $output = mysqli_query($con, $query);

                   if(!$output){
                    exit('subscription failed'.mysqli_error($con));
                   }else{
                    ?>
                    <script type="text/javascript">
                      alert('Subscription done successfully!');
                    </script>
                    <?php
                   }
                 }
                ?>
              <div class="col-sm-3">
                <h5><strong>SUBSCRIBE NEWSLETTER</strong></h5>
                 <form action="about_us.php" method="POST">
                  <br><br>
                        <div class="form-group">
                          <input type="email" name="my_email" class="form-control" id="form3" placeholder="Enter Email Address *">
                        </div>
                        <div class="form-group">
                          <input type="submit" name="my_submit" class="btn btn-default" id="btn3" value = "Subscribe">
                        </div>
                        <p>*We send great deals and latest auto news to our subscribed users every week.</p>
                      </form>
              </div>
            </div>

              <br>
              <p class="bottom_line"></p>
              <p id="footer">Copyright &copy;2019CarReservations. All Rights Reserved</p>
              <p id="footer2">Connect with Us:
                <i class="fa fa-facebook-square " style="margin-right: 10px; font-size: 20px; margin-top: 0px;"></i>
                <i class="fa fa-twitter-square " style="margin-right: 10px; font-size: 20px; margin-top: 0px;"></i>
                <i class="fa fa-linkedin-square " style="margin-right: 10px; font-size: 20px; margin-top: 0px;"></i>
                <i class="fa fa-google-plus-square " style="margin-right: 10px; font-size: 20px; margin-top: 0px;"></i>
                <i class="fa fa-instagram " style="margin-right: 10px; font-size: 20px; margin-top: 0px;"></i>
              </p>
          </div>
        </section>

   <script type="text/javascript">

     (function(){
           var documentElem = $(document),
           nav = $('#topbar'),
           lastScrollTop = 0;

           documentElem.on('scroll', function(){
            var currentScrollTop = $(this).scrollTop();
             //scroll down
            if(currentScrollTop > lastScrollTop) {
              $("#topbar").css({"opacity" : "0"})
            }
            //scroll up
            else {
              $("#topbar").css({"opacity" : "1"})
            }

            lastScrollTop = currentScrollTop;
           });
         })();
   </script>
</body>
</html>