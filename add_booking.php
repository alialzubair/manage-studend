<?php
session_start();
include 'init.php';


$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
$msg='';     
?>
 <div class="container">
    <div class=""><?php  echo $msg; ?></div>
     <form method="post" action="add_booking.php?id=<?php echo $id?>">
       
      <label>Enter your massage</label>
       <textarea name="message" 
          required class="form-control"></textarea>
       <br>
    
      <input type="submit" name="insert" id="insert" id="submit" value="booking" class="btn btn-success">
  </form>
     </div>
<?php
 $h=hull($id);
 
if(isset($_POST['insert'])){
  $message=$_POST['message'];
  $hull_id=$h['hull_id'];
  $time_start=$h['time_table_start_time'];
  $time_end=$h['time_table_end_time'];
 $studen_id=$_SESSION['id_studend'];
 //insert data
 $sql="INSERT into appointment (message,studend_id,hull_id,booking_time_start,booking_time_end) values('{$message}','{$studen_id}','{$hull_id}','{$time_start}','{$time_end}')";
 $stmt=$con->prepare($sql);
 $stmt->execute();
 if($stmt){
   $msg= '<div class="alert alert-info">Your Booking Added Successfully</div>';
 }
}

 include 'include/footer.php';