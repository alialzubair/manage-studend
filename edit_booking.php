<?php
include "init.php";
include 'actions.php';

//get all booking
$sql="SELECT booking.*,user.*,hulls.* from booking
JOIN user on booking.student_id=user.ID
JOIN hulls on booking.hulls_id=hulls.Hulls_id
where user.ID=?";
$stmt=$con->prepare($sql);
 $stmt->bindvalue(1,$_SESSION['id']);
$stmt->execute();

$row=$stmt->fetchall();

$count=$stmt->rowcount();
print_r($row);


?>