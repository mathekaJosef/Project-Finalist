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
  #manBrands_panel{
    margin-top: -4px;
  }
  #pagination{
    margin-top: -10px;
    color: #8d2f5d;
  }
  #table{
    padding-bottom: 20px;
  }
  #trash{
    margin-left: 30px;
    font-size: 20px;
    color: red;
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
    <section id="createBrand_dashboard">
      <p id="brand_p">Manage Testimonials</p>
      <p id="brand_hr"></p>

      <?php
                include('connect.php');

                 if(isset($_GET['page']) && !empty($_GET['page'])){
                  $page=$_GET['page'];
                  
                 }
                 else{
                  $page = 1;
                 }
                  $item_per_page = 5;
                  $offset = ($page - 1) * $item_per_page;
                  $total = mysqli_query($con,"SELECT * FROM testimonials INNER JOIN clients ON testimonials.client_id = clients.client_id");

                  $count = mysqli_num_rows($total);

                 
                 $totalpages = ceil($count/$item_per_page);
                 
                 $sql = mysqli_query($con,"SELECT * FROM testimonials INNER JOIN clients ON testimonials.client_id = clients.client_id ORDER BY testimonials.date DESC LIMIT $offset, $item_per_page");

                  $row_count = mysqli_num_rows($sql);
                    ?>
                      <ul class="pagination" id="pagination">
                          <?php
                            for($i=1; $i <= $totalpages; $i++) { 
                              
                              if($i === $page){
                                  echo '<li class="active"><a>'. $i . '</a></li>';
                              }else{


                                    echo '<li><a href="manage_testimonials.php?page=' .$i . '">'.$i.'</a></li>';
                               
                              } 

                           }

                          ?>
                    </ul>

             <div class="panel panel-default" id="manBrands_panel">
                <div class="panel-heading" id="panelH_brand">USER TESTIMONIALS</div>
                <div class="panel-body">

                  <form id="table">
                    <div class="form-group">
                      <p>Show</p>
                      <select name="entries" class="form-control" id="select_entry">
                        <option><?php echo $row_count; ?></option>
                      </select>
                      <p id="p_entries">entries</p>
                    </div>
                  </form>


                  <table class="table table-bordered">
                    <tr id="tr_c">
                      <th><b>Name</b></th>
                      <th><b>Email</b></th>
                      <th><b>Testimonials</b></th>
                      <th><b>Date Posted</b></th>
                      <th><b>Action</b></th>
                    </tr>

                      <?php while($row=mysqli_fetch_assoc($sql)){ ?>
                        <?php
                         $id = $row['id'];
                         $status = $row['status'];
                        ?>

                      <tbody>
                        <td><?php echo $row['fullname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td style="width: 300px;"><?php echo $row['testimonial'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <?php
                        if($status === "active"){ ?>
                           <td><?php echo $status; ?></td>
                           <?php }
                            else{ ?>
                          <td><a href="<?php echo 'active.php?id='.$id;?>">Inactive</a></td>
                        <?php } ?>
                        
                      </tbody>
                    <?php } ?>
                  </table>
                  
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