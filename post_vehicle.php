<?php
if(isset($_POST['submit'])){
  include('connect.php');
  $title=$_POST['title'];
  $fuel=$_POST['fuel'];
  $price=$_POST['price'];
  $seat=$_POST['seat'];
  $brand=$_POST['brand'];
  $overview=$_POST["overview"];
  $model=$_POST['model'];

  $name=$_FILES['upload']['name'];
$size=$_FILES['upload']['size'];
$type=$_FILES['upload']['type'];
$temp=$_FILES['upload']['tmp_name'];

  $name1=$_FILES['upload1']['name'];
$size1=$_FILES['upload1']['size'];
$type1=$_FILES['upload1']['type'];
$temp1=$_FILES['upload1']['tmp_name'];

  $name2=$_FILES['upload2']['name'];
$size2=$_FILES['upload2']['size'];
$type2=$_FILES['upload2']['type'];
$temp2=$_FILES['upload2']['tmp_name'];

  $name3=$_FILES['upload3']['name'];
$size3=$_FILES['upload3']['size'];
$type3=$_FILES['upload3']['type'];
$temp3=$_FILES['upload3']['tmp_name'];

  $name4=$_FILES['upload4']['name'];
$size4=$_FILES['upload4']['size'];
$type4=$_FILES['upload4']['type'];
$temp4=$_FILES['upload4']['tmp_name'];

move_uploaded_file($temp,"photo/".$name);
move_uploaded_file($temp1,"photo/".$name1);
move_uploaded_file($temp2,"photo/".$name2);
move_uploaded_file($temp3,"photo/".$name3);
move_uploaded_file($temp4,"photo/".$name4);
$date=date("y-m-d");

$in=mysqli_query($con,"INSERT INTO vehicle VALUES('','$title','$brand','$overview','$price','$fuel','$model','$seat','$name','$name1','$name2','$name3','$name4','$date','free') ");
if($in){

  $steering=$_POST['steering'];
  $brake=$_POST['brake'];
  $airc=$_POST['airc'];
  $door=$_POST['door'];
  $dair=$_POST['dair'];
  $pab=$_POST["pab"];
  $leather=$_POST['leather'];
  $player=$_POST['player'];
  $clock=$_POST['clock'];
  $abs=$_POST['abs'];
  $crash=$_POST['crash'];
  $windows=$_POST['windows'];
  $m=mysqli_query($con,"SELECT max(vehicle_id) as max from vehicle");
  while($row=mysqli_fetch_assoc($m)){
    $plate=$row['max'];
  }


switch ($steering) {
            case 'Power Steering':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$steering') ");
           break;
        }

 switch ($brake) {
            case 'Brake Assist':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$brake') ");
           break;
        } 

 switch ($airc) {
            case 'Air Conditioner':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$airc') ");
           break;
        } 
  switch ($door) {
            case 'Power Door Locks':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$door') ");
           break;
        } 
    switch ($dair) {
            case 'Driver Air Bag':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$dair') ");
           break;
        }      
    switch ($pab) {
            case 'Passenger Air Bag':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$pab') ");
           break;
        } 

        switch ($crash) {
            case 'Crash Sensor':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$crash') ");
           break;
        } 

        switch ($windows) {
            case 'Power Windows':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$windows') ");
           break;
        } 

        switch ($leather) {
            case 'Leather Seats':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$leather') ");
           break;
        } 

        switch ($abs) {
            case 'AntiLock Braking System':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$abs') ");
           break;
        } 

        switch ($clock) {
            case 'Central Locking':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$clock') ");
           break;
        } 

        switch ($player) {
            case 'CD Player':
                mysqli_query($con,"INSERT INTO acess VALUES('$plate','$player') ");
           break;
        } 

        ?>
<script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("The vehicle and its accessories registered successfully. Do you want to register another vehicle ?") == true) { 
    window.location.href = "post_vehicle.php";
}
else{
  window.location.href = "admin_dashboard.php";
}</script>

<?php
  
   }
else{echo mysqli_error($con); }

}
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
      <p id="brand_p">Post Vehicle</p>
      <p id="brand_hr"></p>
          <form method="post" enctype="multipart/form-data">
             <div class="panel panel-default" id="vehicelep_panel">
                <div class="panel-heading" id="panelH_brand">BASIC INFO</div>
                <div class="panel-body">
                  
                    <!-- <div class="row">

                      <div col-sm-6> -->
                        <div class="form-group">
                          <label for="brand-name" id="vehicle_t">Vehicle Title<sup>*</sup></label>
                          <input type="text" name="title" class="form-control" id="vehiclet_input">
                        </div>
                      <!-- </div> -->

                      <!-- <div col-sm-6> -->
                        <div class="form-group">
                          <label for="brand-name" id="label_select">Select Brand<sup>*</sup></label>
                          <select name="brand" class="form-control" id="v_select">
                      
                        <option value="">-Choose Brand-</option>
<?php
 include('connect.php');
            $sql = mysqli_query($con,"SELECT DISTINCT brand_name FROM brand");

            $count = mysqli_num_rows($sql);

           while( $result = mysqli_fetch_assoc($sql))
           {
                  echo"    <option value='".$result['brand_name']."'>".$result['brand_name']."</option>";
                  }
                      ?>
                         </Select>
                        </div>
                      <!-- </div>
                      
                    </div> -->

                    <p id="line_vehicle1"></p>

                   <div class="form-group">
                      <label for="brand-name" id="vehicle_ov">Vehicle Overview<sup>*</sup></label>
                      <textarea name="overview" rows="3" class="form-control" id="vehiclet_message"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="brand-name" id="price_day">Price Per Day<sup>*</sup></label>
                      <input type="text" name="price" class="form-control" id="vehiclet_input">
                    </div>

                    <div class="form-group">
                      <label for="brand-name" id="label_fuel">Select Fuel Type<sup>*</sup></label>
                      <select name="fuel" class="form-control" id="fuelt_select">
                        <option>Select</option>
                        <option>Petrol</option>
                        <option>Diesel</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="brand-name" id="price_day">Model Year<sup>*</sup></label>
                      <input type="text" name="model" class="form-control" id="vehiclet_input">
                    </div>

                    <div class="form-group">
                      <label for="brand-name" id="label_fuel">Seating Capacity<sup>*</sup></label>
                      <input type="number" name="seat" class="form-control" id="seat_capacity" min="2">
                    </div>

                    <p id="line_vehicle1"></p>
                    
                    <p id="upload">Upload Images</p>
                    <div class="row" id="row1">
                      <div class="col-sm-4">
                        <label>Image 1<sup>*</sup></label>
                        <input type="file" name="upload">
                      </div>
                      <div class="col-sm-4">
                        <label>Image 2<sup>*</sup></label>
                        <input type="file" name="upload1">
                      </div>
                      <div class="col-sm-4">
                        <label>Image 3<sup>*</sup></label>
                        <input type="file" name="upload2">
                      </div>
                    </div>

                    <div class="row" id="row2">
                      <div class="col-sm-4">
                        <label>Image 4<sup>*</sup></label>
                        <input type="file" name="upload3">
                      </div>
                      <div class="col-sm-4">
                        <label>Image 5<sup>*</sup></label>
                        <input type="file" name="upload4">
                      </div>
                      <div class="col-sm-4">
                      </div>
                    </div>

                    <p id="line_vehicle1"></p>

                    <!-- <div class="form-group">
                      <input type="submit" name="submit" id="btn_brand" class="btn btn-default" value="SUBMIT">
                    </div> -->
                  
                </div>
              </div>

              <br>

              <div class="panel panel-default" id="vehicelep_panel">
                <div class="panel-heading" id="panelH_brand">ACCESSORIES</div>
                <div class="panel-body" id="acc_body">
                    <div class="row" id="row3">
                      <div class="col-sm-3">
                        <input type="hidden" name="airc" value="0">
                        <input type="checkbox" name="airc" id="check" class="input-lg" value="Air Conditioner">
                        <p id="air_c">Air Conditioner</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="door" value="0">
                        <input type="checkbox" name="door" id="check" class="input-lg" value="Power Door Locks">
                        <p id="air_c">Power Door Locks</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="abs" value="0">
                        <input type="checkbox" name="abs" id="check" class="input-lg" value="Antilock Braking System">
                        <p id="air_c">AntiLock Braking System</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="brake" value="0">
                        <input type="checkbox" name="brake" id="check" class="input-lg" value="Brake Assist">
                        <p id="air_c">Brake Assist</p>
                      </div>
                    </div>

                     <div class="row" id="row3">
                      <div class="col-sm-3">
                        <input type="hidden" name="steering" value="0">
                        <input type="checkbox" name="steering" id="check" class="input-lg" value="Power Steering">
                        <p id="air_c">Power Steering</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="dair" value="0">
                        <input type="checkbox" name="dair" id="check" class="input-lg" value="Driver Air Bag">
                        <p id="air_c">Driver Airbag</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="pab" value="0">
                        <input type="checkbox" name="pab" id="check" class="input-lg" value="Passenger Air Bag">
                        <p id="air_c">Passenger Airbag</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="windows" value="0">
                        <input type="checkbox" name="windows" id="check" class="input-lg" value="Power Windows">
                        <p id="air_c">Power Windows</p>
                      </div>
                    </div>

                     <div class="row" id="row3">
                      <div class="col-sm-3">
                        <input type="hidden" name="player" value="0">
                        <input type="checkbox" name="player" id="check" class="input-lg" value="CD Player">
                        <p id="air_c">CD Player</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="clock" value="0">
                        <input type="checkbox" name="clock" id="check" class="input-lg" value="Central Locking">
                        <p id="air_c">Central Locking</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="crash" value="0">
                        <input type="checkbox" name="crash" id="check" class="input-lg" value="Crash Sensor">
                        <p id="air_c">Crash Sensor</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" name="leather" value="0">
                        <input type="checkbox" name="leather" id="check" class="input-lg" value="Leather Seats">
                        <p id="air_c">Leather Seats</p>
                      </div>
                    </div>

                    <p id="line_vehicle1"></p>


                </div>
              </div>

              
                  <input type="submit" name="submit" id="btn_cancel" class="btn btn-default" value="CANCEL">
                  <input type="submit" name="submit" id="btn_submit" class="btn btn-default" value="SUBMIT">

                  <br><br><br>
            </form>
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