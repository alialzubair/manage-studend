<?php
include 'init.php';
$major=getall('major');
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
	<form method="post" action="regster_emp.php">
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
