<?php
ob_start();
 include 'include/header.php';
 include 'init.php';
 include 'actions.php';

 $do='';

 if(isset($_GET['do'])){
     $do=$_GET['do'];
 }
 else{
     $do='manage';
 }
 if($do=='manage'){
   $sql="SELECT time_table.*,hulls.Hulls_name from time_table
   join hulls on time_table.hull_id=hulls.Hulls_id";
   $stmt=$con->prepare($sql);
   $stmt->execute();
   $time_hulls=$stmt->fetchall();
   ?>
     <!-- output data -->
     <div class="container">
        <h1 class="text-info text-center">Manage Hulls</h1>
        <a href="manage_hulls.php?do=create" class="btn btn-primary">Add New Hulls </a>
        <hr>
        <!-- make table to show all hulls -->
         <div class="table-responsive">
           <table class="table table-hover table-striped">
           <tr>
               <td>time Id</td>
               <td>Time Start</td>
               <td>Time End</td>
               <td>Hull Name</td>
               <td>Create At</td>
               <td>Control</td>
           </tr>
           <?php foreach($time_hulls as $t): ?>
            <tr>
              <td><?php echo $t['time_table_id'] ?></td>
              <td><?php echo $t['time_table_start_time'] ?></td>
              <td><?php echo $t['time_table_end_time'] ?></td>
              <td><?php echo $t['Hulls_name'] ?></td>
              <td><?php echo $t['create_at'] ?></td>
              <td>
               <a href="?do=edit&id=<?php echo $t['time_table_id'] ?>" class="btn btn-success">Edit</a>
               <a href="?do=delete&id=<?php echo $t['time_table_id'] ?>" class="btn btn-danger confirm">Delete</a>
              </td>
            </tr>
 <?php endforeach;?>
           </table>
           </div>
           </div>

   <?php
 }
 elseif($do=='create'){
     $msg='';
     $hull=getall('hulls');
     if(isset($_POST['add'])){
         //set var
         $time_start=$_POST['time_start'];
         $time_end=$_POST['time_end'];
         $chose_hull=$_POST['hull'];
         //insert into time tabel
         $sql="INSERT into time_table (time_table_start_time,time_table_end_time,hull_id) values('{$time_start}','{$time_end}','{$chose_hull}')";
         //prepare the sql
         $stmt=$con->prepare($sql);
         //execute the sql
         $stmt->execute();
         //check the stmt
         if($stmt){
             $msg="<div class='alert alert-info'>hulls added successfully</div>";
             header("refresh:4");
         }
     }
     ?>
      <div class="container">
      <h1 class="text-center">Add</h1>
      <div><?php echo $msg?></div>
      <form action="?do=create" class="form-horizontal" method="post">

      <!--start time-->
      <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Time Start</label>
            <div class="col-sm-10 col-md-6">
            <input type="time"
    name="time_start"
    class="form-control"
    autocomplete="off" 
    required
   
            />
            </div>
        </div>
        <!--end time-->
      <!--end time-->
      <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Time End</label>
            <div class="col-sm-10 col-md-6">
            <input type="time"
    name="time_end"
    class="form-control"
    autocomplete="off" 
    required
   
            />
            </div>
        </div>
        <!--end time-->
      <!--chose hulls-->
      <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">chose hull</label>
            <div class="col-sm-10 col-md-6">
              <select name="hull"  class="form-control">
              <?php foreach($hull as $h): ?>
              <option value="<?php echo $h['Hulls_id'] ?>"><?php echo $h['Hulls_name'] ?></option>
 <?php endforeach;?>
              </select>
            </div>
        </div>
        <!--end shose hulls-->
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
 elseif($do=='edit'){
     $msg='';
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
    
    $sql="SELECT time_table.*,hulls.Hulls_name from time_table
    join hulls on time_table.hull_id=hulls.Hulls_id
    where time_table.time_table_id='{$id}' ";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetch();
    $count=$stmt->rowcount();
    
if(isset($_POST['edit'])){
    //set var
    
    $id=$_POST['id'];
    $time_start=$_POST['time_start'];
    $time_end=$_POST['time_end'];
    $chose_hull=$_POST['hull'];
    //update the data
    $sql="UPDATE  time_table set time_table_start_time=?,time_table_end_time=?,hull_id=? where  time_table_id=?";
    //prepare the query
   $stmt=$con->prepare($sql);
   //data
   $data=[$time_start,$time_end,$chose_hull,$id];
   //execute 
   $stmt->execute($data);
   if($stmt){
       $msg="<div class='alert alert-success'>hulls update successfully</div>";
       header("refresh:4");
   }
}

    if($count>0){?>
 <div class="container">
      <h1 class="text-center">Edit</h1>
      <div><?php echo $msg?></div>
      <form action="?do=edit&id=<?php echo $row['time_table_id'] ?>" class="form-horizontal" method="post">
        <!-- hidden id -->
        <input type="hidden" value="<?php echo $row['time_table_id'] ?>" name="id">
      <!--start time-->
      <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Time Start</label>
            <div class="col-sm-10 col-md-6">
            <input type="time"
    name="time_start"
    class="form-control"
    autocomplete="off" 
    value="<?php echo $row['time_table_start_time'] ?>"
    required
   
            />
            </div>
        </div>
        <!--end time-->
      <!--end time-->
      <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Time End</label>
            <div class="col-sm-10 col-md-6">
            <input type="time"
    name="time_end"
    class="form-control"
    autocomplete="off" 
    value="<?php echo $row['time_table_end_time'] ?>"

    required
   
            />
            </div>
        </div>
        <!--end time-->
      <!--chose hulls-->
      <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">chose hull</label>
            <div class="col-sm-10 col-md-6">
              <select name="hull"  class="form-control">
              <option value="<?php echo $row['hull_id'] ?>"><?php echo $row['Hulls_name'] ?></option>
              <?php $hull=getall('hulls') ?>
              <?php foreach($hull as $h): ?>
              <option value="<?php echo $h['Hulls_id'] ?>"><?php echo $h['Hulls_name'] ?></option>
 <?php endforeach;?>
              </select>
            </div>
        </div>
        <!--end shose hulls-->
         <!--start btn-->
         <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit"
                   name="edit"
                   value="edit  Hulls" 
                   class="btn btn-primary bt-lg"/>
                          </div>
                        </div>
                        <!--end btn-->
      </form>
      </div>

    <?php }
 }
 elseif($do=='delete'){
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
    //delete the data
    $sql="DELETE from time_table where time_table_id={$id} ";
    //prepare the sql
    $stmt=$con->prepare($sql);
    //execute the query
    $stmt->execute();
    //check the stmt execute
    if($stmt){
        header("location:?do=manage");
    }
 }
 else{
     echo 'page not fount';
 }

?>