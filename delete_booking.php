<?php
session_start();
include "init.php";
include 'actions.php'; $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

 //make the query to delete the booking 
 $sql="DELETE from  booking where id_booking= '{$id}' ";

 $stmt=$con->prepare($sql);
 $stmt->execute();

 if($stmt){
     echo 'booking deleted successfully';
 }

?>