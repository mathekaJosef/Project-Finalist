
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
    margin-left: -40px;
  }
  #table{
    padding-bottom: 20px;
  }
  #confirmed{
    color: #02b170;
    border: 1px solid #02b170;
    margin-left: 8px;
    margin-top: 6px;
    border-radius: 8px;
    transition: 1s all;
    font-style: italic;
  }
  #confirmed:hover{
    color: #fff;
    border: 3px solid #02e390;
    background-color: #02b170;
    margin-left: 8px;
    margin-top: 2px;
    border-radius: 8px;
  }
  #rejected{
    color: #02b170;
    border: 1px solid #02b170;
    margin-left: 8px;
    margin-top: 6px;
    font-style: italic;
    border-radius: 8px;
  }

  #p_search{
  margin-top: -35px;
  margin-left: 830px;
  }
  #mb_searchq{
    width: 160px;
    margin-left: 890px;
    margin-top: -35px;
    border: 1.2px solid #f9ecf2;
  }
</style>
<body>
  <!-- navbar -->
   <?php require_once('admin_nav.php'); ?>>

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
      <p id="brand_p" style="margin-left: -40px;">Manage Bookings</p>
      <p id="brand_hr" style="margin-left: -40px; width: 1080px;"></p>

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
                  $total = mysqli_query($con,"SELECT * FROM book INNER JOIN clients ON book.client_id= clients.client_id ORDER BY book.from_date DESC");

                  $count = mysqli_num_rows($total);

                 
                 $totalpages = ceil($count/$item_per_page);
                 
                 $sql = mysqli_query($con,"SELECT * FROM book INNER JOIN clients ON book.client_id= clients.client_id ORDER BY book.from_date DESC LIMIT $offset, $item_per_page");

                  $row_count = mysqli_num_rows($sql);
                    ?>
                      <ul class="pagination" id="pagination">
                          <?php
                            for($i=1; $i <= $totalpages; $i++) { 
                              
                              if($i === $page){
                                  echo '<li class="active"><a>'. $i . '</a></li>';
                              }else{


                                    echo '<li><a href="manage_bookings.php?page=' .$i . '">'.$i.'</a></li>';
                               
                              } 

                           }

                          ?>
                    </ul>

             <div class="panel panel-default" id="manBrands_panel" style="margin-left: -40px; width: 1080px;">
                <div class="panel-heading" id="panelH_brand">BOOKINGS INFO</div>
                <div class="panel-body">
                  
                  <form id="table">
                    <div class="form-group">
                      <p>Show</p>
                      <select name="entries" class="form-control" id="select_entry">
                        <option><?php echo $row_count;?></option>
                      </select>
                      <p id="p_entries">entries</p>
                    </div>
                  </form>

                  <table class="table table-bordered">
                    <tr id="tr_c">
                      
                      <th><b>Name</b></th>
                      <th><b>Vehicle</span></b></th>
                      <th><b>From Date</b></th>
                      <th style="width: 100px;"><b>To Date</b></th>
                      <th id="m_message" style="width: 150px;"><b>Message</b></th>
                      <th><b>Status</b></th>
                      <th><b>Date Posted</b></th>
                      <th><b>Action</b></th>
                      <th><b>Action</b></th>
                    </tr>
                     <?php
                     include('connect.php');

                     while($row=mysqli_fetch_assoc($sql)){
                       $name=$row['fullname'];
                        $id=$row['id'];
                        $vehicl=$row['vehicle_id'];
                      $u=mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id='$vehicl' ");
                      while($ro=mysqli_fetch_assoc($u)){
                      $vehicle=$ro['brand'].' '.$ro['vehicle_title'];
                      }

                        $to=$row['to_date'];
                        $from=$row['from_date'];
                        $date=$row['date'];
                        $message=$row['message'];
                        $status=$row['status'];
                          echo '<tbody style="font-size: 12px;">';
                          
                          echo '<td>'.$name.'</td>';
                          echo '<td>'.$vehicle.'</td>';
                          echo '<td>'.$from.'</td>';
                          echo '<td>'.$to.'</td>';
                          echo '<td>'.$message.'</td>';
                          echo '<td>'.$status.'</td>';
                          echo '<td>'.$date.'</td>';
                          if($status=="CONFIRMED"){ 
                            echo "<td class='btn btn-default btn-sm' id='confirmed'>Confirmed</td>";
                           }
                            else{
                          echo "<td><a class='btn btn-primary btn-sm' href=confirm.php?id=".$id.">Confirm</a></td>";
                        }

                         if($status=="REJECTED"){ 
                            echo "<td class='btn btn-default disabled btn-sm' id='rejected'>Rejected</td></tbody>";
                           } 
                           else{
                        echo "<td><a class='btn btn-danger btn-sm' href=reject.php?id=".$id.">Reject</a></td></tbody>";}
                      } ?>
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