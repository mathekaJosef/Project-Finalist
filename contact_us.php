

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
  #service4{
    background-color: #000; 
    margin-top: 500px;
  } 
  #row{
    color: rgba(204, 102, 153, 0.9);
  }
  hr{
      color: rgb(172, 57, 114);
  }
  #btn3{
    background: rgba(204, 102, 153, 0.9);
    color: #fff;
    width: 230px;
    border: none;
  }
  #form3{
      width: 230px;
  }
  .bottom_line{
    border-bottom: 1px solid rgba(204, 102, 153, 0.9);
    width: 1150px;
  }
  #footer{
    color: rgba(204, 102, 153, 0.9);
  }
  #footer2{
    color: rgba(204, 102, 153, 0.9);
    margin-left: 830px;
    margin-top: -30px;
  }
  #marker{
    font-size: 25px;
  }
  #p1{
    margin-left: 35px;
    margin-top: -25px;
  }
  #mobile{
    font-size: 20px;
    padding-right: 10px;
  }
  #envelope{
    padding-right: 10px;
  }
  #chevron{
    font-size: 9px;
    padding-right: 15px;
  }
  #menu{
    text-decoration: none;
    color: rgba(204, 102, 153, 0.9);
    font-size: 14px;
  }
  #menu:hover{
    text-decoration: none;
    color: #fff;
    font-size: 16px;
  }
</style>
<body>
  <!-- navbar -->
   
   <nav class="navbar-fixed-top" id="topbar">
     <ul id="ul">
       <li id="li"><a id="a" href="home.php">HOME</a></li>
       <li id="li"><a id="a" href="about_us.php">ABOUT US</a></li>
       <li id="li"><a id="a" href="car_listing.php">CAR LISTING</a></li>
       <li id="li"><a id="a" href="">FAQ<sup>s</sup></a></li>
       <li id="li"><a id="a" href="contact_us.php">CONTACT US</a></li>
     </ul>
   </nav>

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
                            <h1 id="bg_same1" style="margin-top: 30px;"><strong>Contact Us</strong></h1>
                            <p id="bg_same2">Home <i class="fa fa-angle-right"></i> Contact Us</p>
                          </div>
                          <br>
                           <div class="overlay-detail text-center">
                      </div>
                      </div> 
                  </div>
                  </div>
              </div>
        </section> 

        <!-- contact section -->
        <?php
          include('connect.php');

          if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $my_email = mysqli_real_escape_string($con, $_POST['my_email']);
            $p_number = mysqli_real_escape_string($con, $_POST['p_number']);
            $query = mysqli_real_escape_string($con, $_POST['query']);
            $date_posted = date('y-m-d');

            $sql = "INSERT INTO query (fullname, query_email, phone, query, date_posted) VALUES ('$name', '$my_email', '$p_number', '$query', '$date_posted')";

            $output = mysqli_query($con, $sql);
            
            if($name === '' || $my_email === '' || $p_number === '' || $query === ''){
              echo "";
            }else{
              if(!$output){
                exit('Record insertion failed!'.mysqli_error($con));
              }else if($output){
                ?>
                <script type="text/javascript">
                  alert('Query Published!');
                </script>
                 <?php
                 }
              }
          }
        ?>
              

          <section id="contact">
             <div class="col-sm-6">
                 <h3><strong>Get in touch using the form below</strong></h3>
                 <br>
                
               <div class="well">
                   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                       <div class="form-group">
                           <label for="full_name" id="label">Full Name<sup>*</sup></label>
                           <input type="text" name="name" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="email_address" id="label">Email Address<sup>*</sup></label>
                           <input type="email" name="my_email" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="phone_number" id="label">Phone Number<sup>*</sup></label>
                           <input type="number" name="p_number" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="message" id="label">Query<sup>*</sup></label>
                           <textarea type="text" rows="6" name="query" class="form-control" required=""></textarea>
                       </div> 
                       <div class="form-group">
                           <button type="submit" name="submit" class="btn btn-default" id="contact_button">Send Query <span class="fa fa-paper-plane-o" id="arrow"></span></button>
                       </div>
                   </form>
               </div>
            </div>
            
            <?php
              $ii=mysqli_query($con,"SELECT * FROM contact");
              while($row=mysqli_fetch_assoc($ii)){
                $phone=$row['phone'];
                $email=$row['email'];
                $university=$row['university'];
              }


            ?>
            <div class="col-sm-6">
                <h3><strong>Contact Info</strong></h3>
                <br><br>
                <div id="contact_info">
                    <p class="fa_map"><i class="fa fa-map-marker" id="fa_map"></i><?php echo $university; ?> </p>
                    <p class="fa_phone"><i class="fa fa-phone" id="fa_phone"></i><?php echo '+254'.$phone; ?> </p>
                    <p class="fa_envelope"><i class="fa fa-envelope-o" id="fa_envelope"></i><?php echo $email; ?> </p>
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
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="car_listing.php" id="menu">Car Listing</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="" id="menu">FAQ<sup>s</sup></a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="contact_us.php" id="menu"  style="color: #fff;">Contact Us</a></p>
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
                 <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
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


         // if(window.history.replaceState){
         //   window.history.replaceState(null, null, window.location.href);
         // }
   </script>
</body>
</html>