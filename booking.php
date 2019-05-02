<?php
session_start();
include "init.php";


//make query to get all booking in database



//get all booking
$sql="SELECT appointment.*,user.*,hulls.* from appointment
JOIN user on appointment.studend_id=user.ID
JOIN hulls on appointment.hull_id=hulls.Hulls_id
where user.ID=?";
$stmt=$con->prepare($sql);
 $stmt->bindvalue(1,$_SESSION['id_studend']);
$stmt->execute();

$row=$stmt->fetchall();

$count=$stmt->rowcount();


?>
<div class="container">
<h1 class="text-center text-info">MY Booking</h1>
<table class="table table-bordered table-condensed table-hover table-striped">
    <tr>
        <td>hull name</td>
        <td>studend name</td>
        <td>date of booking</td>
        <td>controler</td>
    </tr>
    <?php
      if($count >0){?>
         <?php foreach($row as $r):?>
    <tr>
      <td><?php echo $r['Hulls_name'] ?></td>
      <td><?php echo $r['firstName'] ?> <?php  echo $r['lastName']?></td>
      <td><?php echo $r['Appointment_timestamp'] ?></td>
      <td>
        <a href="delete_booking.php?id=<?php echo $r['Appointment_id'] ?>" class="btn btn-danger confirm" >delete</a>
      </td>

    </tr>

<?php endforeach;?>


     <?php  }
     else{
         ?>
          
            <td>
                <p>not have booking</p> 
            </td>
          
           
         <?php
        
     }
    ?>
   
</table>
</div>
<?php include 'include/footer.php';
