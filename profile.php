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
   $sql="SELECT employee_table.*,major.major_name,section.section_name from employee_table
   JOIN major on employee_table.major_id=major.major_id
   join section on employee_table.section_id=section.section_id
   where employee_table.employee_table_id='{$_SESSION['id']}'";
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
            <?php foreach($admin as $a):?>
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
 elseif($do=='edit_admin'){
  $sql="SELECT employee_table.*,major.major_name from employee_table
  JOIN major on major.major_id=employee_table.major_id where employee_table.employee_table_id='{$_SESSION['id']}' ";
  $stmt=$con->prepare($sql);
  $stmt->execute();
  $r=$stmt->fetch();
 
//update the info
if(isset($_POST['update'])){
 //set the vars
 $id=$_POST['id'];
 $full_name=$_POST['full_name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];
 $time_start=$_POST['time_start'];
 $time_end=$_POST['time_end'];
 $type=$_POST['type'];

 //update the info
 
 $sql="UPDATE  employee_table set employee_table_id=?, employee_table_name=?,email=?,phone=?,type=?,address=?,time_start=?,time_end=? where employee_table_id=? ";
 //prepare the sql
 $stmt=$con->prepare($sql);
 $data=[$id,$full_name,$email,$phone,$type,$address,$time_start,$time_end,$id];
 $stmt->execute($data);
 if($stmt){
  echo '<div class="alert alert-success container">Your Profiel updated successfully</div>';
  header("refresh:3"); }
}
   ?>
   <div class="container">
   <div class="row">
     <div class="col-md-8">
     <div class="panel panel-success">
 <div class="panel-heading"><h4 >Update your Profile</h4></div>
  <div class="panel-body">
  <form method="post" action="?do=edit_acdmin">
  <input type="hidden" name="id" value="<?php echo $r['employee_table_id'] ?>">
  	<!-- fullname -->
		<div class="form-group">
		<label>fullName</label>
	    <input class="form-control"
             name="full_name" 
             value="<?php echo $r['employee_table_name'] ?>"
             type="text">
	</div> <!-- form-group end.// -->
	
<!-- email -->
	<div class="form-group">
		<label>Email address</label>
		<input type="email" 
           name="email"
           value="<?php echo $r['email'] ?>" 
           class="form-control">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
		<div class="form-group">
		<label>address</label>
	    <input class="form-control" 
             name="address" 
             value="<?php echo $r['address'] ?>"
             type="text">
	</div> <!-- form-group end.// -->
		<div class="form-group">
		<label>phone</label>
	    <input class="form-control" 
             name="phone"
             value="<?php echo $r['phone']?>"
              type="text">
	</div> <!-- form-group end.// -->
 <!-- time start -->
 <div class="form-group">
		<label>Time Start</label>
	    <input class="form-control" 
             name="time_start"
             value="<?php echo $r['time_start']?>"
              type="time">
	</div>
 <!-- end time start -->
 <!-- start time end -->
 <div class="form-group">
		<label>Time End</label>
	    <input class="form-control" 
             name="time_end"
             value="<?php echo $r['time_end']?>"
              type="time">
	</div>
 
 <!-- end time end -->
 <!-- start type -->
 <div class="form-group">
		<label>Type</label>
	    <input class="form-control" 
             name="type"
             value="<?php echo $r['type']?>"
              type="text">
	</div>
 
 <!-- end type -->
	
	 <!-- regester  -->
    <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary btn-block"> Update  </button>
    </div> <!-- form-group// -->      
</form>

</div>
</div>
</div>
     
     <div class="col-md-3">
     <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">my stataus</h3>
          </div>
          <div class="panel-body">
              <form action="?do=edit_emp" method="post">

              <select name="status"  class="form-control">
              <option value="<?php echo $r['employee_table_status'] ?>"><?php echo $r['employee_table_status'] ?></option>
                <option value="avaliable">avaliable</option>
                <option value="busy">busy</option>
              </select>
              <br>
              <input type="submit" 
                      name='save'
                      class="btn btn-success"
                       value="save change">
              </form>
            
            

               <?php
                
                 if(isset($_POST['save']))
                 {
                   $statu=$_POST['status'];
                     $sql="UPDATE employee_table set employee_table_status='{$statu}' where employee_table_id='{$_SESSION['id']}' ";
                     $stmt=$con->prepare($sql);
                     $stmt->execute();
                     if($stmt){
                       echo '<div class="alert alert-success">Status updated successfully</div>';
                       header("refresh:3");
                     }
                 }

               
               ?>
          </div>
        </div>
     </div>
   </div>
</div>
   </div>
<?php
 }
 elseif($do=='edit_emp'){
  $sql="SELECT employee_table.*,major.major_name from employee_table
  JOIN major on major.major_id=employee_table.major_id where employee_table.employee_table_id='{$_SESSION['id']}' ";
  $stmt=$con->prepare($sql);
  $stmt->execute();
  $r=$stmt->fetch();
 
//update the info
if(isset($_POST['update'])){
 //set the vars
 $id=$_POST['id'];
 $full_name=$_POST['full_name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];
 $time_start=$_POST['time_start'];
 $time_end=$_POST['time_end'];
 $type=$_POST['type'];

 //update the info
 
 $sql="UPDATE  employee_table set employee_table_id=?, employee_table_name=?,email=?,phone=?,type=?,address=?,time_start=?,time_end=? where employee_table_id=? ";
 //prepare the sql
 $stmt=$con->prepare($sql);
 $data=[$id,$full_name,$email,$phone,$type,$address,$time_start,$time_end,$id];
 $stmt->execute($data);
 if($stmt){
  echo '<div class="alert alert-success container">Your Profiel updated successfully</div>';
  header("refresh:3"); }
}
   ?>
   <div class="container">
   <div class="row">
     <div class="col-md-8">
     <div class="panel panel-success">
 <div class="panel-heading"><h4 >Update your Profile</h4></div>
  <div class="panel-body">
  <form method="post" action="?do=edit_emp">
  <input type="hidden" name="id" value="<?php echo $r['employee_table_id'] ?>">
  	<!-- fullname -->
		<div class="form-group">
		<label>fullName</label>
	    <input class="form-control"
             name="full_name" 
             value="<?php echo $r['employee_table_name'] ?>"
             type="text">
	</div> <!-- form-group end.// -->
	
<!-- email -->
	<div class="form-group">
		<label>Email address</label>
		<input type="email" 
           name="email"
           value="<?php echo $r['email'] ?>" 
           class="form-control">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
		<div class="form-group">
		<label>address</label>
	    <input class="form-control" 
             name="address" 
             value="<?php echo $r['address'] ?>"
             type="text">
	</div> <!-- form-group end.// -->
		<div class="form-group">
		<label>phone</label>
	    <input class="form-control" 
             name="phone"
             value="<?php echo $r['phone']?>"
              type="text">
	</div> <!-- form-group end.// -->
 <!-- time start -->
 <div class="form-group">
		<label>Time Start</label>
	    <input class="form-control" 
             name="time_start"
             value="<?php echo $r['time_start']?>"
              type="time">
	</div>
 <!-- end time start -->
 <!-- start time end -->
 <div class="form-group">
		<label>Time End</label>
	    <input class="form-control" 
             name="time_end"
             value="<?php echo $r['time_end']?>"
              type="time">
	</div>
 
 <!-- end time end -->
 <!-- start type -->
 <div class="form-group">
		<label>Type</label>
	    <input class="form-control" 
             name="type"
             value="<?php echo $r['type']?>"
              type="text">
	</div>
 
 <!-- end type -->
	
	 <!-- regester  -->
    <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary btn-block"> Update  </button>
    </div> <!-- form-group// -->      
</form>

</div>
</div>
</div>
     
     <div class="col-md-3">
     <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">my stataus</h3>
          </div>
          <div class="panel-body">
              <form action="?do=edit_emp" method="post">

              <select name="status"  class="form-control">
              <option value="<?php echo $r['employee_table_status'] ?>"><?php echo $r['employee_table_status'] ?></option>
                <option value="avaliable">avaliable</option>
                <option value="busy">busy</option>
              </select>
              <br>
              <input type="submit" 
                      name='save'
                      class="btn btn-success"
                       value="save change">
              </form>
            
            

               <?php
                
                 if(isset($_POST['save']))
                 {
                   $statu=$_POST['status'];
                     $sql="UPDATE employee_table set employee_table_status='{$statu}' where employee_table_id='{$_SESSION['id']}' ";
                     $stmt=$con->prepare($sql);
                     $stmt->execute();
                     if($stmt){
                       echo '<div class="alert alert-success">Status updated successfully</div>';
                       header("refresh:3");
                     }
                 }

               
               ?>
          </div>
        </div>
     </div>
   </div>
</div>
   </div>
<?php
 }
 elseif($do=='edit_student'){
   $sql="SELECT user.*,major.major_name from user
   JOIN major on major.major_id=user.major_id where user.ID='{$_SESSION['id_studend']}' ";
   $stmt=$con->prepare($sql);
   $stmt->execute();
   $r=$stmt->fetch();
//update the info
if(isset($_POST['update'])){
  //set the vars
  $id=$_POST['id'];
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  @$gender=$_POST['gender'];
  $phone=$_POST['phone'];
  //update the info
  $sql="UPDATE  user set ID=?, firstName=?,lastName=?,email=?,gender=?,mobile=? where ID=? ";
  //prepare the sql
  $stmt=$con->prepare($sql);
  $data=[$id,$first_name,$last_name,$email,$gender,$phone,$id];
  $stmt->execute($data);
  if($stmt){
    echo '<div class="alert alert-success container">Your Profiel updated successfully</div>';
    header("refresh:3");
  }
}
    ?>
    <div class="container">
      
<div class="panel panel-success">
  <div class="panel-heading"><h4 >Update your Profile</h4></div>
   <div class="panel-body">
   <form method="post" action="?do=edit_student">
	<!-- check the errors is sset -->
	<?php
	  if(!empty($errors)){?>
		<!-- 	make the div errors with alert message -->
		<div class="alert alert-dange"></div>
<?php
			// loop throw the errors
			foreach($errors as $r){
				echo $r .'<br>';
			}
		}
	?>
    <!-- id student -->
	<div class="form-group">
		<label>ID</label>
	    <input
            class="form-control"
             type="number"
						 required
             name="id"
						 value="<?php echo $r['ID'] ?>">
	</div> <!-- form-group end.// -->
	<div class="row">
	<!-- first name -->
		<div class="col-md-6 form-group" >
			<label>First name </label>   
		  	<input type="text"                      
				      class="form-control name"
               placeholder="enter your first name"
               name="first_name"
							 required
							 value="<?php echo $r['firstName']?>">
						<div class="text-danger" style="display:none;">first name cannt be larger then <strong>3</strong> characters</div>
						<div class="text-danger" style="display:none;">
						first name cannt be less then <strong>10</strong> characters
						</div>
		</div> <!-- form-group end.// -->
		<!-- last name -->
		<div class="col-md-6 form-group">
			<label>Last name</label>
		  	<input type="text"                 
				       class="form-control"
                placeholder="enter your last name"
                name="last_name"
								required
								value="<?php echo $r['lastName']?>"
>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<!-- email -->
	<div class="form-group">
		<label>Email address</label>
		<input type="email"
		       class="form-control" 
					 placeholder="enter your email address" 
					 name="email"
					 required
					 value="<?php echo $r['email']?>"
>
		<small class="text-info text-muted">We'll never share your email with anyone else.</small>
	</div>
		<!-- gender -->
        <div class="form-group">
			<label class="form-check form-check-inline">
		  <input class="form-check-input" 
			      type="radio"
						 name="gender" 
						 value="male">
		  <span class="form-check-label"> Male </span>

		</label>
		<label class="form-check form-check-inline">
		  <input class="form-check-input"
			      type="radio" 
						name="gender" 
						value="female">
		  <span class="form-check-label"> Female</span>
		</label>
	</div> <!-- form-group end.// -->
	
    <!-- phone -->
	<div class="form-group">
		<label>phone</label>
		<input type="text" 
		       class="form-control" 
					 placeholder="enter your phone" 
					 name="phone"
					 required
					 value="<?php echo $r['mobile'] ?>"
>
	</div>
	 <!-- regester  -->
    <div class="form-group">
        <button type="submit"  name="update" class="btn btn-primary btn-block"> Update  </button>
    </div> <!-- form-group// -->      
</form>

</div>
</div>
</div>
    </div>

    <?php
 }
 
//  <?php  include 'include/footer.php'; ?> 


