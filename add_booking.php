<?php
session_start();
include 'init.php';


$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

//make the query 
$query = "SELECT DISTINCT hulls.Hulls_id,Hulls_name,Hulls_cordinator,Hulls_capacity,Hulls_status,section, date_table.date_table_date,time_table.time_table_start_time,time_table_end_time FROM `hulls` JOIN `date_table` ON date_table.hull_id = hulls.Hulls_id JOIN time_table ON date_table.date_table_id=time_table.date_id 
-- where hulls.Hulls_id='{$id}'
 " ;  
 $stmt=$con->prepare($query);

 $stmt->execute();

 $fetch=$stmt->fetch();
//  print_r($fetch);
//  $hull_ids=$fetch['Hulls_id'];
//  echo $hull_ids;
//  $date_booking=$fetch['date_table_date'];
//     $time_start_booking=$fetch['time_table_start_time'];
//     $time_end_booking=$fetch['time_table_end_time'];

    if(isset($_SESSION['student'])){


      if(isset($_POST['insert'])){
         $studend_id=$_SESSION['id_studend'];
         $message=$_POST['message'];
        // $hull_id=$hull_ids;
         $hull_id=$fetch['Hulls_id'];
        $date_booking=$fetch['date_table_date'];
         $time_start_booking=$fetch['time_table_start_time'];
        $time_end_booking=$fetch['time_table_end_time'];
      // echo $studend_id;
      //echo $time_end_booking;
       echo $hull_id;
       
     
       
         //insert data
         $sql="INSERT INTO `appointment` (studend_id,hull_id,message,booking_time_start,booking_time_end,booking_date)
           values (:studend_id,:hull_id,:message,:booking_time_start,:booking_time_end,:booking_date)
         ";
         //prepare the sql
         $stmt=$con->prepare($sql);
         $data=[
           'studend_id'=>$studend_id,
           'hull_id'=>$hull_id,
           'message'=>$message,
           'booking_time_start'=>$time_start_booking,
           'booking_time_end'=>$time_end_booking,
           'booking_date'=>$date_booking
           
         
       
       ];
         //execute the query
         $stmt->execute($data);
         if($stmt){
            echo  "<div class='alert alert-success'>your orders added successfully</div>";
               
         }
         
         
       }
     
    }

?>
 <div class="container">
     <form method="post" action="add_booking.php">
       
      <label>Enter your massage</label>
       <textarea name="message" 
          required class="form-control"></textarea>
       <br>
    
      <input type="submit" name="insert" id="insert" id="submit" value="booking" class="btn btn-success">
  </form>
     </div>


<?php include 'include/footer.php';?>