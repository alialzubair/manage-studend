<?php
session_start();

include 'init.php';
	
	//mak the login 
 
	if(isset($_POST['login'])){
		$user=$_POST['username'];
	 $pass=$_POST['password'];
	

		if(empty($user)|| empty($pass)){
			 echo "<script>alert('both fieds requried')</script>";
		}
		else{
		 //check if users exist in databasee
	$stmt=$con->prepare("SELECT *                       
                                from
                                user
                                where
                                username=?
                                and
                                password=?");
$stmt->execute(array($user,$pass));
$rows=$stmt->fetch();
$count=$stmt->rowcount();

//ckeck the count >0
if($count>0){
	//regster the session
	$_SESSION['student']=$user; //register session name
			$_SESSION['id']=$rows['ID']; // register session id
	header("location:index.php");
            
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
  <div class="panel-heading"> <strong><i class="glyphicon glyphicon-user"></i> login form</strong>  </div>
    <form action="login.php" method="post">
		
		<div class="panel-body">
       <div class="input-group input-group-lg">
	  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
	  <input type="text" class="form-control"
		 placeholder="Username" 
		 name="username" required
		 aria-describedby="sizing-addon1">
	</div>	<br>
	   <div class="input-group input-group-lg">
	  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
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

