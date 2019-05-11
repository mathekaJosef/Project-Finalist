<?php
$page=$_POST['page'];
 include('connect.php');
            $sql = mysqli_query($con,"SELECT  words FROM about");
            while($row=mysqli_fetch_assoc($sql)){
            	$words=$row['words'];
            }

            $count = mysqli_num_rows($sql);
            ?>
            <fieldset disabled><?php
echo "<textarea name='message' rows='5' class='form-control' placeholder='$words'>";
echo "</textarea>";?>
</fieldset><?php
     
           ?>