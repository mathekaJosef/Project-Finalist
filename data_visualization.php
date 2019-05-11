<!DOCTYPE html>
<html>
<head>
  <title>InstaRide</title>
   <link rel="icon" href="car13.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="project_f.css">
  <script type="text/javascript" src="chart.bundle.min.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  #panel_analysis1{
    width: 520px;
  }
  #panel_analysis2{
    width: 444px;
    margin-left: 0px;
  }
  .chart{
    width: 400px;
  }
  .month_chart{
    width: 400px;
  }
  .bookChart{
    width: 300px;
    margin-left: 60px;
    margin-top: auto;
  }
  #testimonial{
    width: 520px;
    text-align: left;
  }
  #un_con{
    width: 444px;
    margin-left: 0px;
  }
  .tst_chart{
    width: 370px;
    text-align: center;
    margin-left: 20px;
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

        
    <section id="createBrand_dashboard">
      <p id="brand_p">Analysis</p>
      <p id="brand_hr"></p>

      <div class="row">
       <div class="col-sm-6">
         <div class="panel panel-default" id="panel_analysis1">
          <div class="panel-heading">All Listings</div>
          <div class="panel-body">
            <?php

        include('connect.php');
        $us=mysqli_query($con,"SELECT * FROM clients");
        $user=mysqli_num_rows($us);

        $ve=mysqli_query($con,"SELECT * FROM vehicle");
        $vehicles=mysqli_num_rows($ve);

        $br=mysqli_query($con,"SELECT * FROM brand");
        $brand=mysqli_num_rows($br);

        $bo=mysqli_query($con,"SELECT * FROM book WHERE status='CONFIRMED' ");
        $bookings=mysqli_num_rows($bo);

        $query_testimonials = mysqli_query($con, "SELECT * FROM testimonials WHERE status = 'active'");
        $rowTestimonials = mysqli_num_rows($query_testimonials);

        $sql_query=mysqli_query($con,"SELECT * FROM query");
        $sql_results=mysqli_num_rows($sql_query);

        $sql_sub=mysqli_query($con,"SELECT * FROM subscribe");
        $sub_results=mysqli_num_rows($sql_sub);

        $json = [];
        array_push($json, $user, $vehicles, $brand, $bookings, $rowTestimonials, $sql_results, $sub_results);
        

        ?>

   <div class="chart">
     <canvas id="myChart" width="50" height="50"></canvas>
   </div>
          <script>
              var ctx = document.getElementById("myChart").getContext('2d');

              var calc = Math.floor(Math.random() * 245);
              var calc1 = Math.floor(Math.random() * 187);
              var calc2 = Math.floor(Math.random() * 77);
              var calc3 = Math.floor(Math.random() * 203);
              var calc4 = Math.floor(Math.random() * 99);
              var calc6 = Math.floor(Math.random() * 213);
              var calc5 = Math.floor(Math.random() * 111);
              var calc7 = Math.floor(Math.random() * 42);

              Chart.defaults.global.defaultFontFamily = 'Lato';
              Chart.defaults.global.defaultFontSize = 14;
              Chart.defaults.global.defaultFontColorFamily = '#777';
              var myChart = new Chart(ctx, {
                  type: 'horizontalBar',
                  data: {
                      labels: ["Registered users", "vehicles", "Listed brands", "Total bookings", "Testimonials", "Queries", "Subscribers"],
                      datasets: [{
                          label: 'Entries',
                          data: <?php echo json_encode($json); ?>,
                          backgroundColor: [
                              'rgba(' + calc + ',' + calc3 + ',' + calc7 + ')',
                              'rgba(' + calc2 + ',' + calc5 + ',' + calc4 + ')',
                              'rgba(' + calc6 + ',' + calc1 + ',' + calc3 + ')',
                              'rgba(' + calc4 + ',' + calc2 + ',' + calc5 + ')',
                              'rgba(' + calc7 + ',' + calc6 + ',' + calc1 + ')',
                              'rgba(' + calc5 + ',' + calc7 + ',' + calc2 + ')',
                              'rgba(' + calc1 + ',' + calc4 + ',' + calc6 + ')'
                          ],
                          borderColor: [
                              'rgba(255,99,132,1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)',
                              'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1,
                      }]
                  },
                  options: {

                    title:{
                      display: true,
                      text: 'Admin Listings',
                      fontSize: 18
                    },
                    legend: {
                      position: 'bottom'
                    },
                      scales: {
                          // yAxes: [{
                          //     ticks: {
                          //         beginAtZero:true
                          //     }
                          // }]
                      }
                  }
              });
          </script>
          </div>
        </div>
       </div>

       <div class="col-sm-6">
         <div class="panel panel-default" id="panel_analysis2">
          <div class="panel-heading">Automobile Booking Frequency</div>
          <div class="panel-body">
            <?php

             include('connect.php');

            $query1 = " SELECT count(book.vehicle_id) AS 'booking_count' ,vehicle.vehicle_title AS vehicle_title FROM book INNER JOIN vehicle ON book.vehicle_id=vehicle.vehicle_id GROUP BY book.vehicle_id";
             $result1 = mysqli_query($con, $query1);

             $vehicle = [];
             $count = [];

            while($row2 = mysqli_fetch_assoc($result1)){
             //  echo "there are" .$row2['COUNT(vehicle_id)']." ".$row2['vehicle_title'];
              // echo "<br/>";
              // echo $row2['vehicle_title']."=>".$row2['booking_count'].'<br>';

              array_push($vehicle, $row2['vehicle_title']);
              array_push($count, $row2['booking_count']);

            }

            // echo json_encode($vehicle);
            // echo json_encode($count);
          

          
        

        ?>

           <div class="bookChart">
             <canvas id="pieChart" width="50" height="50"></canvas>
           </div>
            <script>
                var ctx = document.getElementById("pieChart").getContext('2d');
                var calc = Math.floor(Math.random() * 245);
                var calc1 = Math.floor(Math.random() * 187);
                var calc2 = Math.floor(Math.random() * 77);
                var calc3 = Math.floor(Math.random() * 203);
                var calc4 = Math.floor(Math.random() * 99);
                var calc6 = Math.floor(Math.random() * 213);
                var calc5 = Math.floor(Math.random() * 111);
                var calc7 = Math.floor(Math.random() * 42);

                Chart.defaults.global.defaultFontFamily = 'Lato';
              Chart.defaults.global.defaultFontSize = 14;
              Chart.defaults.global.defaultFontColorFamily = '#777';

                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: <?php echo json_encode($vehicle); ?>,
                        datasets: [{
                            label: 'Frequency',
                            data: <?php echo json_encode($count); ?>,
                            backgroundColor: [
                                'rgba(' + calc + ',' + calc3 + ',' + calc7 + ')',
                                'rgba(' + calc2 + ',' + calc5 + ',' + calc4 + ')',
                                'rgba(' + calc6 + ',' + calc1 + ',' + calc3 + ')',
                                'rgba(' + calc4 + ',' + calc2 + ',' + calc5 + ')'
                            ],
                            borderColor: [
                              'rgba(255,255,255,1)',
                              'rgba(255,255,255, 1)',
                              'rgba(255,255,255, 1)',
                              'rgba(255,255,255, 1)',
                              'rgba(255,255,255, 1)',
                              'rgba(255,255,255, 1)',
                              'rgba(255,255,255, 1)'
                          ],
                          borderWidth: 2,
                        }]
                    },
                    options: {

                    title:{
                      display: true,
                      text: 'booking frequency per vehicle',
                      fontSize: 18
                    },
                    legend: {
                      position: 'bottom'
                    },
                        scales: {
                            // yAxes: [{
                            //     ticks: {
                            //         beginAtZero:true
                            //     }
                            // }]
                        }
                    }
                });
            </script>
          </div>
        </div>
       </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-default" id="testimonial">
            <div class="panel-heading">Monthly Automobile Reservations</div>
            <div class="panel-body">
              <?php
                  include('connect.php');
                  $sql1 = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 1");
                  $result1 = mysqli_num_rows($sql1);

                  $sql2 = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 2");
                  $result2 = mysqli_num_rows($sql2);

                  $sql3 = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 3");
                  $result3 = mysqli_num_rows($sql3);

                  $sql4 = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 4");
                  $result4 = mysqli_num_rows($sql4);

                  $sql5 = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 5");
                  $result5 = mysqli_num_rows($sql5);

                  $sql6 = mysqli_query($con,"SELECT MONTH(from_date) month FROM book WHERE MONTH(from_date) = 6");
                  $result6 = mysqli_num_rows($sql6);

                  $month = [];

                  array_push($month, $result1,$result2,$result3,$result4,$result5,$result6);



                 ?>

                  <div class="month_chart">
                     <canvas id="monthChart" width="50" height="50"></canvas>
                   </div>
                          <script>
                              var ctx = document.getElementById("monthChart").getContext('2d');

                              var calc = Math.floor(Math.random() * 245);
                              var calc1 = Math.floor(Math.random() * 187);
                              var calc2 = Math.floor(Math.random() * 77);
                              var calc3 = Math.floor(Math.random() * 203);
                              var calc4 = Math.floor(Math.random() * 99);
                              var calc6 = Math.floor(Math.random() * 213);
                              var calc5 = Math.floor(Math.random() * 111);
                              var calc7 = Math.floor(Math.random() * 42);

                              Chart.defaults.global.defaultFontFamily = 'Lato';
                              Chart.defaults.global.defaultFontSize = 14;
                              Chart.defaults.global.defaultFontColorFamily = '#777';
                              var myChart = new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                      labels: ["January", "February", "March", "April", "May", "June"],
                                      datasets: [{
                                          label: 'Reservations',
                                          data: <?php echo json_encode($month); ?>,
                                          backgroundColor: [
                                              'rgba(' + calc1 + ',' + calc4 + ',' + calc6 + ')'
                                          ],
                                          borderColor: [
                                              'rgba(255,99,132,1)',
                                              'rgba(54, 162, 235, 1)',
                                              'rgba(255, 206, 86, 1)',
                                              'rgba(75, 192, 192, 1)',
                                              'rgba(153, 102, 255, 1)',
                                              'rgba(255, 159, 64, 1)',
                                              'rgba(255, 159, 64, 1)'
                                          ],
                                          borderWidth: 1,
                                      }]
                                  },
                                  options: {

                                    title:{
                                      display: true,
                                      text: 'Monthly Reservations',
                                      fontSize: 14
                                    },
                                    legend: {
                                      position: 'bottom'
                                    },
                                      scales: {
                                          // yAxes: [{
                                          //     ticks: {
                                          //         beginAtZero:true
                                          //     }
                                          // }]
                                      }
                                  }
                              });
                          </script>
               </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="panel panel-default" id="un_con">
            <div class="panel-heading">Posted Testimonials</div>
            <div class="panel-body">
              <?php

            include('connect.php');

                $query = " SELECT count(testimonials.client_id) AS 'testimonials_count' ,clients.fullname AS name FROM testimonials INNER JOIN clients ON testimonials.client_id = clients.client_id GROUP BY testimonials.client_id";
                 $result = mysqli_query($con, $query);

                 $client = [];
                 $testimn = [];

                while($row = mysqli_fetch_assoc($result)){
                 //  echo "there are" .$row2['COUNT(vehicle_id)']." ".$row2['vehicle_title'];
                  // echo "<br/>";
                  // echo $row['name']."=>".$row['testimonials_count'].'<br>';

                  array_push($client, $row['name']);
                  array_push($testimn, $row['testimonials_count']);

                }

                // echo json_encode($client);
                // echo json_encode($testimn);
              

              
            

            ?>

       <div class="tst_chart">
         <canvas id="tstChart" width="50" height="50"></canvas>
       </div>
    <script>
        var ctx = document.getElementById("tstChart").getContext('2d');
        var calc = Math.floor(Math.random() * 245);
        var calc1 = Math.floor(Math.random() * 187);
        var calc2 = Math.floor(Math.random() * 77);
        var calc3 = Math.floor(Math.random() * 203);
        var calc4 = Math.floor(Math.random() * 99);
        var calc6 = Math.floor(Math.random() * 213);
        var calc5 = Math.floor(Math.random() * 111);
        var calc7 = Math.floor(Math.random() * 42);

        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 14;
        Chart.defaults.global.defaultFontColorFamily = '#777';

        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: <?php echo json_encode($client); ?>,
                datasets: [{
                    label: 'Testimonials',
                    data: <?php echo json_encode($testimn); ?>,
                    backgroundColor: [
                        'rgba(' + calc + ',' + calc3 + ',' + calc7 + ')',
                        'rgba(' + calc2 + ',' + calc5 + ',' + calc4 + ')',
                        'rgba(' + calc6 + ',' + calc1 + ',' + calc3 + ')',
                        'rgba(' + calc4 + ',' + calc2 + ',' + calc5 + ')'
                    ],
                    borderColor: [
                       'rgba(255,255,255,1)',
                       'rgba(255,255,255, 1)',
                       'rgba(255,255,255, 1)',
                       'rgba(255,255,255, 1)',
                       'rgba(255,255,255, 1)',
                       'rgba(255,255,255, 1)',
                       'rgba(255,255,255, 1)'
                  ],
                  borderWidth: 2,
                }]
            },
            options: {

              title:{
                display: true,
                text: 'Users testimonials',
                fontSize: 18
              },
              legend: {
                      position: 'bottom'
              },
                scales: {
                    // yAxes: [{
                    //     ticks: {
                    //         beginAtZero:true
                    //     }
                    // }]
                }
            }
        });
</script>
            </div>
          </div>
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
</php>