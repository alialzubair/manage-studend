<?php
session_start();
include "init.php";


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
print_r($row);


?>