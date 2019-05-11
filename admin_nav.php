
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
  #topbar{
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    height: 40px;
    background: #fff;
    transition: 1s;
    padding: 9px 0;
    text-align: center;
    box-shadow: 0px 9px 10px -12px rgba(0, 0, 0, 0.8);
  }
  #admin_select{
  width: 100px;
  margin-top: -3px;
  margin-left: 1230px;
  height: 27px;
  border: none;
  background-color: #fff;
  color: #8d2f5d;
}
#log_out{
  margin-top: -15px;
  margin-left: 20px;
  font-size: 13px;
  color: #8d2f5d;
}
#log_out:hover{
  background: none;
}
#image{
    border-radius: 50%;
    height: 30px;
    width: 28px;
    margin-top: -3px;
    margin-left: 7px;
  }
  #h5{
   margin-top: 3px;
   margin-left: -20px;
  }
  #nav_pills{
    margin-left: 1170px;
  }
  #log_out{
    color: #8d2f5d;
    font-size: 20px;
  }
</style>
<body>
  <!-- navbar -->
   <nav class="navbar-fixed-top" id="topbar">
    <ul class="nav-pills nav navbar-nav" id="nav_pills">
      <?php
      include('connect.php');
        session_start();
        $email=$_SESSION['admin'];

        if(!isset($_SESSION['admin'])){
        header('location:admin_login.php');
        }
        
        $select = mysqli_query($con,"SELECT * FROM login WHERE email ='$email' ");
        while($row=mysqli_fetch_assoc($select)){
          $user_name=$row['name'];
          $image=$row['image'];

          

          ?>
          <li class='nav-item'><h5 id="h5"><?php echo $user_name; ?></h5></li>
          <li class='nav-item'><img src="photo/<?php echo $image; ?>" id="image"></li>
          <?php
        }

      ?>

      <li class='nav-item'><a id='log_out'><span class='fa fa-sign-out' id='log_out'></span></a></li>
     
     </ul> 
   </nav>

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

         document.getElementById('log_out').addEventListener('click', function(){
           // alert('hello world');

           let x = window.beforeunload;

           if(confirm('Do you want to exit from this page?') === true){
            window.location.href = 'log_out.php';
           }
         })

   </script>
</body>
</php>