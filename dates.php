<?php
 ob_start();
 session_start();
 include 'init.php';

 //make the sql to get all dates of employee
 $sql="SELECT booking_emp.*,user.firstName,user.lastName,employee_table.employee_table_name from  booking_emp

 JOIN user on user.ID=booking_emp.student_id
 JOIN employee_table on employee_table.employee_table_id=booking_emp.id_emp
 where booking_emp.id_emp='{$_SESSION['id']}'
 ";
//prepare the sql
$stmt=$con->prepare($sql);
//execute the query
$stmt->execute();
//fetch data
$row=$stmt->fetchall();

?>
<div class="container">
  <h1 class="text-center">Manage My Dates</h1>
  <table class="table table-bordered table-condensed table-hover table-striped"> 
    <tr>
        <td>ID</td>
        <td>Service</td>
        <td>Student Name</td>
        <td>Service Date</td>
        <td>Controle</td>
    </tr>
    <?php foreach($row as $r): ?>
    <tr>
        <td><?php echo  $r['id'] ?></td>
        <td><?php echo  $r['servse'] ?></td>
        <td><?php echo  $r['firstName'] ?><?php echo $r['lastName'] ?></td>
        <td><?php echo $r['create_at'] ?></td>
        <td>
         <a href="?do=active&id=<?php echo $r['id'] ?>"><i class="fa fa-edit fa-3x"></i></a>
         <a href="?do=delete&id=<?php echo $r['id'] ?>"><i class="fa fa-remove fa-3x"></i></a>
        </td>
    </tr>
<?php endforeach;?>
   </table>

</div>