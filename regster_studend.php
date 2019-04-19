<?php
//include allaction
 include 'init.php';
 //use function getall to get all data from database
 $major=getall('major');
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
     $sql="INSERT into user (ID,firstName,lastname,email,mobile,username,password,gender,major) values('{$id}','{$first_name}','{$last_name}','{$email}','{$phone}','{$username}','{$shapass}','{$gender}','{$majors}')";
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Register Student</h3>
  </div>
  <div class="panel-body">
	<form method="post" action="regster_studend.php">
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
						 value="<?php if(isset($id)){echo $id;}?>"
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
	 <!-- regester  -->
    <div class="form-group">
        <button type="submit"  name="singup" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the ' Register' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>

  </div>
</div>

</div>


