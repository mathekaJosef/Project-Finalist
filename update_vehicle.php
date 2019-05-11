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
  
</style>
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


<?php
if(!isset($_GET['id'])){ 
	$id=$_SESSION['id'];
}
else{
	$id=$_GET['id'];
	$_SESSION['id']=$id;
}
 include('connect.php');
  $f=mysqli_query($con,"SELECT * FROM vehicle where vehicle_id='$id' ");
 while($row=mysqli_fetch_assoc($f)){ 
  $title=$row['vehicle_title']; 
  $id=$row['vehicle_id']; 
  $brand=$row['brand']; 
  $price=$row['price']; 
  $fuel=$row['fuel']; 
  $model=$row['model_year']; 
 
} ?>

 

<!-- dashboard -->
    <section id="createBrand_dashboard">
      <p id="brand_p">Update Vehicle Details</p>
     
      <p id="brand_hr"></p>
             <div class="panel panel-default" id="brand_panel">
                <div class="panel-heading" id="panelH_brand">FORM FIELDS</div>
                <div class="panel-body">

                  <?php
                    if(isset($_POST['my_submit'])){
                      $price1=$_POST['my_price'];

                      $up=mysqli_query($con,"UPDATE vehicle SET price='$price1' WHERE vehicle_id='$id' ");
                      if($up){ ?>
                        <script>
                        // var x=window.onbeforeunload;
                        // logic to make the confirm and alert boxes
                        if (confirm("Vehicle details updated!. Return to manage vehicle details?") == true) { 
                            window.location.href = "manage_vehicles.php";
                        }
                        else{
                          window.location.href = "admin_dashboard.php";
                        }</script> 
                        <?php
                      }
                        else{
                           echo mysqli_error($con);
                         }
                    }


                    ?>

                  <form method="post">

                    <div class="form-group">
                      <label for="brand-name" id="label_brand">Vehicle title</label>
                      <input type="text" name="current_pass" class="form-control" id="brand_input" placeholder="<?php echo $title; ?>">
                    </div>

                    <div class="form-group">
                      <label for="brand-name" id="label_brand">Brand</label>
                      <input type="text" name="new_pass" class="form-control" id="brand_input" placeholder="<?php echo $brand; ?>">
                    </div>

                    <div class="form-group">
                      <label for="brand-name" id="label_brand">Price</label>
                      <input type="text" name="my_price" class="form-control" id="brand_input" placeholder="<?php echo $price; ?> ">
                    </div>

                    <p id="line_button"></p>
                    <div class="form-group">
                      <input type="submit" name="my_submit" id="btn_brand" class="btn btn-default" value="UPDATE">
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