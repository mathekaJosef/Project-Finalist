<?php
session_start();
if(!isset($_SESSION['email'])){
header('location:home.php');
}
if(isset($_GET['id'])){
  $_SESSION['id']=$_GET['id'];
  $id=$_SESSION['id'];
}
else{
  $id=$_SESSION['id'];
}
?>
<?php
include('connect.php');
if(isset($_POST['submit3'])){ 
  $d=date("y-m-d");
  $to=$_POST['to_date'];
  $from=$_POST['from_date'];
  $message=$_POST['message'];
  $email=$_SESSION['email'];
  $re=mysqli_query($con,"SELECT * FROM clients WHERE email ='$email' ");
  while($row=mysqli_fetch_assoc($re)){
    $client_id=$row['client_id'];
  }
  $in=mysqli_query($con,"INSERT INTO book VALUES('','$id','$client_id','pending','$from','$to','$d','$message', '') ");
  if($in){

    $up=mysqli_query($con,"UPDATE vehicle SET stat='pending' WHERE vehicle_id='$id' ");
    if($up){

      ?>
  <script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Booking successful, wait for SMS confirmation. Do you want to reserve another vehicle ?") == true) {
    window.location.href = "car_listing.php";
}
else{
  window.location.href = "home.php";
}</script><?php

    }
    else{
      echo myssqli_error($con);
    }

  }
  else{
    echo mysqli_error($con);
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
<style type="text/css">
  body{
    font-family: 'verdana', sans-serif;
  }

  .active{
    text-decoration: none;
  }

  .carousel-caption{
      top: 55%;
      transform: translateY(-50%);
      transition: 3s;
  }

  /***************************************************************/
  /***************************************************************/

  .carousel-fade .carousel-inner .item {
    -webkit-transition-property: opacity;
    transition-property: opacity;
  }

  .carousel-fade .carousel-inner .item,
  .carousel-fade .carousel-inner .active.left,
  .carousel-fade .carousel-inner .active.right {
    opacity: 0;
  }

  .carousel-fade .carousel-inner .active,
  .carousel-fade .carousel-inner .next.left,
  .carousel-fade .carousel-inner .prev.right {
    opacity: 1;
  }

  .carousel-fade .carousel-inner .next,
  .carousel-fade .carousel-inner .prev,
  .carousel-fade .carousel-inner .active.left,
  .carousel-fade .carousel-inner .active.right {
    left: 0;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);

  }
  .carousel-fade .carousel-control {
    z-index: 2;
  }
  .carousel-indicators li {
    display: none;
  }

  #bg-color{
    background-color: rgba(0, 0, 0, 0.78);
  }

  #similar_cars{
    margin-left: 20px;
    margin-bottom: 20px;
    color: #8d2f5d;
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

   <?php
        include('connect.php');
        $s=mysqli_query($con,"SELECT * FROM vehicle where vehicle_id='$id' ");
        while($row=mysqli_fetch_assoc($s)){

           $title=$row['vehicle_title'];
          $id=$row['vehicle_id'];
          $brand=$row['brand'];
          $price=$row['price'];
          $fuel=$row['fuel'];
          $model=$row['model_year'];
          $overview=$row['overview'];
          $seats=$row['seat'];
          $image1 = $row['image1'];
          $image2 = $row['image2'];
          $image3 = $row['image3'];
          $image4 = $row['image4'];
          $image5 = $row['image5'];
          $stat=$row['stat'];
        }

        ?>

   <!-- dashboard -->
    <section id="dashboard">

              <div id="myCarousel" class="carousel slide carousel-fade"  data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>  

                <div>
                  <div class="carousel-inner" role="listbox">
                      <div class="item active">         
                          <img src="<?php echo $image1; ?>" id="img"  style="height: 500px;">
                      <div class="carousel-caption"  id="bg-color">
                        <div class="bg_jumbo">
                            <p id="bg_para"></p>
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Vehicle Details</strong></h1>
                            <p id="bg_same2"><a href="car_listing.php" id="bg_same3">Car Listing</a><i class="fa fa-angle-right"  id="fa_same3"></i><a href="vehicle_details.php" id="bg_same3" >Vehicle Details</a></p>
                          </div>
                          <br>
                           <div class="overlay-detail text-center">
                      </div>
                      </div>
                  </div>

                  <div class="item">
                      <img src="<?php  echo $image2; ?>" id="img"  style="height: 500px;"> 
                      <div class="carousel-caption"  id="bg-color">
                        <div class="bg_jumbo">
                            <p id="bg_para"></p>
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Vehicle Details</strong></h1>
                            <p id="bg_same2"><a href="car_listing.php" id="bg_same3">Car Listing</a><i class="fa fa-angle-right"  id="fa_same3"></i><a href="vehicle_details.php" id="bg_same3" >Vehicle Details</a></p>
                          </div>
                          <br>
                          <div class="overlay-detail text-center">
                      </div>
                      </div>
                  </div>

                  <div class="item">
                      <img src="<?php echo $image3;?>" id="img"  style="height: 500px;"> 
                      <div class="carousel-caption"  id="bg-color">
                        <div class="bg_jumbo">
                            <p id="bg_para"></p>
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Vehicle Details</strong></h1>
                            <p id="bg_same2"><a href="car_listing.php" id="bg_same3">Car Listing</a><i class="fa fa-angle-right" id="fa_same3"></i><a href="vehicle_details.php" id="bg_same3" >Vehicle Details</a></p>
                          </div>
                          <br>
                          <div class="overlay-detail text-center">
                      </div>
                      </div>
                  </div>

                  <div class="item">
                      <img src="<?php echo $image4;?>" id="img"  style="height: 500px;"> 
                      <div class="carousel-caption"  id="bg-color">
                        <div class="bg_jumbo">
                            <p id="bg_para"></p>
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Vehicle Details</strong></h1>
                            <p id="bg_same2"><a href="car_listing.php" id="bg_same3">Car Listing</a><i class="fa fa-angle-right" id="fa_same3"></i><a href="vehicle_details.php" id="bg_same3" >Vehicle Details</a></p>
                          </div>
                          <br>
                          <div class="overlay-detail text-center">
                      </div>
                      </div>
                  </div>

                  <div class="item">
                      <img src="<?php  echo $image5; ?>" id="img"  style="height: 500px;">
                      <div class="carousel-caption"  id="bg-color">
                        <div class="bg_jumbo">
                            <p id="bg_para"></p>
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Vehicle Details</strong></h1>
                            <p id="bg_same2"><a href="car_listing.php" id="bg_same3">Car Listing</a><i class="fa fa-angle-right" id="fa_same3"></i><a href="vehicle_details.php" id="bg_same3" >Vehicle Details</a></p>
                          </div>
                          <br>
                          <div class="overlay-detail text-center">
                      </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </section>


        <!-- vehicle details section -->

        <section class="vehicle_details">
          <div class="row">
            <div class="col-sm-6"> 
              <h2><b><?php echo $brand.' '.$title; ?> </b></h2>
            </div>
            <div class="col-sm-6" id="payment"> 
              <h3 id="dollar"><b><?php echo $price; ?> Kes</b></h3>
              <p id="p_day">Per Day</p>
            </div>
          </div>

          <br>
          
          <div class="row">
            <div class="col-sm-8">
                    <div class="col-sm-4" id="panel_a">
                      <div class="panel panel-default" id="panel_specs">
                        <div class="panel-body">
                          <span class="fa fa-calendar" id="fa_specs"></span>
                          <p><?php echo $model; ?></p>
                          <h5 id="h_model"><b>Model</b></h5>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4" id="panel_b">
                      <div class="panel panel-default" id="panel_specs">
                        <div class="panel-body">
                          <span class="fa fa-cogs" id="fa_specs"></span>
                          <p><?php echo $fuel; ?></p>
                          <h5 id="h_model"><b>Fuel Type</b></h5>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4" id="panel_c">
                      <div class="panel panel-default" id="panel_specs">
                        <div class="panel-body">
                          <span class="fa fa-user-plus" id="fa_specs"></span>
                          <p><?php echo $seats; ?></p>
                          <h5 id="h_model"><b>seats</b></h5>
                        </div>
                      </div>
                    </div>


            <br>

            <div class="panel panel-default" id="acc_specs">
              <div class="panel-heading" id="acc_head">
                <div class="row">
                  <div class="col-sm-3" id="v_overview">
                    <p>Vehicle Overview</p>
                  </div>
                  <div class="col-sm-3" id="col_acc">
                    <p>Accessories</p>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div id="overview">
                  <h2><?php echo $overview; ?></h2>
                </div>
                <div id="accessories">
                  <div class="panel panel-default">
                    <div class="panel-heading" id="acc_subhead"><h6>Accessories</h6></div>
                    <div class="panel-body">
                      <?php
                      $e=mysqli_query($con, "select * from acess where vehicle_id='$id' ");
                      while($row=mysqli_fetch_assoc($e)){
                      echo $row['access'].'<br>';
                    }

                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>


            <!--  -->
            <div class="col-sm-4">
                      <div class="panel panel-default" id="div_social">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-sm-2">
                              <p id="p_social">Share:</p>
                            </div>
                            <div class="col-sm-2">
                              <span class="fa fa-facebook-square" id="fa_social"></span>
                            </div>
                            <div class="col-sm-2">
                              <span class="fa fa-twitter-square" id="fa_social1"></span>
                            </div>
                            <div class="col-sm-2">
                              <span class="fa fa-google-plus-square" id="fa_social2"></span>
                            </div>
                            <div class="col-sm-2">
                              <span class="fa fa-linkedin-square" id="fa_social3"></span>
                            </div>
                            <div class="col-sm-2">
                              <span class="fa fa-instagram" id="fa_social4"></span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <br>

                      
                      <div class="panel panel-default" id="panel_book1">
                        <div class="panel-body">
                          <div>
                            <h4><span class="fa fa-envelope" id="fa_env"></span>Book Now</h4>
                            <br>
                            <form method="post">
                              <div class="form-group">
                                <label>From Date</label>
                                <input type="date" name="from_date" class="form-control" id="inp_book" required="">
                              </div>

                              <div class="form-group">
                                <label>To Date</label>
                                <input type="date" name="to_date" class="form-control" id="inp_book" required="">
                              </div>

                              <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" rows="3" class="form-control" id="inp_book" required=""></textarea>
                              </div>

                              <?php if($stat=="free"){?>

                              <div class="form-group">
                                <button type="submit" name="submit3" id="book_btn" class="btn btn-default">Book <span class="fa fa-angle-right" id="fa_angle"></span></button>
                              </div> <?php }
                              else{?>
                                <fieldset disabled>
                                <div class="form-group">
                                <button type="submit" name="submit3" id="book_btn" class="btn btn-default">Booked <span class="fa fa-angle-right" id="fa_angle"></span></button>
                              </div></fieldset><?php
                              }?>
                            </form>
                          </div>
                        </div>
                      </div>
                      
            </div>


          </div>

          <br>
          <p id="v_border"></p>
          <br>

          <div class="row">
            <h2 id="similar_cars">Similar Cars</h2>
            <?php
$se=mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id != '$id' and (brand='$brand' or price='$price')  ");
while($row=mysqli_fetch_assoc($se)){
            ?>
            <div class="col-sm-3">
              <div class="panel panel-default" id="panel_similar">
                  <div class="panel-body">
                    <img src="photo/<?php echo $row["image1"];?>" id="ride_sim" class='img img-responsive' height="100" width="100">
                    <h3 id="name_similar"><b><?php echo $row['brand'].' '.$row['vehicle_title']; ?></b></h3>
                    <h4><?php echo $row['price']; ?></h4>
                  </div>
                  <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-4" id="f_filter">
                          <span class="fa fa-user" id="filter1"></span>
                          <p><?php echo $row['seat']; ?></p>
                        </div>
                        <div class="col-sm-4" id="f_filter">
                          <span class="fa fa-calendar" id="filter1"></span>
                          <p><?php echo $row['model_year']; ?></p>
                        </div>
                        <div class="col-sm-4" id="f_filter">
                          <span class="fa fa-car" id="filter1"></span>
                          <p><?php echo $row['fuel']; ?></p>
                        </div>
                      </div>
                  </div>
              </div>
            </div><?php
          }
?>

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
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="home.html" id="menu">Home</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="about_us.html" id="menu">About Us</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="car_listing.html" id="menu"  style="color: #fff;">Car Listing</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="trial_projects.html" id="menu">FAQ<sup>s</sup></a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="contact_us.html" id="menu">Contact Us</a></p>
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


         $(function(){
          // alert('it is working!');
          $("#v_overview").on('click', function(){
            $("#overview").show();
            $("#accessories").hide();
          })
         })

         $(function(){
          $("#col_acc").on('click', function(){
            $("#accessories").show();
            $("#overview").hide();
          })
         })


   </script>
</body>
</html>