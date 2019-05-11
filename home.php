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

<?php
  $query = mysqli_query($con,"SELECT * FROM testimonials");
  $rowQuery = mysqli_num_rows($query);
?>

<?php
  $sql_v = mysqli_query($con,"SELECT * FROM vehicle");
  $query_row = mysqli_num_rows($sql_v);
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
  <script>
    setInterval(function(){
      $('#test').load('auto.php');
 },1000);
</script>
</head>
<style type="text/css">
  *,*:before,
        *:after{
            box-sizing: inherit;
            padding: 0;
            margin: 0;
        }
        .navigation1{
             width: 80px;
            height: 100%;
            display: block;
            padding-right: 40px;
            position: fixed;
            top: 0;
            left: 0;
            border-radius: 0% 50% 550% 0%;
            perspective: 800;
            transition: all 800ms cubic-bezier(0.9,0,0.33,1);
            z-index: 5000;
        }
        .navigation_icon1{
            margin-top: 80px;
            margin-left: -476px;
            width: 46px;
            height: 40px;
            display: block;
            position: fixed;
            background: #fc0363;
            top: 22%;
            left: 35%;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
/*            background: hsla(312, 51%, 41%, 0.6);*/
            cursor: pointer;
            transition: all 800ms cubic-bezier(0.9,0,0.33,1);
        }
        .navigation_icon1 #env_o{
            margin-left: 12px;
            font-size: 22px;
            margin-top: 8px;
            color: #fff;
        }
        
        .navigation_icon1 .topbar1{
            width: 55px;
            height: 3px;
            display: block;
            position: absolute;
            top: 10px;
            transform: rotate(0);
            transition: all 800ms cubic-bezier(0.9,0,0.33,1);
        }
        .navigation_icon1 .bottombar1{
            width: 35px;
            height: 3px;
            display: block;
            position: absolute;
            top: 30px;
            transform: rotate(0);
            transition: all 800ms cubic-bezier(0.9,0,0.33,1);
        }
        .navigation1 .navigation_ul1{
            float: right;
            margin-top: 0px;
            padding-left: 10px;
            opacity: 0;
            visibility: hidden;
            transform: rotateY(-90deg) translateX(-300px);
            transition: all 900ms cubic-bezier(0.9,0,0.33,1);
        }
        
        .navigation-open1{
            height: 400px;
            width: 360px;
            display: block;
            background: #fff;
            position: fixed;
            left: 0;
            border-radius: 0% 1% 1% 0%;
            padding-top: 20px;
            box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
            margin-top: 180px;
        }
        .navigation-open1 #env_o{
            visibility: hidden;
        }
        
        .navigation-open1 .navigation_icon1{
            left:62.4%;
            background: none;
            top: 105px;
        }
        
        .navigation-open1 .navigation_ul1{
            opacity: 1;
            visibility: visible;
        }
        
        .navigation-open1 .topbar1{
            background: #fc0363;
            top: 21px;
            width: 15px;
            transform: rotate(45deg);
        }
        .navigation-open1 .middlebar1{
            width: 0;
            top: 22px;
            visibility: hidden;
            transform: translateX(30px);
        }
        .navigation-open1 .bottombar1{
            background: #fc0363;
            width: 15px;
            top: 21px;
            transform: rotate(-45deg);
        }
        .navigation-open1 .navigation_ul1{
            transform:  rotateY(0) translateX(0);
        }
        #form-inp1{
          margin-bottom: 15px;
          width: 300px;
          height: 30px;
          border: 1.2px solid #f9ecf2;
        }
        #btn_Send1{
         width: 300px;
         color: #ecc5d9;
         background-color: #8d2f5d;
         margin-top: 15px;
        }
        #btn_Send1:hover{
         background-color: #fff;
         color: #d17aa4;
         transform: translateY(-3px);
         box-shadow: 0 1rem 2rem rgba(217, 140, 178, 0.2);
         border: none;
         border: 1.2px solid #f9ecf2;
        }
        #h_contact1{
          color: #8d2f5d;
          margin-bottom: 20px;
        }

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

        #topbar{
          position: fixed; 
          top: 0;
          left: 0;
          width: 100%;
          height: 21px;
          background: #8d2f5d;
          transition: 1s;
          padding: 9px 0;
          text-align: center;
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
        .dropdown{
          visibility: hidden;
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
       #div3_wrench{
          margin-top: -158px;
          margin-left: 850px;
        }
        

        /*Section 2 (find the best car)*/
         /**/
        .l-img{
            width: 100%;
            position: relative;
            display: block;
            overflow: hidden;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -ms-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
            opacity: 1;
            filter: alpha(opacity=100);
            border: none;

        }
        #l-img1{ 
            width: 110%;
            margin-left: 30px;
        }
        #l-img2{ 
            width: 110%;
            margin-left: 30px;
        }
        .l-img img{
            width: 100%;
        }

        .l-img:hover{
            cursor: pointer;
        }

        .l-img:hover .l-caption{
            transform: translateY(0%) scale(1);
            -webkit-transform: translateY(0%) scale(1);
            -ms-transform: translateY(0%) scale(1);
            -moz-transform: translateY(0%) scale(1);
            -o-transform: translateY(0%) scale(1);
            width: 94%;
            animation: moveRight 0.4s ease-in;
        }

        #img_section{
            height: 200px;
            /*border-radius: 10px 10px 0px 0px;*/
            border-radius: 2px;
            border: none; 
        }

        .l-caption{
            background-color: rgba(1, 4, 6, 0.45);
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 10px;
            right: 0;
            width: 90%;
            z-index: 99;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -ms-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
            transform: translateY(150%) scale(1);
            -webkit-transform: translateY(150%) scale(1.2);
            -ms-transform: translateY(150%) scale(1.2);
            -moz-transform: translateY(150%) scale(1.2);
            -o-transform: translateY(150%) scale(1.2);
            
        }

        @keyframes moveRight {
          0%{
            opacity: 0;
            transform: translateY(7rem);
          }
          100%{
            opacity: 1;
            transform: translate(0);
          }
        }

        .l-caption ul{
            display: inline-block;
            margin: 0px;
            padding: 0px;
            width: 90%;
        }

        .l-caption ul li{
            display: inline-block;
        }

        .l-caption ul li a{
            border: 1px solid #e5e5ff;
            border-radius: 50%;
            color: #e5e5ff;
            display: inline-block;
            margin: 0px;
            height: 28px;
            line-height: 30px;
            width: 28px;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -ms-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;

        }
        .l-caption ul li a:hover{
            transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2); 
        }

        
        .l-caption1{
            background-color: rgba(1, 4, 6, 0.45);
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 10px;
            right: 0;
            width: 90%;
            z-index: 99;
            width: 94%;
        }

        .l-caption1 ul{
            display: inline-block;
            margin: 0px;
            padding: 0px;
            width: 81%;
        }

        .l-caption1 ul li{
            display: inline-block;
        }

        .l-caption1 ul li a{
            border: 1px solid #e5e5ff;
            border-radius: 50%;
            color: #e5e5ff;
            display: inline-block;
            margin: 0px;
            height: 28px;
            line-height: 30px;
            width: 28px;

        }
        #caption_li1{
          margin-left: -50px;
        }
        #caption_li2{
          margin-left: 50px;
        }
        #caption_li3{
          margin-left: 80px;
        }

        #p_pet{
          margin-left: 32px;
          margin-top: -30px;
          font-size: 11px;
        }
        #p_mod{
          margin-left: 32px;
          margin-top: -30px;
          font-size: 11px;
        }
        #p_mod2{
          margin-left: 66px;
          margin-top: -40px;
          font-size: 11px;
        }
        #p_seat{
          margin-left: 36px;
          margin-top: -30px;
          font-size: 11px;
        }
        #p_seat2{
          margin-left: 52px;
          margin-top: -40px;
          font-size: 11px;
        }

        /**/
        #row{
            margin-top: 40px;
        }
        #find{
          padding-top: 100px;
          padding-left: 50px;
          padding-right: 50px;
          text-align: center;
        }
        #container_display{
          margin-left: 100px;
          margin-top: 60px;
        }

        #big{
          font-size: 50px;
          font-weight: 20px;
          word-spacing: -11px;
          color: #8d2f5d;
          margin-left: -370px;
          text-align: center;
        }
        #small{
          font-size: 60px;
          font-family: Courier New, sans-serif;
          word-spacing: -40px;
          margin-top: -87px;
          margin-left: 370px;
          color: #000;
          text-align: center;
        }
        #div2{
          margin-left: -60px;
        }
        #panel_cap{
          margin-left: 30px;
          border: 1px solid #fff;
          background-color: #fff;
          width: 317px;
        }
        #panel_cap2{
          border: 1px solid #fff;
          margin-left: 30px;
          box-shadow: -1px 6px 25px -12px rgba(0, 0, 0, 0.75);
        }

        /*#panel_cap div{
          margin-left: 30px;
        }*/

        #p_ipsum{
          font-size: 11px;
          font-style: italic;
        }

        /*testmonial_img*/
        .testmonial_img{
          background-image: url('ride1.png');
          height: 700px;
          background-position: fixed;
          background-size: cover;
          padding-top: 100px;
        }

        .testmonial_banner{
          background-color: rgba(255, 255, 255, 0.78);
          height: 800px;
          background-size: cover;
          margin-top: -100px;
          padding-top: 120px;
        }
        .jpg_testimonial{
        }
        .bg_imgtest{
        }

        #quote_left{
          margin-left: 400px;
          font-size: 86px;
          margin-top: 30px;
          color: #df9fbf;
        }
        #h_db{
          margin-top: -46px;
          font-size: 22px;
          margin-left: 445px;
          width: 430px;
          color: #8d2f5d;
        }
        #h_db2{
          margin-top: -46px;
          font-size: 22px;
          margin-left: 465px;
          width: 430px;
          color: #8d2f5d;
        }
        #service4{
          margin-top: 50px;
        }

        #t_line{
            border: 1px solid #8d2f5d;
            width: 10px;
            /*margin-left: 605px; */
            margin-top: 3px;
        }

         #client_position{
            margin-left: 20px;
            margin-top: -20px;
        }

        #client{
          margin-left: 455px;
          margin-top: 20px;
        }

        #client1{
          margin-left: 464px;
          margin-top: 20px;
        }

        #magneto{
          font-family: 'magneto', sans-serif;
          font-size: 20px;
        }

        #ul{
          margin-left: -150px;
        }

               
</style>
<body>
  <div id="test">
    
  </div>
  <!-- sidebar -->
  <nav class="navigation1">
            <section class="navigation_icon1">
                <span class="topbar1"></span>
                <span class="bottombar1"></span>
                <span class="fa fa-envelope-o" id="env_o"></span>
            </section>

            <!-- contact section -->
            <?php
              include('connect.php');

              if(isset($_POST['submit_contact'])){
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

            <nav class="navigation_ul1">
    
                <div class="sidebar-contact">
                  <h4 id="h_contact1">Contact Us</h4>
                  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <input type="text" name="name" id="form-inp1" class="form-control" placeholder="Name">
                    <input type="email" name="my_email" id="form-inp1" class="form-control" placeholder="Email">
                    <input type="rel" name="p_number" id="form-inp1" class="form-control" placeholder="Phone Number">
                    <textarea type="text" name="query" id="form-inp1" class="form-control" placeholder="Query"></textarea>
                    <input type="submit" id="btn_Send1" class="btn btn-default" name="submit_contact" value="Send">
                  </form>
                </div>
              </nav>


        </nav>
  <!-- navbar -->
   <nav class="navbar-fixed-top" id="topbar">
     <ul id="ul">
       <li id="li"><a id="a" href="home.php">HOME</a></li>
       <li id="li"><a id="a" href="about_us.php">ABOUT US</a></li>
       <li id="li"><a id="a" href="car_listing.php">CAR LISTING</a></li>
       <li id="li"><a id="a" href="">FAQ<sup>s</sup></a></li>
       <li id="li"><a id="a" href="contact_us.php">CONTACT US</a></li>
     </ul>

     <form>
        <div class="dropdown">
          <button class=" btn btn-default dropdown-toggle" data-toggle="dropdown" id="select_nav1" style="text-align: left;">
             <span class="fa fa-user" id="fa_us"></span>
             <span class="fa fa-angle-down" id="fa_down"></span>
          </button>

             <ul class="dropdown-menu" id="drop_menu">
              <li><a href="user_profile.php">Profile Settings</a></li>
              <p></p>
              <li><a href="update_password.php">Update Password</a></li>
              <p id="dli"></p>
              <li><a href="my_bookings.php">My Bookings</a></li>
              <p id="dli"></p>
              <li><a href="post_testimonial.php">Post a testimonial</a></li>
              <p id="dli"></p>
              <li><a href="my_testimonials.php">My Testimonials</a></li>
            </ul>
        </div>
      </form>

     <form class="form-inline">
        <button type="button" name="submit" id="search_nav1" class="btn btn-default" data-toggle="modal" data-target="#myModal">LOGIN/REGISTER</button>
      </form>
   </nav>

   <!--sign up Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign Up</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="form-group">
                    <input type="text" name="full_name" id="inp_modal" class="form-control" placeholder="Full Name*">
                  </div>
                  <div class="form-group">
                    <input type="number" name="phone_no" id="inp_modal" class="form-control" placeholder="Phone No*">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="inp_modal" class="form-control" placeholder="Email Address*">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="inp_modal" class="form-control" placeholder="Password*">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm_password" id="inp_modal" class="form-control" placeholder="Confirm Password*">
                  </div>

                  <div class="form-group">
                    <input type="submit" name="submit" id="btn_modal" class="btn btn-default mt-3" value="Sign Up">
                  </div>
                </form>
              </div>
              <div class="modal-footer d-flex">
                <div class="d-flex" align="center">
                  <p>Already have an account? <a id="a_modal" href=""  data-dismiss="modal" data-toggle="modal" data-target="#myLogin">Login Here</a></p>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <!--sign in Modal -->
        <div id="myLogin" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="form-group">
                    <input type="email" name="email" id="inp_modal" class="form-control" placeholder="Email Address*">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="inp_modal" class="form-control" placeholder="Password*">
                  </div>

                  <div class="form-group">
                    <input type="submit" name="submit1" id="btn_modal" class="btn btn-default mt-3" value="Login">
                  </div>
                </form>
              </div>
              <div class="modal-footer d-flex">
                <div class="d-flex" align="center">
                  <p>Do not have an account? <a id="a_modal" href=""  data-dismiss="modal" data-toggle="modal" data-target="#myModal">Sign Up Here</a></p>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

   

   <!-- sliding panel -->
   <section id="dashboard">
            <div id="myCarousel" class="carousel slide carousel-fade"  data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li> -->
                </ol> 

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="car7.png" id="img">
                    <div class="carousel-caption">
                          <div class="jumbo">
                            <p id="para" style="margin-left: 950px; border: 3px solid #d379a5; width: 100px;"></p>
                            <h1 id="same1"><strong>FIND THE RIGHT CAR FOR YOU</strong></h1>
                            <h4 id="same2">Giving the best satisfaction you can never have</h4>
                            <h4 id="same2">We have the best cars with the exclusive specifications and accessories for you to choose</h4>
                            <br>
                            <form>
                              
                              <a id="a_modal" href=""  data-dismiss="modal" data-toggle="modal" data-target="#myLogin"><button type="submit" name="submit" class="btn btn-default btn-bg" id="button" style="background: #8d2f5d; color: #fff; border: none;margin-left: 765px; padding: 20px;">Read More <span class="fa fa-long-arrow-right" id="arrow"></span></button></a>

                          </form>
                          </div> 
                          <br>
                           <div class="overlay-detail text-center">
                      </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section one -->

        <section id="find">
         <p id="big"><strong>FIND THE BEST</strong><p id="small">Car For You</p></p>
         <p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
         proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

         <!--  -->
         <br><br>
            <div class="container-fluid" id="container_display">
              <?php
                for($i = 1; $i <= $query_row; $i++){
                  $row = mysqli_fetch_assoc($sql_v);
              ?>
              
                <div class="row">
                      
                      <?php
                        if($i === 1){
                      ?>
                    <div class="col-sm-3">
                        <div class="l-img" id="l-img2">
                              <a id="a_modal" href=""  data-dismiss="modal" data-toggle="modal" data-target="#myLogin"><img src="<?php echo $row['image2']; ?>" id="img_section"></a>
                              <div class="l-caption1">
                                  <ul>
                                      <li id="caption_li1"><a href="#"><i class="fa fa-car"></i><p id="p_pet"><?php echo $row['fuel']; ?></p></a></li>
                                      <li id="caption_li2"><a href="#"><i class="fa fa-calendar"></i><p id="p_mod"><?php echo $row['model_year']; ?> <p id="p_mod2">Model</p></p></a></li>
                                      <li id="caption_li3"><a href="#"><i class="fa fa-user"></i><p id="p_seat"><?php echo $row['seat']; ?> <p id="p_seat2">Seats</p></p></a></li>
                                  </ul>
                              </div>
                          </div>

                          <div class="panel panel-default" id="panel_cap2">
                            <div class="panel-footer" id="panel_cap">
                              <div class="row">
                                <div class="col-sm-4"><h5><?php echo $row['brand']; ?>, <?php echo $row['vehicle_title']; ?></h5></div>
                                <div class="col-sm-4"><h5 style="text-align: right;"><?php echo $row['price']; ?> Kes</h5></div>
                                <div class="col-sm-4"></div>
                              </div>
                              <br>
                              <p id="p_ipsum"><?php echo $row['overview']; ?>,</p>
                            </div>
                          </div>
                    </div>

                    <?php
                        }
                        else{
                      ?>

                    <div class="col-sm-3"  style="margin-left: 30px;">
                        <div class="l-img" id="l-img1">
                              <a id="a_modal" href=""  data-dismiss="modal" data-toggle="modal" data-target="#myLogin"><img src="<?php echo $row['image2']; ?>" id="img_section"></a>
                              <div class="l-caption">
                                  <ul>
                                      <li id="caption_li1"><a href="#"><i class="fa fa-car"></i><p id="p_pet"><?php echo $row['fuel']; ?></p></a></li>
                                      <li id="caption_li2"><a href="#"><i class="fa fa-calendar"></i><p id="p_mod"><?php echo $row['model_year']; ?> <p id="p_mod2">Model</p></p></a></li>
                                      <li id="caption_li3"><a href="#"><i class="fa fa-user"></i><p id="p_seat"><?php echo $row['seat']; ?><p id="p_seat2"> Seats</p></p></a></li>
                                  </ul>
                              </div>
                          </div>

                          <div class="panel panel-default" id="panel_cap2">
                            <div class="panel-footer"  id="panel_cap">
                              <div class="row">
                                <div class="col-sm-4"><h5><?php echo $row['brand']; ?>, <?php echo $row['vehicle_title']; ?></h5></div>
                                <div class="col-sm-4"><h5 style="text-align: right;"><?php echo $row['price']; ?> Kes</h5></div>
                                <div class="col-sm-4"></div>
                              </div>
                              <br>
                              <p id="p_ipsum"><?php echo $row['overview']; ?>,</p>
                            </div>
                          </div>
                    </div>

                    <?php
                  }

                }
                    ?>

                    
                    
                </div>
            </div>
         <!--  -->
       </section>


        <!-- section two -->
       <section id="wrench">
               <div class="col-sm-4" id="div1">
                   <h1><i class="fa fa-calendar" id="fa_icon"></i></h1>
                   <h1><strong>10+</strong></h1>
                   <p>Years In Business</p>
               </div>
               <div class="col-sm-4" id="div2">
                   <h1><i class="fa fa-car" id="fa_icon"></i></h1>
                   <h1><strong>200+</strong></h1>
                   <p>Cars Available</p>
               </div>
               <div class="col-sm-4" id="div3_wrench">
                   <h1><i class="fa fa-user" id="fa_icon"></i></h1>
                   <h1><strong>600+</strong></h1>
                   <p>Satisfied Customers</p>
               </div>
       </section>

        <br><br><br>

        <!-- section three -->

       <section id="testimonies">
         <div class="testmonial_img">
           <div class="testmonial_banner">

            <p id="satisfied"><strong>Our Satisfied</strong><p id="customers"> Customers</p></p>
             <br>
             <div id="myCarousel" class="carousel slide carousel-fade"  data-ride="carousel"> 
                         <?php
                          for($i = 1; $i <= $rowQuery; $i++){
                            $row = mysqli_fetch_assoc($query);
                            $status = $row['status'];
                            $client = $row['client_id'];

                            $sql = "SELECT * FROM clients WHERE client_id = '$client'";
                            $outcome = mysqli_query($con, $sql);

                            while($row1 = mysqli_fetch_assoc($outcome)){
                              $client_name = $row1['fullname'];
                            }
                            ?>
                            <?php
                            if($i === 1){
                            ?>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">         
                                  <div class="jpg_testimonial">
                                    <div class="bg_imgtest">
                                      <span class="fa fa-quote-left" id="quote_left"></span>
                                      <div><p id="h_db"><i><?php echo $row['testimonial']; ?></i></p></div>
                                      <br>
                                      <div id="client"><p id="t_line"></p><h5 id="client_position"><i id="magneto"><?php echo $client_name; ?></i></h5></div>
                                    </div>
                                  </div>
                                <div class="carousel-caption"> 

                                    <br>
                                     <div class="overlay-detail text-center">
                                </div>
                                </div>
                            </div>
                             <?php
                             }else{
                            ?>
                            <div class="item">
                            <div class="jpg_testimonial">
                                    <div class="bg_imgtest">
                                      <span class="fa fa-quote-left" id="quote_left"></span>
                                      <div><p id="h_db2"><i><?php echo $row['testimonial']; ?></i></p></div>
                                      <br>
                                      <div id="client1"><p id="t_line"></p><h5 id="client_position"><i id="magneto"><?php echo $client_name; ?></i></h5></div>
                                    </div>
                                  </div>
                            <div class="carousel-caption">
                                <br>
                                <div class="overlay-detail text-center">
                            </div>
                            </div>
                        </div>
                            <?php
                             }
                            ?>
                            <?php
                          }
                         ?>
                  </div>
             <!--  -->
              
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
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="home.php" id="menu" style="color: #fff;">Home</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="about_us.php" id="menu">About Us</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="car_listing.php" id="menu">Car Listing</a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="" id="menu">FAQ<sup>s</sup></a></p>
                <p><i class="fa fa-chevron-right" id="chevron"></i><a href="contact_us.php" id="menu">Contact Us</a></p>
              </div>
              <div class="col-sm-3">
                 
              </div>
                <?php
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
                 <form action="home.php" method="POST">
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

    //navbar

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

         //side contact_Form

         $(function(){
            $(".navigation_icon1").click(function(){
                $(".navigation1").toggleClass('navigation-open1');
            });
        });
        

        //popover
        // $(function(){
        //     $('#select_nav1').popover();
        // });

   </script>
</body>
</html>