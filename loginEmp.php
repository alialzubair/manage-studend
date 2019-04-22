<?php
ob_start();
session_start();
include 'init.php';
	
	//mak the login 
 
	if(isset($_POST['login'])){
		$user=$_POST['username'];
	 $pass=sha1($_POST['password']);
	

		if(empty($user)|| empty($pass)){
			 echo "<script>alert('both fieds requried')</script>";
		}
		else{
		 //check if users exist in databasee
	$stmt=$con->prepare("SELECT *                       
                                from
                                employee_table
                                where
                                username=?
                                and
                                employee_table_pass=?");
$stmt->execute(array($user,$pass));
$rows=$stmt->fetch();
$count=$stmt->rowcount();

//ckeck the count >0
if($count>0){
	//regster the session
	$_SESSION['user']=$user; //register session name
                 $_SESSION['id']=$rows['employee_table_id']; // register session id
            header("location:profile.php");
            
	exit();
}else{
	echo "<script>alert('username or password wrong')</script>";
}


		}
	}
?>
<div class="container">
	
	 <div class="row">
<div class="col-md-12">
 <div class="panel panel-primary">
  <div class="panel-heading"> <strong><i class="fa fa-user"></i> login form</strong>  </div>
    <form action="loginEmp.php" method="post">
		
		<div class="panel-body">
       <div class="input-group input-group-lg">
	  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
	  <input type="text" class="form-control"
		 placeholder="Username" 
		 name="username" required
		 aria-describedby="sizing-addon1">
	</div>	<br>
	   <div class="input-group input-group-lg">
	  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-eye"></i></span>
	  <input type="password" 
		       class="form-control"
					 name="password" required
					  placeholder="password" 
						aria-describedby="sizing-addon1">
	</div>	
	<br>

	<input type="submit" 
	       name="login" class="btn btn-primary btn-block" 
	       value="login">
		</form>
  </div>
</div>	 
  </div>
</div>
</div>
<?php


?>

<?php include 'include/footer.php' ?>

