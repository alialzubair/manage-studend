<?php
ob_start();
session_start();

include 'init.php';
$do='';
 if(isset($_GET['do'])){
    $do=$_GET['do'];
 }
 else{
   $do= 'manage';
 }
 if($do=='manage'){
    
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
            <?php foreach($emp as $a):?>
              <div class="col-sm-6">
    <div  align="center"> <img alt="User" src="image/img_avatar2.png" width=70%        class="img-circle img-responsive"> 
    </div>
              <br>
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
               <a href="?do=edit_admin" class="btn btn-success btn-sm pull-right">Edit My Profile</a>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 tital " ><i class="fa fa-user fa-x3"> Name:</i></div><div class="col-sm-7 col-xs-6 "><?php echo $a['employee_table_name'] ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php echo $a['email']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7"><?php echo $a['phone'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >Type:</div><div class="col-sm-7"><?php echo $a['type'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >status:</div><div class="col-sm-7"><?php echo $a['employee_table_status'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >time astar:</div><div class="col-sm-7"><?php echo $a['time_start'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >time end:</div><div class="col-sm-7"><?php echo $a['time_end'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >Major:</div><div class="col-sm-7"><?php  echo $a['major_name']?></div>

 <div class="clearfix"></div>
<div class="col-sm-5 col-xs-6 tital " >Section:</div><div class="col-sm-7"><?php  echo $a['section_name']?></div>

 <div class="clearfix"></div>


<div class="col-sm-5 col-xs-6 tital " >Gender
:</div><div class="col-sm-7"><?php  echo $a['gender'] ?></div>

            <?php endforeach;?>
  
            </div>
        </div>
      </div>
      </div>
   </div>
  
<?php

}

@$empl=empl($_SESSION['user']);
if($empl){
    $sql="SELECT employee_table.*,major.major_name,section.section_name from employee_table
    JOIN major on employee_table.major_id=major.major_id
    join section on employee_table.section_id=section.section_id
    where employee_table.employee_table_id='{$_SESSION['id']}' ";
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
             <?php foreach($emp as $a):?>
              <div class="col-sm-6">
    <div  align="center"> <img alt="User" src="image/img_avatar2.png" width=70%        class="img-circle img-responsive"> 
    </div>
              <br>
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
               <a href="?do=edit_emp" class="btn btn-success btn-sm pull-right">Edit My Profile</a>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 tital " ><i class="fa fa-user fa-x3"> Name:</i></div><div class="col-sm-7 col-xs-6 "><?php echo $a['employee_table_name'] ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital " ><i class="fa fa-envelope">Email:</i> </div><div class="col-sm-7"><?php echo $a['email']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7"><?php echo $a['phone'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >Type:</div><div class="col-sm-7"><?php echo $a['type'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >status:</div><div class="col-sm-7"><?php echo $a['employee_table_status'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >time astar:</div><div class="col-sm-7"><?php echo $a['time_start'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >time end:</div><div class="col-sm-7"><?php echo $a['time_end'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >Major:</div><div class="col-sm-7"><?php  echo $a['major_name']?></div>

 <div class="clearfix"></div>
<div class="col-sm-5 col-xs-6 tital " >Section:</div><div class="col-sm-7"><?php  echo $a['section_name']?></div>

 <div class="clearfix"></div>


<div class="col-sm-5 col-xs-6 tital " >Gender
:</div><div class="col-sm-7"><?php  echo $a['gender'] ?></div>

            <?php endforeach;?>
  
             </div>
         </div>
       </div>
       </div>
    </div>
   
<?php }


@$studend=studend($_SESSION['student']);
if($studend){
    $sql="SELECT user.*,major.major_name FROM user
    join major on major.major_id=user.major_id
    where user.ID='{$_SESSION['id_studend']}' ";
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
      <div class="panel panel-primary">
      <div class="panel-heading">
     <h3 class="panel-title"><?php echo $_SESSION['student']?> profile</h3>
          </div>
          <div class="panel-body">
          <?php foreach($student as $a):?>
              <div class="col-sm-6">
    <div  align="center"> <img alt="User" src="image/img_avatar2.png" width=70%        class="img-circle img-responsive"> 
    </div>
              <br>
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
               <a href="?do=edit_student" class="btn btn-success btn-sm pull-right">Edit My Profile</a>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $a['firstName'] ?><?php echo $a['lastName'] ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php echo $a['email']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7"><?php echo $a['mobile'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >Major:</div><div class="col-sm-7"><?php  echo $a['major_name']?></div>
<hr>
 <div class="clearfix"></div>


<div class="col-sm-5 col-xs-6 tital " >Gender
:</div><div class="col-sm-7"><?php  echo $a['gender'] ?></div>

            <?php endforeach;?>
          </div>
      </div>
    </div>
    </div>
 </div>

 <?php }



 }
 elseif($do=='edit_addmin'){
    echo 'admin';
 }
 elseif($do=='edit_emp'){
    echo 'emp';
 }
 elseif($do=='edit_student'){
    echo 'stuudemt';
 }
 
//  <?php  include 'include/footer.php'; ?> 


