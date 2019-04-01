<?php
//include '../init.php';
/**
 * in this page will make all action to working in database
 * make the method like [add,edit,delete,show,getall,get_single,rowCount...]
 */


 //function to get all data

 function getAll($table){
     global $con;
 $query="SELECT * from {$table}";
  //prepare the query
  $stmt=$con->prepare($query);
  //execute the query
  $stmt->execute();
  //fetch all data
  $fetch=$stmt->fetchAll();

  //return the data
  return $fetch;
 }
 //get thesiangle data
 function singel($table ,$filed,$id){
    global $con;
 $query="SELECT * from {$table} where {$filed}={$id}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     $fetch=$stmt->fetch();
   
     //return the data
     return $fetch;
 }

 //make the row count
 function rowCount($table){
    global $con;
    $query="SELECT * from {$table}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     $fetch=$stmt->fetchAll();
     $count=$stmt->rowCount();
   
     //return the data
     return $count;
 }

 //make the delete function

 function delete($table,$field, $id){
    global $con;
 $query="DELETE  from {$table} where {$field}={$id}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     if($stmt){
         return true;
     }
     else{
         return false;
     }
 }

 function AllSection(){
     global $con;
     $sql="SELECT section.*,major.major_name FROM section
     JOIN major ON
     section.id_major=major.major_id";
     //prepare the sql
     $stmt=$con->prepare($sql);
     //execute the query
     $stmt->execute();

     //fetch all
     $getAll=$stmt->fetchall();

     //return the getall
     return $getAll;
 }

 //sinagel
 
 function SingleSection($id){
    global $con;
    $sql="SELECT section.*,major.major_name FROM section
    JOIN major ON
    section.id_major=major.major_id
      where section_id={$id}
    ";
    //prepare the sql
    $stmt=$con->prepare($sql);
    //execute the query
    $stmt->execute();

    //fetch all
    $getAll=$stmt->fetch();

    //return the getall
    return $getAll;
}