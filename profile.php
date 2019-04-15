<?php
session_start();

include 'init.php';


//check the user is admin
@$admin=admin($_SESSION['user']);
if($admin){
   $sql="SELECT * FROM `employee_table` WHERE employee_table_id='{$_SESSION['id']}' ";
   $stmt=$con->prepare($sql);
   $stmt->execute();
   $admin=$stmt->fetchall();
   ?>

   <div class="container">
      <div class="row">
      <div class="col-md4">
      </div>
      <div class="col-md-8"> 
      
        <div class="panel panel-default">
        <div class="panel-heading">
       <h3 class="panel-title"><?php echo $_SESSION['user']?> profile</h3>
            </div>
            <div class="panel-body">
              
            </div>
        </div>
      </div>
      </div>
   </div>
  
<?php

}

@$empl=empl($_SESSION['user']);
if($empl){
    $sql="SELECT * FROM `employee_table` WHERE employee_table_id='{$_SESSION['id']}' ";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $emp=$stmt->fetchall();
    ?>

    <div class="container">
       <div class="row">
       <div class="col-md4">
       </div>
       <div class="col-md-8"> 
       
         <div class="panel panel-default">
         <div class="panel-heading">
        <h3 class="panel-title"><?php echo $_SESSION['user']?> profile</h3>
             </div>
             <div class="panel-body">
               
             </div>
         </div>
       </div>
       </div>
    </div>
   
<?php }


@$studend=studend($_SESSION['student']);
if($studend){
    $sql="SELECT * FROM `user` WHERE ID='{$_SESSION['id_studend']}' ";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $student=$stmt->fetchall();
    ?>

 <div class="container">
    <div class="row">
    <div class="col-md4">
    </div>
    <div class="col-md-8"> 
    <h1><?php echo $_SESSION['student'] ?> Profile</h1>
      <div class="panel panel-default">
      <div class="panel-heading">
     <h3 class="panel-title"><?php echo $_SESSION['student']?> profile</h3>
          </div>
          <div class="panel-body">
            
          </div>
      </div>
    </div>
    </div>
 </div>

 <?php }?>
 <?php  include 'include/footer.php'; ?> 


