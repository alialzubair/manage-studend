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
$row=$stmt->fetch();
 print_r($row);
?>