<?php
//include the header page 
include 'include/header.php';
include 'init.php';


/**
 * we make all the page of members 
 * like {add members , manage members , edit memebrs,delete members,active members}
 * we use the $_get mehtod to do that
 */

 //make the var of page
 $do='';

 //check the request
 if(isset($_GET['do'])){
     //set the var to request
     $do=$_GET['do'];
 } 
 else
 {
    $do='manage';
 }

 //set the all pagges
 if($do=='manage')
 {
     echo 'manage pages';
 }
 elseif($do=='create')
 {
  echo 'create members';
 }
 elseif($do=='edit')
 {
     echo 'edut pages';
 }
 elseif($do=='delete')
 {
     echo 'delete page';
 }
 elseif($do=='active')
 {
   echo 'active page';
 }
 else {
    echo 'this page not found';
 }

  
?>