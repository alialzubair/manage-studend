<?php
//include the header page 
include 'include/header.php';
include 'init.php';
include 'actions.php';




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
 {    //get all hulls
      $hulls=getall('hulls');

      ?>
       <!-- output data -->
       <div class="container">
        <h1 class="text-info text-center">Manage Hulls</h1>
        <a href="hulls.php?do=create" class="btn btn-primary">Add New Hulls </a>
        <hr>
        <!-- make table to show all hulls -->
         <div class="table-responsive">
           <table class="table table-hover table-striped">
               <tr>
                   <td>Id_Hulls</td>
                   <td>Hull Name</td>
                   <td>Hull cordinator</td>
                   <td>Hull capacity</td>
                   <td>Hull status</td>
                   <td>Hull Section</td>
                   <td>date add</td>
                   <td>Action</td>
               </tr>
               <?php foreach($hulls as $h): ?>
               <tr>
                 <td><?php echo $h['Hulls_id']?></td>
                 <td><?php echo $h['Hulls_name']?></td>
                 <td><?php echo $h['Hulls_cordinator']?></td>
                 <td><?php echo $h['Hulls_capacity']?></td>
                 <td><?php echo $h['Hulls_status']?></td>
                 <td><?php echo $h['section']?></td>
                 <td><?php echo $h['Hulls_time']?></td>
                 <td>
                   <a href="?do=edit&id=<?php echo $h['Hulls_id'] ?>" class="btn btn-success">Edit</a>
                   <a href="?do=delete&id=<?php echo $h['Hulls_id'] ?>" class="btn btn-danger confirm">Delete</a>
                  
                 </td>
               </tr>
 <?php endforeach;?>
    

      <?php
      
 }
 elseif($do=='create')
 {
     $msg='';
     if(isset($_POST['add'])){
         //set the var
         $hull_name=$_POST['name'];
         $hull_cordinator=$_POST['cordinator'];
         $hull_capacity=$_POST['capacity'];
         $hull_Status=$_POST['status'];
         $hull_section=$_POST['section'];

         //insert data into database
         $sql="INSERT into hulls (Hulls_name,Hulls_cordinator,Hulls_capacity,Hulls_status,section) values('{$hull_name}','{$hull_cordinator}','{$hull_capacity}','{$hull_Status}','{$hull_section}')";
         //prepare the sql
         $stmt=$con->prepare($sql);
         
         //execute the query
         $stmt->execute();
         //check the stmt
         if($stmt){
             $msg= '<div class="alert alert-info">hulls add successfully';
             header("refresh:4");
         }
      
     }
  ?>
   <div class="container">
    <h1 class="text-center">Add New Hulls</h1>
    <div><?php echo $msg; ?></div>
    <form action="?do=create" class="form-horizontal" method="post">
      
        <!--start hull name-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Hull Name</label>
            <div class="col-sm-10 col-md-6">
            <input type="text"
    name="name"
    class="form-control"
    autocomplete="off" 
    required
    placeholder="input your name here" 
            />
            </div>
        </div>
        <!--end hullname-->
        <!--start cordinator -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">cordinator</label>
            <div class="col-sm-10 col-md-6">
            <input type="text"
    name="cordinator"
    class="form-control"
    autocomplete="off"
    required 
    placeholder="input your name  cordinator here" 
            />
            </div>
        </div>
        <!--end cordinator-->
        <!--start capacity-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Hull capacity</label>
            <div class="col-sm-10 col-md-6">
            <input type="number"
    name="capacity"
    class="form-control"
    autocomplete="off" 
    required
    placeholder="input your hulls capacity here" 
            />
            </div>
        </div>
        <!--end capacity-->
        
        <!--start status-->
        <!--start status-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Hull Status</label>
            <div class="col-sm-10 col-md-6">
               <select name="status"  class="form-control">
                  <option value="avaliable">avaliable</option>
                  <option value="busy">Busy</option>
               </select>
            </div>
        </div>
        <!--end status-->
        
        <!--start ssetion-->
        <div class="form-group">
            <label class="col-sm-2 control-label">Hull Section</label>
            <div class="col-sm-10 col-md-6">
               <select name="section"  class="form-control">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
               </select>
            </div>
        </div>
        <!--end section-->
         <!--start btn-->
         <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit"
                   name="add"
                   value="Add New Hulls" 
                   class="btn btn-primary bt-lg"/>
                          </div>
                        </div>
                        <!--end btn-->
        
    </form>
   </div>


  <?php


 }
 elseif($do=='edit')
 {
      $msg='';
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
    $sql="SELECT * from hulls where Hulls_id='{$id}'";
    //prepare the sql
    $stmt=$con->prepare($sql);
    //execute the sql
    $stmt->execute();
    //fetch data
    $row=$stmt->fetch();
    $count=$stmt->rowcount();
    //edit data
    if(isset($_POST['edit'])){

        //set the var
        $id=$_POST['id'];
        $hull_name=$_POST['name'];
        $hull_cordinator=$_POST['cordinator'];
        $hull_capacity=$_POST['capacity'];
        $hull_Status=$_POST['status'];
        $hull_section=$_POST['section'];

        //edit data
        $sql="UPDATE  hulls set Hulls_name=?,Hulls_cordinator=?,Hulls_capacity=?,Hulls_status=?,section=? where  Hulls_id=?";
        //prepare the query
       $stmt=$con->prepare($sql);
        //execute the query
        $data=[$hull_name,$hull_cordinator,$hull_capacity,$hull_Status,$hull_section,$id];
  $stmt->execute($data);
   if($stmt){
       $msg="<div class='alert alert-info'>hulls edit successfully</div>";
       header("refresh:3");
   }
    }
   
    if($count>0){?>
<div class="container">
    <h1 class="text-center">Edit Hulls</h1>
    <div><?php echo $msg; ?></div>
    <form action="hulls.php?do=edit&id=<?php echo $row['Hulls_id'] ?>" class="form-horizontal" method="post">
    <input type="hidden" value="<?php echo $row['Hulls_id'] ?>" name="id">

        <!--start hull name-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Hull Name</label>
            <div class="col-sm-10 col-md-6">
            <input type="text"
    name="name"
    class="form-control"
    autocomplete="off" 
    value="<?php echo $row['Hulls_name'] ?>"
    required
    placeholder="input your name here" 
            />
            </div>
        </div>
        <!--end hullname-->
        <!--start cordinator -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">cordinator</label>
            <div class="col-sm-10 col-md-6">
            <input type="text"
    name="cordinator"
    class="form-control"
    autocomplete="off"
    value="<?php echo $row['Hulls_cordinator'] ?>"
    required 
    placeholder="input your name  cordinator here" 
            />
            </div>
        </div>
        <!--end cordinator-->
        <!--start capacity-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Hull capacity</label>
            <div class="col-sm-10 col-md-6">
            <input type="number"
    name="capacity"
    class="form-control"
    autocomplete="off"
    value="<?php echo $row['Hulls_capacity'] ?>"

    required
    placeholder="input your hulls capacity here" 
            />
            </div>
        </div>
        <!--end capacity-->
        
        <!--start status-->
        <!--start status-->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Hull Status</label>
            <div class="col-sm-10 col-md-6">
               <select name="status"  class="form-control">
               <option value="<?php echo $row['Hulls_status'] ?>"><?php echo $row['Hulls_status'] ?></option>
                  <option value="avaliable">avaliable</option>
                  <option value="busy">Busy</option>
               </select>
            </div>
        </div>
        <!--end status-->
        
        <!--start ssetion-->
        <div class="form-group">
            <label class="col-sm-2 control-label">Hull Section</label>
            <div class="col-sm-10 col-md-6">
               <select name="section"  class="form-control">
               <option value="<?php echo $row['section'] ?>"><?php echo $row['section'] ?></option>

                  <option value="male">Male</option>
                  <option value="female">Female</option>
               </select>
            </div>
        </div>
        <!--end section-->
         <!--start btn-->
         <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit"
                   name="edit"
                   value="Edit Hull" 
                   class="btn btn-primary bt-lg"/>
                          </div>
                        </div>
                        <!--end btn-->
        
    </form>
   </div>


   <?php
   

}

 }
 elseif($do=='delete')
 {
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
   //delete the data
   $sql="DELETE from hulls where Hulls_id={$id} ";
   //prepare the sql
   $stmt=$con->prepare($sql);
   //execute the query
   $stmt->execute();
   //check the stmt execute
   if($stmt){
       header("location:?do=manage");
   }


 }

 else {
    echo 'this page not found';
 }

  
?>