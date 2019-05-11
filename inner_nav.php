<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="project_f.css">
</head>
<style type="text/css">
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
        }

        #fa_us{
          font-size: 18px;
          margin-top: -35px;
          margin-left: -4px;
          padding-right: 4px;
        }
        #drop_menu{
          margin-left: 1125px;
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
       #v_border{
            border: 1px solid #f2d9e5;
            width: 1170px;
           }

           /*search*/
        .form-inline{
          margin-top: -10px;
          margin-left: 1250px;
          color: #ecc6d8;
          font-size: 29px;
        }
        #sign_out{
          color: #ecc6d8;
        }
        #sign_out: hover{
          color: #ecc6d8;
        }

        #select_nav1{
          width: auto;
          margin-top: -62px;
          margin-left: 1056px;
          height: 30px;
          border: none;
          font-size: 12px;
          background-color: #8d2f5d;
          border: .5px solid #ecc6d8;
          color: #ecc6d8;
        }
</style>
<body>

    <?php
      include('connect.php');
      $email = $_SESSION['email'];

      $sql = mysqli_query($con, "SELECT * FROM clients WHERE email = '$email'");

      $row = mysqli_fetch_assoc($sql);
      $name = $row['fullname'];
    ?>

    <nav class="navbar-fixed-top" id="topbar">

      <div class="form-inline">
        <a href="#" id="log_out"><span class="fa fa-sign-out" id="sign_out"></span></a>
      </div>

     <form>
        <div class="dropdown">
          <button class=" btn btn-default dropdown-toggle" data-toggle="dropdown" id="select_nav1" style="text-align: left;">
             <span class="fa fa-angle-down" id="fa_us"></span><?php echo $name; ?>
             
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
                  <p id="a_modal">Forgot Password?</p>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <script type="text/javascript">
          document.getElementById('log_out').addEventListener('click', function(){
            // alert('hello world');

            var x=window.onbeforeunload;

            if (confirm("Are you sure you want to log out?") == true) { 
                window.location.href = "user_logout.php";
            }
          })
        </script>
</body>
</html>