<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="project_f.css">
</head>
<style type="text/css">
  #select_nav1{
          width: 75px;
          margin-top: -62px;
          margin-left: 876px;
          height: 30px;
          border: none;
          font-size: 11px;
          background-color: #8d2f5d;
          border: .5px solid #ecc6d8;
          color: #ecc6d8;
        }

        /*search*/
        #search_nav1{
          margin-top: -103px;
          margin-left: 1100px;
          height: 31px;
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
          height: 40px;
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
        .dropdown{
          visibility: hidden;
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
       #v_border{
            border: 1px solid #f2d9e5;
            width: 1170px;
           }
           #ul{
          margin-left: -150px;
        }
</style>
<body>
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
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
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
                  <p id="a_modal">Forgot Password?</p>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
</body>
</html>