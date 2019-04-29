<?php
 ob_start();
 session_start();
 include 'init.php';
 //make the sql to get all dates of employee
 $sql="SELECT booking_emp.*,user.firstName,user.lastName,employee_table.employee_table_name from  booking_emp

 JOIN user on user.ID=booking_emp.student_id
 JOIN employee_table on employee_table.employee_table_id=booking_emp.id_emp
 where booking_emp.id_emp='{$_SESSION['id']}' and booking_emp.status=0
 ";
//prepare the sql
$stmt=$con->prepare($sql);
//execute the query
$stmt->execute();
//fetch data
$row=$stmt->fetchall();
$count=$stmt->rowcount();

$do='';
$msg='';
if(isset($_GET['do'])){
    $do=$_GET['do'];
}
else{
    $do='manage';
}
if($do=='manage'){
    ?>
    <div class="container">
    <h1 class="text-center">Manage My Dates</h1>
    <div><?php echo $msg; ?></div>
    <table class="table table-bordered table-condensed table-hover table-striped"> 
      <tr>
          <td>ID</td>
          <td>Service</td>
          <td>Student Name</td>
          <td>Service Date</td>
          <td>Controle</td>
      </tr>
      <?php
        if($count>0){?>
      <?php foreach($row as $r): ?>
      <tr>
          <td><?php echo  $r['id'] ?></td>
          <td><?php echo  $r['servse'] ?></td>
          <td><?php echo  $r['firstName'] ?><?php echo $r['lastName'] ?></td>
          <td><?php echo $r['create_at'] ?></td>
          <td>
           <a href="dates.php?do=active&id=<?php echo $r['id'] ?>" class="btn btn-info">Active</a>
           <a href="?do=delete&id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
          </td>
      </tr>
  <?php endforeach;?>


        <?php


        }
        else{?>
            <tr >
                <td class="alert alert-danger">not orders</td>
            </tr>
       <?php }
      
      ?>
     </table>
  
  </div>
  
      <?php
}
elseif($do=='active'){
   $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
   //approve the order
   $sql="UPDATE booking_emp set status=1 where id='{$id}'";
   //preppare the sql
   $stmt=$con->prepare($sql);
   //execute the query
   $stmt->execute();
   if($stmt){
       $msg= '<div class="alert alert-info">the order approve</div>';
      // header("location:?do=manage");
   }
}
elseif($do=='delete'){
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
    //delete the order
   $sql="DELETE from booking_emp  where id='{$id}'";
   //preppare the sql
   $stmt=$con->prepare($sql);
   //execute the query
   $stmt->execute();
   if($stmt){
       $msg= '<div class="alert alert-info">the order delete</div>';
      // header("location:?do=manage");
     echo to('dates.php?do=list');
   }

}
elseif($do=='list'){
    $sql="SELECT booking_emp.*,user.firstName,user.lastName,employee_table.employee_table_name from  booking_emp

    JOIN user on user.ID=booking_emp.student_id
    JOIN employee_table on employee_table.employee_table_id=booking_emp.id_emp
    where booking_emp.id_emp='{$_SESSION['id']}' and booking_emp.status=1
    ";
   //prepare the sql
   $stmt=$con->prepare($sql);
   //execute the query
   $stmt->execute();
   //fetch data
   $row=$stmt->fetchall();
   $count=$stmt->rowcount();
   ?>
       <div class="container">
    <h1 class="text-center">Show All My Dates</h1>
    <div><?php echo $msg; ?></div>
    <table class="table table-bordered table-condensed table-hover table-striped"> 
      <tr>
          <td>ID</td>
          <td>Service</td>
          <td>Student Name</td>
          <td>Service Date</td>
          <td>Controle</td>
      </tr>
      <?php
        if($count>0){?>
      <?php foreach($row as $r): ?>
      <tr>
          <td><?php echo  $r['id'] ?></td>
          <td><?php echo  $r['servse'] ?></td>
          <td><?php echo  $r['firstName'] ?><?php echo $r['lastName'] ?></td>
          <td><?php echo $r['create_at'] ?></td>
          <td>
           <a href="?do=delete&id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
          </td>
      </tr>
  <?php endforeach;?>


        <?php


        }
        else{?>
            <tr >
                <td class="alert alert-danger">not orders</td>
            </tr>
       <?php }
      
      ?>
     </table>
  
  </div>
  
      <?php
    
}
else{
    echo 'page not found';
}
?>
