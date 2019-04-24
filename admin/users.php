<?php
//include the header page 
include 'include/header.php';
include 'init.php';
include 'actions.php';


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
	 //make the sql to get all data
	$sql="SELECT user.*,major.major_name,section.section_name from user
	join major on major.major_id=user.major_id
	join section on section.section_id=user.section_id
	";
	$stmt=$con->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetchall();
	$count=$stmt->rowcount();
	?>
      <div class="container">
        <h1 class="text-info text-center">Manage student</h1>
        <a href="users.php?do=create" class="btn btn-primary">Add New student </a>
        <hr>
        <!-- make table to show all major -->
         <div class="table-responsive">
           <table class="table table-hover table-striped">
               <tr>
                   <td>id_student</td>
                   <td>fullName</td>
                   <td>gender</td>
                   <td>major</td>
                   <td>section</td>
				   <td>email</td>
				   <td>mobile</td>
                   <td>Edit</td>
                   <td>Delete</td>
                   <td>Active</td>
                   
               </tr>
<?php foreach($row as $r):?>
 <tr>
	 <td><?php echo $r['ID'] ?></td>
	 <td><?php echo $r['firstName'] ?><?php echo $r['lastName'] ?></td>
	 <td><?php echo $r['gender'] ?></td>
	 <td><?php echo $r['major_name'] ?></td>
	 <td><?php echo $r['section_name'] ?></td>
	 <td><?php echo $r['email'] ?></td>
	 <td><?php echo $r['mobile'] ?></td>
	 <td>
	  <a href="?do=edit&id=<?php echo $r['ID'] ?>" class="btn btn-success">Edit</a>
	  </td>
	  <td>
	  <a href="?do=delete&id=<?php echo $r['ID'] ?>" class="btn btn-danger confirm">Delete</a>
	  </td>
<td>
	  <!-- check the status of user -->
	  <?php
	    if($r['status']==0){?>
	  <a href="?do=active&id=<?php echo $r['ID'] ?>" class="btn btn-primary">Active</a>

		<?php } 
	  ?>
	 </td>
	 
 </tr>
 <?php endforeach;?>
     
	<?php
 }
 elseif($do=='create')
 {
	 //use function getall to get all data from database
 $major=getall('major');
 $section=getall('section');
 //insert info to database
 if(isset($_POST['singup'])){
    //set the vars
    $id=$_POST['id'];
    $username=$_POST['username'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    $shapass=sha1($pass1);
    @$gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $majors=$_POST['choose'];
    $sections=$_POST['section'];
 //make the form errors
 $errors=[];
 if(strlen($first_name)<=3){
  $errors[]='first name cannt be larger then <strong>3</strong> characters';
 }
 if(strlen($last_name)<=3){
  $errors[]='last name cannt be larger then <strong>3</strong> characters';
 }
 if(strlen($first_name)<10){
  $errors[]='first name cannt be less then <strong>10</strong> characters';
 }
 if(strlen($last_name)<10){
  $errors[]='last name cannt be less then <strong>10</strong> characters';
 }
 if($pass1 !=$pass2){
     echo '<div class="alert alert-danger">passowrd not match</div>';
 }
 else{
     //send the data to database
     $sql="INSERT into user (ID,firstName,lastname,email,mobile,username,password,gender,major_id,section_id) values('{$id}','{$first_name}','{$last_name}','{$email}','{$phone}','{$username}','{$shapass}','{$gender}','{$majors}','{$sections}')";
     //prepare the sql
     $stmt=$con->prepare($sql);
     //make data
    //  $data=[':ID'=>$id,':firstname'=>$first_name,':lastname'=>$last_name,':email'=>$email,':mobile'=>$phone,':username'=>$username,':password'=>$shapass,':gender'=>$gender,':major'=>$majors];
     //execute the query
     $stmt->execute();

     //check the stmat execute
     if($stmt){
		echo '<div class="alert alert-success container">Your account created successfully</div>';
		header("refresh:3");

     }

 }
   

 }

?>

<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Register Student</h3>
  </div>
  <div class="panel-body">
	<form method="post" action="?do=create">
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
						 value="<?php if(isset($id)){echo $id;}?>">
	</div> <!-- form-group end.// -->
	<!-- username -->
	<div class="form-group">
		<label>username</label>
	    <input
            class="form-control"
             type="text"
             name="username"
						 required
						 value="<?php if(isset($username)){echo $username;}?>"
>
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
							 value="<?php if(isset($first_name)){echo $first_name;}?>">
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
								value="<?php if(isset($last_name)){echo $last_name;}?>"
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
					 value="<?php if(isset($email)){echo $email;}?>"
>
		<small class="text-info text-muted">We'll never share your email with anyone else.</small>
	</div>
	<!-- password -->
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>password</label>
		  <input type="password" 
			       class="form-control" 
						 placeholder="enter your password" 
						 required
						 name="pass1">
		</div> <!-- form-group end.// -->
		<div class="form-group col-md-6">
		<label>confirm password</label>
		  <input type="password" 
			       class="form-control" 
						 name="pass2"
						 required
				placeholder="confirm password" 
>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->
	
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
					 value="<?php if(isset($phone)){echo $phone;}?>"
>
	</div>
	  <!--major-  -->
	<div class="form-group">
	<label>Major</label>
		  <select class="form-control" name="choose">
		    <option> Choose...</option>
            <?php foreach($major as $m):?>
            <option value="<?php echo $m['major_id'] ?>"><?php echo $m['major_name'] ?></option>
            <?php endforeach;?>
		     
		  </select>
	</div> <!-- form-group end.// --> 
		  <!--section-  -->
			<div class="form-group">
	<label>Section</label>
		  <select class="form-control" name="section">
		    <option> Choose...</option>
            <?php foreach($section as $m):?>
            <option value="<?php echo $m['section_id'] ?>"><?php echo $m['section_name'] ?></option>
            <?php endforeach;?>
		     
		  </select>
	</div>
	 <!-- regester  -->
    <div class="form-group">
        <button type="submit"  name="singup" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the ' Register' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>

  </div>
</div>

</div>

<?php

  }
 elseif($do=='edit')
 {
	$userid=isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0;
	$sql="SELECT user.*,major.major_name from user
	JOIN major on major.major_id=user.major_id where user.ID='{$userid}' ";
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
	<form method="post" action="?do=edit&id=<?php echo $userid ?>">
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
		 <button type="submit"  name="update" class="btn btn-primary btn-block">Update</button>
	 </div> <!-- form-group// -->      
 </form>
 
 </div>
 </div>
 </div>
	 </div>
 
	 <?php
 }
 elseif($do=='delete')
 {
	 $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
	 $stmt=$con->prepare("select * from user where ID=?");
  $stmt->execute(array($id));
  $row=$stmt->fetchall();
  $count=$stmt->rowcount();

  if($count >0){

       //delete the users
    $stmt=$con->prepare("delete from user where ID=?");
	$stmt->execute(array($id));
	if($stmt){
		echo "<div class='alert alert-danger'>users delete sucessfully</div>";
		
	}
   
 }
}
 elseif($do=='active')
 {
	$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
	//make the sql to actve the user
 $sql="UPDATE user set status=1 where ID='{$id}'";
 //rpare thesql
 $stmt=$con->prepare($sql);
 $stmt->execute();
 if($stmt){
	echo "<script>alert('user actived successfully')</script>";
 }
   
 }
 else {
    echo 'this page not found';
 }

  
?>