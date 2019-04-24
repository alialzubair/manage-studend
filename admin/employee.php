<?php
//include the header page 
include 'include/header.php';
include 'init.php';
include 'actions.php';
$major=getall('major');


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
     $sql="SELECT employee_table.*,major.major_name,section.section_name from employee_table
     join major on major.major_id=employee_table.major_id
     join  section on  section.section_id=employee_table.section_id";
     //prepare the sql
     $stmt=$con->prepare($sql);
     //execute the query
     $stmt->execute();
     //fetch all data for the database
     $row=$stmt->fetchall();
   

     ?>
     <div class="container">
     <h1 class="text-center">Manage Employee</h1>
     <a href="?do=create" class="btn btn-info">Add New Employee</a>
     <hr>
     <table class="table table-hover table-striped">
         <tr>
             <td>Employee Id</td>
             <td>Name</td>
             <td>Email</td>
             <td>Address</td>
             <td>Phone</td>
             <td>Type</td>
             <td>Major</td>
             <td>Section</td>
             <td>Time Start</td>
             <td>Time End</td>
             <td>Edit</td>
             <td>Delete</td>
         </tr>
         <?php foreach($row as $r): ?>
         <tr>
           <td><?php echo $r['employee_table_id'] ?></td>
           <td><?php echo $r['employee_table_name'] ?></td>
           <td><?php echo $r['email'] ?></td>
           <td><?php echo $r['address'] ?></td>
           <td><?php echo $r['phone'] ?></td>
           <td><?php echo $r['type'] ?></td>
           <td><?php echo $r['major_name'] ?></td>
           <td><?php echo $r['section_name'] ?></td>
           <td><?php echo $r['time_start'] ?></td>
           <td><?php echo $r['time_end'] ?></td>
           <td>
             <a href="?do=edit&id=<?php echo $r['employee_table_id'] ?>" class="btn btn-success">Edit</a>
             </td>
             <td>
             <a href="?do=delete&id=<?php echo $r['employee_table_id'] ?>" class="btn btn-danger confirm">Delete</a>
           </td>
         </tr>

         <?php endforeach;?>
     </table>

    
     </div>
     <?php

 }
 elseif($do=='create')
 {
    
    //insert info to database
    if(isset($_POST['singup'])){
        //set the vars
        $username=$_POST['username'];
        $full_name=$_POST['full_name'];
        $email=$_POST['email'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $shapass=sha1($pass1);
        @$gender=$_POST['gender'];
        $phone=$_POST['phone'];
        $majors=$_POST['major'];
        $address=$_POST['address'];
        if($pass1 !=$pass2){
            echo '<div class="alert alert-danger">passowrd not match</div>';
    }
    else{
            //send the data to database
            $sql="INSERT into employee_table (employee_table_pass
            ,employee_table_name,email,major_id,gender,username,address,phone) values('{$shapass}','{$full_name}','{$email}','{$majors}','{$gender}','{$username}','{$address}','{$phone}')";
            //prepare the sql
            $stmt=$con->prepare($sql);
            //make data
         //  $data=[':ID'=>$id,':firstname'=>$first_name,':lastname'=>$last_name,':email'=>$email,':mobile'=>$phone,':username'=>$username,':password'=>$shapass,':gender'=>$gender,':major'=>$majors];
            //execute the query
            $stmt->execute();
    
            //check the stmat execute
            if($stmt){
                 echo '<div class="alert alert-success">your account create successfully,</div>';
    
            }
        }
    
    
     
    
    }
    ?>
    
    <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
      </div>
      <div class="panel-body">
        <form method="post" action="?do=create">
        <!-- username -->
        <div class="form-group">
            <label>username</label>
            <input class="form-control" name="username" type="text">
        </div> <!-- form-group end.// -->
        <!-- email -->
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" placeholder="">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!-- password -->
        <div class="form-row">
            <div class="form-group col-md-6">
              <label>password</label>
              <input type="password" name="pass1" class="form-control">
            </div> <!-- form-group end.// -->
            <div class="form-group col-md-6">
            <label>Confirem password</label>
              <input type="password" name="pass2" class="form-control">
            </div> <!-- form-group end.// -->
        </div> <!-- form-row.// -->
            <!-- username -->
            <div class="form-group">
            <label>fullName</label>
            <input class="form-control" name="full_name" type="text">
        </div> <!-- form-group end.// -->
            <div class="form-group">
            <label>address</label>
            <input class="form-control" name="address" type="text">
        </div> <!-- form-group end.// -->
            <div class="form-group">
            <label>phone</label>
            <input class="form-control" name="phone" type="text">
        </div> <!-- form-group end.// -->
        
        <!-- gender -->
        <div class="form-group">
                <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="Male">
              <span class="form-check-label"> Male </span>
    
            </label>
            <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="Female">
              <span class="form-check-label"> Female</span>
            </label>
        </div> <!-- form-group end.// -->
          <!--major-  -->
        <div class="form-group">
        <label>Major</label>
              <select id="inputState" class="form-control" name="major">
                <option> Choose...</option>
                    <?php foreach($major as $m):?>
                <option value="<?php echo $m['major_id'] ?>"><?php echo $m['major_name'] ?></option>
                <?php endforeach;?>
              </select>
        </div> <!-- form-group end.// --> 
         <!-- regester  -->
        <div class="form-group">
            <button type="submit" name="singup" class="btn btn-primary btn-block"> Register  </button>
        </div> <!-- form-group// -->      
        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
    </form>
    
      </div>
    </div>
    
    </div>
    
    
    <div class="container">
        <div class="row">
        <!-- col-md-8 -->
           <div class="col-md-8">
             
           </div>
           <!-- col-md-3 -->
           <div class="col-md-3">
           </div>
        </div>
      </div>
    <?php
 }
 elseif($do=='edit')
 {
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

    $sql="SELECT employee_table.*,major.major_name from employee_table
  JOIN major on major.major_id=employee_table.major_id where employee_table.employee_table_id='{$id}' ";
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
  <form method="post" action="?do=edit">
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
     
          </div>
        </div>
     </div>
   </div>
</div>
   </div>
<?php

 }
 elseif($do=='delete')
 {
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
    $stmt=$con->prepare("select * from employee_table where employee_table_id=?");
 $stmt->execute(array($id));
 $row=$stmt->fetchall();
 $count=$stmt->rowcount();

 if($count >0){

      //delete the users
   $stmt=$con->prepare("delete from employee_table where employee_table_id=?");
   $stmt->execute(array($id));
   if($stmt){
       echo "<div class='alert alert-danger'>users delete sucessfully</div>";
       
   }
  
}
 }

 else {
    echo 'this page not found';
 }

  
?>