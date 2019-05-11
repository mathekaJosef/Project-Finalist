
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
    overflow-y: hidden;
  }
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

        <!-- dashboard -->
        <?php

        include('connect.php');
        $us=mysqli_query($con,"SELECT * FROM clients");
        $u=mysqli_num_rows($us);

        $ve=mysqli_query($con,"SELECT * FROM vehicle");
        $v=mysqli_num_rows($ve);

        $br=mysqli_query($con,"SELECT * FROM brand");
        $r=mysqli_num_rows($br);

        $bo=mysqli_query($con,"SELECT * FROM book WHERE status='CONFIRMED' ");
        $b=mysqli_num_rows($bo);

        $query_testimonials = mysqli_query($con, "SELECT * FROM testimonials WHERE status = 'active'");
        $rowTestimonials = mysqli_num_rows($query_testimonials);

        $sql_query=mysqli_query($con,"SELECT * FROM query");
        $sql_results=mysqli_num_rows($sql_query);

        $sql_sub=mysqli_query($con,"SELECT * FROM subscribe");
        $sub_results=mysqli_num_rows($sql_sub);



        ?>
    <section id="createBrand_dashboard">
      <p id="brand_p">Dashboard</p>
      <p id="brand_hr"></p>

             <div class="row">
               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $u; ?></b></h1>
                     <p>REG USERS</p>
                   </div>
                   <div class="panel-footer" id="p_footer">FULL DETAILS <a href="registered_users.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default1">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $v; ?></b></h1>
                     <p>LISTED VEHICLES</p>
                   </div>
                   <div class="panel-footer" id="p_footer1">FULL DETAILS <a href="manage_vehicles.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default2">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $b; ?></b></h1>
                     <p>TOTAL BOOKINGS</p>
                   </div>
                   <div class="panel-footer" id="p_footer2">FULL DETAILS <a href="manage_bookings.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default3">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $r; ?></b></h1>
                     <p>LISTED BRANDS</p>
                   </div>
                   <div class="panel-footer" id="p_footer3">FULL DETAILS <a href="manage_brands.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

             </div>
             <br>
             <div class="row">
               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $sql_results; ?></b></h1>
                     <p>SUBSCRIBERS</p>
                   </div>
                   <div class="panel-footer" id="p_footer2">FULL DETAILS <a href="manage_subscribers.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default1">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $sub_results; ?></b></h1>
                     <p>QUERIES</p>
                   </div>
                   <div class="panel-footer" id="p_footer1">FULL DETAILS <a href="manage_queries.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default2">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $rowTestimonials;?></b></h1>
                     <p>TESTIMONIALS</p>
                   </div>
                   <div class="panel-footer" id="p_footer2">FULL DETAILS <a href="manage_testimonials.php"><span class="fa fa-arrow-right"></span></a></div>
                 </div>
               </div>

               <!-- <div class="col-sm-3">
                 <div class="panel panel-default" id="p_default3">
                   <div class="panel-body">A Basic Panel</div>
                   <div class="panel-footer">Panel Footer</div>
                 </div>
               </div> -->

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
</php>