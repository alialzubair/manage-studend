<?php
session_start();
include 'init.php';

$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

//make the query 
$query = "SELECT DISTINCT hulls.Hulls_id,Hulls_name,Hulls_cordinator,Hulls_capacity,Hulls_status,section, date_table.date_table_date,time_table.time_table_start_time,time_table_end_time FROM `hulls` JOIN `date_table` ON date_table.hull_id = hulls.Hulls_id JOIN time_table ON date_table.date_table_id=time_table.date_id " ;  
 $stmt=$con->prepare($query);

 $stmt->execute();

 $fetch=$stmt->fetchall();
 print_r($fetch);

 if(isset($_POST['insert'])){
    $studend_id=$_SESSION['name'];
    $message=$_POST['message'];
    $hull_id=$fetch['Hulls_id'];
    echo $hull_id;
 
  
//     //insert data
//     $sql="INSERT INTO `orders` (serv_id,me_id,names,phone,locations,email)
//       values (:serv_id,:me_id,:names,:phone,:locations,:email)
//     ";
//     //prepare the ssql
//     $stmt=$con->prepare($sql);
//     $data=[
//       'serv_id'=>$serv_id,
//       'me_id'=>$emp_id,
//       'names'=>$name,
//       'locations'=>$address,
//       'email'=>$email,
//       'phone'=>$phone
    
  
//   ];
//     //execute the query
//     $stmt->execute($data);
//     if($stmt){
//         $msg= "<div class='alert alert-success'>your orders added successfully</div>";
//            redircthome($msg,'index.php');
//     }
    
    
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