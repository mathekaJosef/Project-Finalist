<?php
session_start();
if(!isset($_SESSION['email'])){
header('location:home.php');
}
include('connect.php');
$email=$_SESSION['email'];
$se=mysqli_query($con,"SELECT * FROM clients WHERE email='$email' ");
while($row=mysqli_fetch_assoc($se)){
  $cid=$row['client_id'];
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
<style type="text/css"> 
  #confirmed{
    color: #02b875;
    border-top: 1px solid #02b875;
    border-bottom: 1px solid #02b875;
    border-left: 1px solid #02b875;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
    padding-top: 7px;
    padding-bottom: 7px;
    padding-left: 15px;
    width: 120px;
  }
  #confirmed:hover{
    background-color: #1cfdaa;
  }

  #rejected{
    color: #ff1a1a;
    border-top: 1px solid #ff1a1a;
    border-bottom: 1px solid #ff1a1a;
    border-left: 1px solid #ff1a1a;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
    padding-top: 7px;
    padding-bottom: 7px;
    padding-left: 15px;
    width: 120px;
  }
  #rejected:hover{
    background-color: #ff9999;
  }

  #not_confirmed_yet{
    color: #0000ff;
    border-top: 1px solid #0000ff;
    border-bottom: 1px solid #0000ff;
    border-left: 1px solid #0000ff;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    width: 120px;
    font-size: 11px;
  }
  #not_confirmed_yet:hover{
    background-color: #b3b3ff;
  }

  #colsm_img{
    max-height: 80px;
    margin-top: 15px;
    margin-left: -7px;
  }
  #user_details{
     margin-top: 30px;
     margin-left: -34px;
  }
  #cost{
    color: blue;
  }
  #p_line{
    border: 0.4px solid #ecc6d9;
  }
  #bg_same3{
    color: #ac3972;
    text-decoration: none;
    margin-left: -5px;

  }
  #bg_same3:hover{
    color: #fff;
    text-decoration: none;
    margin-left: 0px;
    transition: 1s ease-out;

  }
  #fa_same3{
    margin-left: 0px;
    padding-left: 10px;
    padding-right: 15px;
  }
</style>
<body>
  <!-- navbar -->
   <?php
    require_once('inner_nav.php');
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
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>My Profile</strong></h1>
                            <p id="bg_same2"><a href="car_listing.php" id="bg_same3">Car Listing</a><i class="fa fa-angle-right" id="fa_same3"></i><a href="vehicle_details.php" id="bg_same3" >Vehicle Details</a><i class="fa fa-angle-right" id="fa_same3"></i><a href="user_profile.php" id="bg_same3" >Profile</a></p>
                          </div>
                          <br>
                           <div class="overlay-detail text-center">
                      </div>
                      </div> 
                  </div>
                  </div>
              </div>
        </section>

        <!-- user profile section -->
        <?php
          include('connect.php');
          $email=$_SESSION['email'];
          $se=mysqli_query($con,"SELECT * FROM clients WHERE email ='$email' ");
          while($row=mysqli_fetch_assoc($se)){
            $name=$row['fullname'];
            $email=$row['email'];
            $phone=$row['phone'];
            $address=$row['address'];
            $city=$row['city'];
            $country=$row['country'];
          }

          ?>

        <section class="profile_section"> 
          <div class="panel panel-default">
            <div class="panel-heading"  id="panel_l">
              <div class="row">

                <div class="col-sm-4" id="col_head">
                  <img src="avatar.png" id="avatar">
                </div>

                <div class="col-sm-8" id="user_details">
                  <h5><?php echo $name; ?></h5>
                  <p><?php echo $email; ?></p>
                </div>

              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class="col-sm-3" id="col_fr">
                  <li><a href="user_profile.php">Profile Settings</a></li>
                  <li><a href="update_password.php">Update Password</a></li>
                  <li><a href="my_bookings.php">My Booking</a></li>
                  <li><a href="post_testimonial.php">Post a Testimonial</a></li>
                  <li><a href="my_testimonials.php">My Testimonials</a></li>
                  <li><a href="#" id="logout">Sign Out</a></li>
                </div>

              </div>

              <div class="col-sm-9" id="col_sm">
                <h4 id="general_settings">MY BOOKINGS</h4>
                <br>
                <?php
                $query = mysqli_query($con,"SELECT * from vehicle inner join book on vehicle.vehicle_id=book.vehicle_id WHERE book.client_id='$cid' ORDER BY from_date DESC");
                if(mysqli_num_rows($query)>0){
                while($row=mysqli_fetch_assoc($query)){
                  $fuel=$row['fuel'];
                 
                  $photo=$row['image1'];
                  $price=$row['price'];
                  $seats=$row['seat'];
                  $brand=$row['brand'];
                  $to_date=$row['to_date'];
                  $from_date=$row['from_date'];
                  

                 
                  $status=$row['status'];
                  
                  $title=$row['vehicle_title'];
                  
                   $start_date = strtotime($from_date); 
                    $end_date = strtotime($to_date); 
                      
                    // Get the difference and divide into  
                    // total no. seconds 60/60/24 to get  
                    // number of days 
                    $days=($end_date - $start_date)/60/60/24; 
                    $cost=$price*$days;
                   ?>

                   <div class="row">
                    <div class="col-sm-4">
                      <img src="<?php echo $photo;?>" id="colsm_img">
                      
                    </div>
                    <div class="col-sm-4">
                      <h4><?php echo $brand;?>, <?php echo $title;?></h4>
                      <br>
                      <p>From Date: <?php echo $from_date;?></p>
                      <p>To Date: <?php echo $to_date;?></p>
                      <?php echo "<b>Total Cost:</b><br><p id='cost'>".$cost."Kes</p>"; ?>
                    </div>
                    <div class="col-sm-4">
                      <?php if($status === 'CONFIRMED'){ ?>
                      <h5 id="confirmed"><?php echo $status;?></h5>
                      <?php }
                      else if($status === 'REJECTED'){
                       ?>
                      <h5 id="rejected"><?php echo $status;?></h5>
                      <?php }
                      else { ?>
                        <h5 id="not_confirmed_yet">Not Confirmed Yet</h5>
                        
                      <?php } ?>
                    </div>
                   </div>
                   <br>
                   <p id="p_line"></p>
                  
                  <?php
                  
                  } 

                }
                else{ 
                  echo "<div class='alert alert-danger'>
                          <center>Sorry, You have no active bookings!.</center>
                        </div>";
                }
                ?>

              </div>
              

            </div>
          </div>
        </section>

       <!-- section four -->

       <section id="service4">
          <div class="container">
            <div class="row" id="row">
              <br><br><br>
              <div class="col-sm-3">
                <h5><strong>MENU</strong></h5>
                <br>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="Home.php" id="menu">Home</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="about_us.php" id="menu">About Us</a></p>
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
                 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
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
   <script type="text/javascript">
     document.getElementById('logout').addEventListener('click', function(){
            // alert('hello world');

            var x=window.onbeforeunload;

            if (confirm("Are you sure you want to log out?") == true) { 
                window.location.href = "user_logout.php";
            }
          })
   </script>
</body>
</html>