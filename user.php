<?php
//include the header page 
include 'include/header.php';
include 'config/connect.php';
include "include/header1.php";
$firstName='';

/**
 * we make all the page of members 
 * like {add major , manage add major, editadd major,delete members,active members}
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
     //get all major form database
      $sql="SELECT * from user";
      //prepare the sql
      $stmt=$con->prepare($sql);
      //execute the query
      $stmt->execute();
      //fetch all data
      $row=$stmt->fetchall();
    ?>
     <!-- show all major and manage its -->
   
     <div class="container">
        <h1 class="text-info text-center">Manage Users Page</h1>
        <a href="user.php?do=create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New User </a>
        <hr>
            
    
<script>
	$(document).ready(function(){
		
		readProducts(); /* it will load products when document loads */
		
		$(document).on('click', '#delete_user', function(e){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			e.preventDefault();
		});
		
	});
	
	function SwalDelete(productId){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: 'user-delete.php',
			    	type: 'POST',
			       	data: 'delete='+productId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					readProducts();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
    }
        function readProducts(){
		$('#load-products').load('delete_user');	
	}
	
	
	
</script>
    
        <!-- make table to show all major -->
         <div class="table-responsive">
           <table class="table table-hover table-striped">
               <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>ID</th>
                <th>mobile</th>
                <th>email</th>
                <th>username</th>
                <th>gender</th>
                <th>major</th>
                <th>status</th>
                <th>Action</th>
                   
               </tr>
                     <!-- loop throw the $row var and output the data -->
                     <?php foreach($row as $r): ?>
                     <tr>
                   <td><?php echo $r['firstName']?></td>
                   <td><?php echo $r['lastName']?></td>
                    <td><?php echo $r['ID']?></td>
                    <td><?php echo $r['mobile']?></td>
                    <td><?php echo $r['email']?></td>
                    <td><?php echo $r['username']?></td>
                    <td><?php echo $r['gender']?></td>
                    <td><?php echo $r['major']?></td>
                    <td><?php echo $r['status']?></td>
                   <td>
                       <a href="?do=edit&id=<?php echo $r['ID']?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i>edit</a>
                 <a class="btn btn-sm btn-danger" id="delete_user" data-id="<?php echo $r['ID'] ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                    <a href="?do=show&id=<?php echo $r['ID']?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                   </td>
                   </tr>
                 <?php endforeach;?>
           </table>
         </div>
     </div>


    <?php
 }
 elseif($do=='create')
 {
    //here add new major
    ?>
      <h1 class="text-center">Add New User</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="user.php?do=create" method="post">
          <input type="text"name="firstName"  class="form-control" placeholder="FirstName" style="margin-bottom:20px;">
          <input type="text"name="lastName"  class="form-control" placeholder="LastName" style="margin-bottom:20px;">
          <input type="number"name="ID"  class="form-control" placeholder="ID" style="margin-bottom:20px;">
          <input type="number"name="mobile"  class="form-control" placeholder="Mobile" style="margin-bottom:20px;">
          <input type="email"name="email"  class="form-control" placeholder="Email" style="margin-bottom:20px;">
         <input type="text"name="username"  class="form-control" placeholder="username" style="margin-bottom:20px;">

           <select name="gender"  class="form-control">
                 <option value="0">Select gender</option>
                <option value="0">Female</option>
               <option value="0">Male</option>
              </select>
              <br>
              
           <select name="major"  class="form-control">
                 <option value="0">Select major</option>
                <option value="0">IT</option>
               <option value="0">Bussiness</option>
               <option value="0">English</option>
              </select>
              <br>
              
           <select name="status"  class="form-control">
                 <option value="0">Select status</option>
                <option value="0">yes</option>
               <option value="0">no</option>
              </select>
              <br>
              <!-- button to add -->
        <center><input type="submit" 
                name='add'
                value="Add New User" 
                class="btn btn-success"></center> 
          </form>
       </div>
       <br>
      
          
    <?php
    if(isset($_POST['add']))
       {
                    //set the var
            $firstName=$_POST['firstName'];
         $lastName=$_POST['lastName'];
         $ID=$_POST['ID'];
         $mobile=$_POST['mobile'];
         $email=$_POST['email'];
          $username=$_POST['username'];
         $gender=$_POST['gender'];
          $major=$_POST['major'];
         $status=$_POST['status'];
           //check the filed not empty
           if(!empty($firstName || $lastName || $ID || $mobile || $email || $username || $gender || $major  || $status)){
               //send data to database
              $sql="INSERT into user (firstName,lastName,ID,mobile,email,username,gender,major,status) values('{$firstName}','{$lastName}','{$ID}','{$mobile}','{$email}','{$username}','{$gender}','{$major}','{$status}')";
              //prepare the query
              $stmt=$con->prepare($sql);
              //execute the query
         
      //excute the query
       $stmt->execute();


               if($stmt){
                   echo '<div class="alert alert-success"><center>Major Added Successfully</center></div>';
                  // header("refresh:4");
               }
               else{
                   echo 'errors';
               }
             
                
           }
           else{
            echo '<div class="alert alert-danger"><center>Can Not be Empty</center></div>';
            //header("refresh:3");
           }

 }
}
 elseif($do=='edit')
 {
   //check the get request
   $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
   //create the query to get data with id=$id
 $sql="SELECT * from user where ID={$id}";
   //prepare the query
   $stmt=$con->prepare($sql);
   //execute the sql
   $stmt->execute();

   //fetch siangle data
   $row=$stmt->fetch();
   //get the count of data
   $count=$stmt->rowcount();

   //check the count >0
   if($count >0)
   {?>
 <!--show form to edit major  -->
 <h1 class="text-center">Edit User Information</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="?do=edit" method="post">
          <input type="hidden" value="<?php echo $row['ID'] ?>" name="id">
    <input type="text" name="firstName" value="<?php echo $row['firstName'] ?>"class="form-control"  style="margin-bottom:20px;">
      <input type="text" name="lastName" value="<?php echo $row['lastName'] ?>"class="form-control"  style="margin-bottom:20px;">
    <input type="text" name="ID" value="<?php echo $row['ID'] ?>"class="form-control"  style="margin-bottom:20px;">
    <input type="text" name="mobile" value="<?php echo $row['mobile'] ?>"class="form-control"  style="margin-bottom:20px;">
       <input type="text" name="email" value="<?php echo $row['email'] ?>"class="form-control"  style="margin-bottom:20px;">
         <input type="text" name="username" value="<?php echo $row['username'] ?>"class="form-control"  style="margin-bottom:20px;">  
                    
                 <option ><?php echo $row['gender'] ?></option>
              <select name="chose_major"  class="form-control">
                 <option ><?php echo $row['gender'] ?></option>
                <option value="0">Female</option>
               <option value="0">Male</option>
              </select>
              <br>
                  <select name="major"  class="form-control">
                 <option ><?php echo $row['major'] ?></option>
                <option value="0">IT</option>
               <option value="0">Bussiness</option>
              <option value="0">English</option>
              </select>
              <br>
           
              <!-- button to add -->
       <center> <input type="submit" 
                name='edit'
                value="Edit user info" 
                class="btn btn-primary">  
           </center>
          </form>
       </div>
       <br>

 <?php  }

  //make the action to edit
  if(isset($_POST['edit']))
  {
             //set the var
        $firstName=$_POST['firstName'];
         $lastName=$_POST['lastName'];
         $ID=$_POST['ID'];
         $mobile=$_POST['mobile'];
         $email=$_POST['email'];
          $username=$_POST['username'];
         $gender=$_POST['gender'];
          $major=$_POST['major'];
         $status=$_POST['status'];
             //check the filed not empty
      if(!empty($firstName || $lastName || $ID || $mobile || $email || $username || $gender || $major  || $status)){
                 //send data to database
         $sql="UPDATE  user set firstName=?,
                                 lastName=?,
                                 ID=?,
                                 mobile=?,
                                 email=?,
                                 username=?,
                                 gender=?,
                                 major=?,
                                 status=? where    ID=?";
                //prepare the query
               $stmt=$con->prepare($sql);
                //execute the query
                $data=[$firstName,$lastName,$ID,$mobile,$email,$username,$gender,$major,$status,$ID];
          $stmt->execute($data);
  
           if($stmt){
                 echo '<string class="alert alert-success">major update successfully</string>';
               //  header("refresh:4;");
             //  header("location:?do=manage");
                 }
                 else{
                     echo 'errors';
                 }
                  
             }
             else{
                echo '<string class="alert alert-danger center">major name cannt be mpty</string>';
               // header("refresh:3");
               }
  }
 
 }

  
?>