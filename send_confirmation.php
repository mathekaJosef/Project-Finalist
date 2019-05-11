<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');

$bb=mysqli_query($con,"SELECT * FROM book WHERE id='$id' ");
while($row=mysqli_fetch_assoc($bb)){
  $client_id=$row['client_id'];
}

$tr=mysqli_query($con,"SELECT * FROM clients WHERE client_id='$client_id' ");
while($yu=mysqli_fetch_assoc($tr)){
  $phone=$yu['phone'];
  $fname=$yu['fullname'];
}
        // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your authentication credentials
    $username   = "hermanSMS";
    $apikey     = "6cf11d28fae12f03380c073ff54640d105c2034084509e9557162cc27b73e50f";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)

    
    
      $phone='+254'.$phone;
      
      
      $recipients = $phone;
    // And of course we want our recipients to know what we really do
    $message='Hello '.$fname.' Your booking has been confirmed. please visit http://www.mathekajosef.co.ke for more information' ;
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    /*************************************************************************************
      NOTE: If connecting to the sandbox:
      1. Use "sandbox" as the username
      2. Use the apiKey generated from your sandbox application
         https://account.africastalking.com/apps/sandbox/settings/key
      3. Add the "sandbox" flag to the constructor
      $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message"
?><script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("The client has been notified") == true) {
    window.location.href = "manage_bookings.php";
}
else{
  window.location.href = "manage_bookings.php";
}</script><?php
        
      }
  }
    catch (Exception $e )
    {
      echo "Encountered an error while sending:".$e->getMessage()."<br>";
      print_r($e);
    } 
      
  



  


    // DONE!!! 