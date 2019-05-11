<?php
session_start();
if(!isset($_SESSION['email'])){
header('location:home.php');
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
   #select_nav1{
          width: 45px;
          margin-top: -64px;
          margin-left: 886px;
          height: 15px;
          border: none;
          font-size: 11px;
          background-color: #8d2f5d;
          border: .5px solid #ecc6d8;
          color: #ecc6d8;
        }

        /*search*/
        #search_nav1{
          margin-top: -105px;
          margin-left: 1100px;
          height: 16px;
          border: none;
          background-color: #8d2f5d;
          border: .5px solid #ecc6d8;
          color: #ecc6d8;
          font-size: 12px;
        }

        /*modal*/
        #inp_modal{
          width: 530px;
          margin-left: 5px;
          height: 30px;
          border: 1.2px solid #f9ecf2;
        }
        #btn_modal{
         width: 530px;
         margin-left: 5px;
         color: #ecc5d9;
         background-color: #8d2f5d;
         margin-top: 15px;
        }
        #btn_modal:hover{
         background-color: #fff;
         color: #d17aa4;
         transform: translateY(-3px);
         box-shadow: 0 1rem 2rem rgba(217, 140, 178, 0.2);
         border: none;
         border: 1.2px solid #f9ecf2;
        }
        #a_modal{
          text-decoration: none;
          color:#c6538b;
          transition: 1s all;
        }
        #a_modal:hover{
          font-size: 15px;
        }#fa_down{
          font-size: 20px;
          margin-left: 20px;
          margin-top: -2px;
        }
        #fa_us{
          font-size: 18px;
          margin-top: -43px;
        }
        #drop_menu{
          margin-left: 1040px;
          margin-top: -17px;
        }

        #drop_menu li a{
          color: #8d2f5d;
          font-size: 13px;
        }

        #drop_menu p{
          border: 0.5px solid #f9ecf2;
          width: 100px;
          margin-left: 25px;
          margin-bottom: 5px;
          margin-top: 5px;
        }
        #bg_same3{
          color: #ac3972;
          text-decoration: none;
          margin-left: -5px;

        }
        #bg_same3:hover{
          color: #fff;
          text-decoration: none;
          margin-left: -5px;
          transition: 1s ease-out;

        }
        #fa_same3{
          margin-left: 0px;
          padding-left: 10px;
          padding-right: 15px;
        }
        #car_brand{
          vertical-align: top;
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
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Car Listing</strong></h1>
                            <p id="bg_same2"><a href="home.php" id="bg_same3" >Home</a><i class="fa fa-angle-right" id="fa_same3"></i><a href="car_listing.php"  id="bg_same3">Car Listing</a></p>
                          </div>
                          <br>
                           <div class="overlay-detail text-center">
                      </div>
                      </div> 
                  </div>
                  </div>
              </div>
        </section>

        <?php


        ?>

        <!-- car listing section -->

        <section class="car_listing">
          <div class="row">
            <div class="col-sm-3">
              <div class="find_car">
                <div class="panel panel-default">
                  <div class="panel-body" id="car_panel">
                    <h4><span class="fa fa-filter" id="filter"></span>Find Your Car</h4>
                    <br>
                    <form action="search_vehicle.php" method="POST">
                      <div class="form-group">
                        <div class="select-up">
                          <select name="select_brand" class="form-control" id="car_brand">
                            <option>Select Brand</option>
                              <?php
                               include('connect.php');
                               $sql = mysqli_query($con, "SELECT * FROM brand");
                              
                                  while($row = mysqli_fetch_assoc($sql)){?>
                                     <option><?php echo $row['brand_name'].'<br>';?></option>
                                <?php
                                  }
                                ?>
                              
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <select name="select_fuel" class="form-control" id="car_brand">
                          <option>Select Fuel Type</option>
                          <option>Petrol</option>
                          <option>Diesel</option>
                          <option>Electricity</option>
                          <option>I Octane</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" name="submit" id="search_car" class="btn btn-default">Search Car <span class="fa fa-angle-right" id="fa_angle"></span></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <br>
              <div class="listed_cars">
                <div class="panel panel-default">
                  <div class="panel-body" id="car_panel">
                    <h4><span class="fa fa-car" id="filter"></span>Recently Listed Cars</h4>
                    <br>
                    <div class="panel panel-default" id="panel_def">
                      <?php
                      include('connect.php');
                      $m=mysqli_query($con,"SELECT vehicle_id,image1,brand,vehicle_title,price, max(date) as maxv FROM vehicle WHERE stat='free' group by vehicle_id ORDER BY date DESC");
                      while($row=mysqli_fetch_assoc($m)){
                        
                      

                      ?>
                      <div class="panel-body">
                        <div class="col-sm-4">
                          <img src="photo/<?php echo $row["image1"];?>" id="car_ride" class='img img-responsive'>
                          
                        </div>
                        <div class="col-sm-8">
                          <h5 id="listed_h"><b><?php echo $row['brand'].' '.$row['vehicle_title']; ?></b></h5>
                          <p id="listed_p"><?php echo $row['price'].' per day'; ?></p>
                        </div>
                      </div>
                    <?php } ?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
<?php
include('connect.php');
$r=mysqli_query($con,"SELECT * FROM vehicle");
$t=mysqli_num_rows($r);
?>
            <div class="col-sm-9">
              <div class="car_analysis">
                <h5><?php echo $t.' Listing'; ?></h5>
              </div>

              <br><br>

              <div class="listings">
                                 <?php
while($row=mysqli_fetch_assoc($r)){
?>
           <div class="panel panel-default">
 
                  <div class="panel-body">
                    <div class="col-sm-5">
                      <img src="photo/<?php echo $row["image1"];?>" id="list_img" class='img img-responsive'>
                    </div>
                   <div class="col-sm-7" id="col_7">
                      <h3 id="listed_h"><b><?php echo $row["brand"].' '.$row["vehicle_title"]; ?></b></h3>
                      <p id="listed_p"><?php echo $row["price"].' Kes.'; ?></p>
                      <br>
                      <div class="col-sm-4">
                       <p><span class="fa fa-user" id="filter1"></span><?php echo $row["seat"]." Seats"; ?></p>
                      </div>
                      <div class="col-sm-4">
                        <p><span class="fa fa-calendar-check-o" id="filter1"></span><?php echo $row["model_year"];?> </p>
                      </div>
                      <div class="col-sm-4">
                        <p><span class="fa fa-car" id="filter1"></span><?php echo $row['fuel']; ?></p>
                      </div>
                      <br>

                      <a href="vehicle_details.php?id=<?php echo $row['vehicle_id']; ?>"  id="search_car" class="btn btn-default">View Details <span class="fa fa-angle-right" id="fa_angle"></span></a>
                    </div>
                  </div>
                </div><br><?php

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
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="home.php" id="menu">Home</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="about_us.php" id="menu">About Us</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="car_listing.php" id="menu" style="color: #fff;">Car Listing</a></p>
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
</body>
</html>