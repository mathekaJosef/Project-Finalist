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
   <?php require_once('admin_nav.php'); ?>

   <!-- sidebar -->

   <header class="header">
        <nav class="navigation">
            <section class="navigation_icon">
                <span class="firstbar"></span>
                <span class="topbar"></span>
                <span class="middlebar"></span>
                <span class="bottombar"></span>
            </section>
            
            <ul class="navigation_ul">
                <li class="item">
                  <a href="admin_dashboard.php" class="btn"><i class="fa fa-tachometer" id="admin_fa"></i>Dashboard</a>
                </li>
                <p id="p_li"></p>
                <li class="item"  id="brands">
                  <a href="#brands" class="btn"><i class="fa fa-certificate" id="admin_fa"></i>Brands</a>
                     <div class="smenu">
                        <a href="create_brand.php">Create brand</a>
                        <a href="manage_brands.php">Manage brands</a>
                      </div>
                </li>
                <p id="p_li"></p>
                <li class="item" id="vehicle">
                      <a href="#vehicle" class="btn"><i class="fa fa-sitemap" id="admin_fa"></i>Vehicle</a>
                      <div class="smenu">
                        <a href="post_vehicle.php">Post vehicle</a>
                        <a href="manage_vehicles.php">Manage vehicles</a>
                      </div>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="manage_bookings.php" class="btn"><i class="fa fa-users" id="admin_fa"></i>Manage bookings</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="manage_testimonials.php" class="btn"><i class="fa fa-list-alt" id="admin_fa"></i>Manage testimonials</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="manage_queries.php" class="btn"><i class="fa fa-desktop" id="admin_fa"></i>Manage customers query</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="registered_users.php" class="btn"><i class="fa fa-user" id="admin_fa"></i>Registered users</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="manage_pages.php" class="btn"><i class="fa fa-files-o" id="admin_fa"></i>Manage pages</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="contact_info.php" class="btn"><i class="fa fa-file-o" id="admin_fa"></i>Update contact info</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="manage_subscribers.php" class="btn"><i class="fa fa-table" id="admin_fa"></i>Manage subscribers</a>
                </li>
                <p id="p_li"></p>
                <li class="item">
                      <a href="data_visualization.php" class="btn"><i class="fa fa-line-chart" id="admin_fa"></i>Analysis</a>
                </li>
                
            </ul>
        </nav>

        <!-- dashboard -->
    <section id="createBrand_dashboard">
      <p id="brand_p">Create Brand</p>
     
      <p id="brand_hr"></p>
             <div class="panel panel-default" id="brand_panel">
                <div class="panel-heading" id="panelH_brand">FORM FIELDS</div>
                <div class="panel-body">

                  <form method="post">
                     <?php
if(isset($_POST['submit'])){
  $name=$_POST['brand_name'];
  $datec=date("y-m-d");
  include('connect.php');
  $in=mysqli_query($con,"INSERT INTO brand VALUES('','$name','$datec','') ");
  if($in){


        ?>
<script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Brand registered successfully. Register another brand ?") == true) { 
    window.location.href = "create_brand.php";
}
else{
  window.location.href = "admin_dashboard.php";
}</script>

<?php
  
}
else{ ?>
<div id="error">
  <?php echo "The brand name already exists. Please try another name";?>
</div> <?php
}
}
?>
                    <div class="form-group">
                      <label for="brand-name" id="label_brand">Brand Name</label>
                      <input type="text" name="brand_name" class="form-control" id="brand_input">
                    </div>
                    <p id="line_button"></p>
                    <div class="form-group">
                      <input type="submit" name="submit" id="btn_brand" class="btn btn-default" value="SUBMIT">
                    </div>
                  </form>
                </div>
              </div>
    </section>
    </header>

   


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

           // sidebar

          $(function(){
            $(".navigation_icon").click(function(){
                $(".navigation").toggleClass('navigation-open');
            });
        });
   </script>
</body>
</html>