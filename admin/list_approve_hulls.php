<?php
ob_start();
session_start();
include 'include/header.php';
include 'init.php';
$do='';
if(isset($_GET['do'])){
    $do=$_GET['do'];
}
else{
    $do='manage';
}
if($do=='manage'){
    
//make the sql
$sql="SELECT appointment.*,user.firstName,user.lastName,hulls.* from appointment
join user on user.ID=appointment.studend_id
JOIN hulls on  hulls.Hulls_id=appointment.hull_id where appointment.status=1";
$stmt=$con->prepare($sql);
$stmt->execute();
$row=$stmt->fetchall();
$count=$stmt->rowcount();

    ?>

  <!-- output data -->
 <div class="container">
        <h1 class="text-info text-center">List Hulls</h1>
     
         <div class="table-responsive">
           <table class="table table-hover table-striped">
            <tr>
                <td>Appointment_id</td>
                <td>Hulls Name</td>
                <td>Hulls_cordinator</td>
                <td>student name</td>
                <td>booking_time_start</td>
                <td>booking_time_end</td>
                <td>section</td>
                <td>Hulls_capacity</td>
                <td>control</td>
            </tr>
            <?php if($count>0):?>
            <?php foreach($row as $r):?>
            <tr>
                <td><?php echo $r['Appointment_id'] ?></td>
                <td><?php echo $r['Hulls_name'] ?></td>
                <td><?php echo $r['Hulls_cordinator'] ?></td>
                <td><?php echo $r['firstName'] ?><?php echo $r['lastName'] ?></td>
                <td><?php echo $r['booking_time_start'] ?></td>
                <td><?php echo $r['booking_time_end'] ?></td>
                <td><?php echo $r['section'] ?></td>
                <td><?php echo $r['Hulls_capacity'] ?></td>
                <td>
                <a href="?do=delete&id=<?php echo $r['Appointment_id'] ?>" class="btn btn-danger">Delete</a>

                </td>
              
            </tr>
<?php endforeach;?>
<?php  else:?>
<tr>
    <td class="text-danger">not data</td>
</tr>
<?php endif;?>
           </table>
    
    <?php
}
elseif($do=='delete'){
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
     //delete the hulls
     $sql="DELETE from appointment  where Appointment_id='{$id}' ";
     //prepare the sql
     $stmt=$con->prepare($sql);
     //execute the query
     $stmt->execute();
     if($stmt){
         header("location:?do=manage");
     }
}
?>
 