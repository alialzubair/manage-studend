<?php
session_start();
include "init.php";


//make query to get all booking in database



//get all booking
$sql="SELECT booking.*,user.*,hulls.* from booking
JOIN user on booking.student_id=user.ID
JOIN hulls on booking.hulls_id=hulls.Hulls_id
where user.ID=?";
$stmt=$con->prepare($sql);
 $stmt->bindvalue(1,$_SESSION['id_studend']);
$stmt->execute();

$row=$stmt->fetchall();

$count=$stmt->rowcount();


?>
<div class="container">
<table class="table table-bordered table-hover">
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
      <td><?php echo $r['create_at'] ?></td>
      <td>
        <a href="edit_booking.php?id=<?php echo $r['id_booking'] ?>">edit</a>
        <a href="delete_booking.php?id=<?php echo $r['id_booking'] ?>">delete</a>
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
    <?php foreach($row as $r):?>
    <tr>
      <td><?php echo $r['Hulls_name'] ?></td>
      <td><?php echo $r['firstName'] ?> <?php  echo $r['lastName']?></td>
      <td><?php echo $r['create_at'] ?></td>
      <td>
        <a href="edit_booking.php?id=<?php echo $r['id_booking'] ?>">edit</a>
        <a href="delete_booking.php?id=<?php echo $r['id_booking'] ?>">delete</a>
      </td>

    </tr>

<?php endforeach;?>
</table>
</div>
<?php include 'include/footer.php';
