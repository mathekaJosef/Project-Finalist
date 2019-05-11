<!DOCTYPE html>
<html>
<head>
  <title>InstaRide</title>
   <link rel="icon" href="car13.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="project_f.css">
   
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="chart.bundle.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .chart{
    width: 500px;
  }
  #image{
    border-radius: 50%;
    height: 30px;
    width: 28px;
  }
</style>
<body>

  <div class="alert alert-danger">
    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
  </div>

  <?php
        include('connect.php');
        // $email=$_SESSION['email'];
        $select = mysqli_query($con,"SELECT * FROM login");
        while($row=mysqli_fetch_assoc($select)){
          $user_name=$row['name'];
          $image=$row['image'];

          echo $user_name;

          ?>
          <img src="photo/<?php echo $image; ?>" id="image">
          <?php
        }

      ?>
  
  <?php

        include('connect.php');

            $query1 = " SELECT count(testimonials.client_id) AS 'testimonials_count' ,clients.fullname AS name FROM testimonials INNER JOIN clients ON testimonials.client_id = clients.client_id GROUP BY testimonials.client_id";
             $result1 = mysqli_query($con, $query1);

             $client = [];
             $testimn = [];

            while($row2 = mysqli_fetch_assoc($result1)){
             //  echo "there are" .$row2['COUNT(vehicle_id)']." ".$row2['vehicle_title'];
              // echo "<br/>";
              echo $row2['name']."=>".$row2['testimonials_count'].'<br>';

              array_push($client, $row2['name']);
              array_push($testimn, $row2['testimonials_count']);

            }

            echo json_encode($client);
            echo json_encode($testimn);
          

          
        

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

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($client); ?>,
            datasets: [{
                label: '# of Votes',
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
                    'rgba(255,255,255, 1)'
                ],
                borderWidth: 3,
            }]
        },
        options: {
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
<script type="text/javascript">
//   var ctx = document.getElementById('myChart').getContext('2d');
// var chart = new Chart(ctx, {
//     // The type of chart we want to create
//     type: 'pie',

//     // The data for our dataset
//     data: {
//         labels: ["January", "February", "March", "April", "May", "June", "July"],
//         datasets: [{
//             label: "My First dataset",
//             backgroundColor: 'rgb(255, 99, 132)',
//             borderColor: 'rgb(255, 99, 132)',
//             data: [0, 10, 5, 2, 20, 30, 45],
//         }]
//     },

//     // Configuration options go here
//     options: {}
// });
</script>
</body>
</php>