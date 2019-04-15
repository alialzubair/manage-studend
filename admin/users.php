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
 {?>
    
 <div class="container">
	<!-- grid the page -->
	<div class="row">
<div class="col-md-12">
<!-- set the form inside panel -->
<div class="panel panel-primary">
 <div class="panel-heading"> <strong><i class="glyphicon glyphicon-user"></i> sing up</strong>  </div>
	 <form action="register.php" method="post" enctype="multipart/form-data">
	 
	 <div class="panel-body">
	 <!-- strat user name -->
			<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
	 <input type="text" class="form-control"
		placeholder="write Username" 
		name="username" required
		aria-describedby="sizing-addon1">
 </div>	<br>
	 <!-- strat  fullname -->
			<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
	 <input type="text" class="form-control"
		placeholder="write fullname" 
		name="fullname" required
		aria-describedby="sizing-addon1">
 </div>	<br>
 <!-- strat password -->
		<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
	 <input type="password" 
					class="form-control"
					name="password1" required
					 placeholder="write password" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- check password -->
		<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
	 <input type="password" 
					class="form-control"
					name="password2" required
					 placeholder="confirm password" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- start email -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
	 <input type="email" 
					class="form-control"
					name="email" required
					 placeholder="write your email" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>

 <!-- start phone -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-phone-alt"></i></span>
	 <input type="text" 
					class="form-control"
					name="phone" required
					 placeholder="write your phone" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>

 <!-- start chose servers -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-shopping-cart
"></i></span>
<select name="chose" class="form-control">
         <option value="0">chose servese</option>
          <?php     
          
          $all=getall('major');
          foreach($all as $a){
              ?>
               <option value="<?php echo $a['id'] ?>"><?php echo $a['major_name'] ?></option>
              <?php
          }
          ?>
       
     
        
        </select>
 </div>	
 <br>


 <!-- start Gender -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
	 <select name="Gender" class="form-control">
	  <option value="female">female</option>
	  <option value="male">male</option>
	   
	 </select>
 </div>	
 <br>
 



 <input type="submit" 
				name="sing" class="btn btn-primary btn-block" 
				value="sing up">
	 </form>
 </div>
</div>	 
 </div>
</div>
</div>
 <?php }
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