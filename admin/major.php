<?php
//include the header page 
include 'include/header.php';
include 'init.php';


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
      $sql="SELECT * from major";
      //prepare the sql
      $stmt=$con->prepare($sql);
      //execute the query
      $stmt->execute();
      //fetch all data
      $row=$stmt->fetchall();
    ?>
     <!-- show all major and manage its -->
   
     <div class="container">
        <h1 class="text-info text-center">Manage Major</h1>
        <a href="major.php?do=create" class="btn btn-primary">Add New Major </a>
        <hr>
        <!-- make table to show all major -->
         <div class="table-responsive">
           <table class="table table-hover table-striped">
               <tr>
                   <td>id_major</td>
                   <td>Nmae Major</td>
                   <td>Action</td>
                   
               </tr>
                     <!-- loop throw the $row var and output the data -->
                     <?php foreach($row as $r): ?>
                     <tr>
                   <td><?php echo $r['major_id']?></td>
                   <td><?php echo $r['major_name']?></td>
                   <td>
                     <a href="?do=edit&id=<?php echo $r['major_id']?>" class="btn btn-success">Edit</a>
                     <a href="?do=delete&id=<?php echo $r['major_id']?>" class="btn btn-danger confirm">Delete</a>
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
      <h1 class="text-center">Add New Major</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="major.php?do=create" method="post">
          <input type="text" 
              name="major_name"  class="form-control">
              <br>
              <!-- description -->
              <textarea name="desc"  class="form-control" cols="10" rows="5" ></textarea>
              <br>
              <!-- button to add -->
        <input type="submit" 
                name='add'
                value="Add New Major" 
                class="btn btn-primary">  
          </form>
       </div>
       <br>
    
          
    <?php
    if(isset($_POST['add']))
       {
                    //set the var
            $major_name=filter_var($_POST['major_name'],FILTER_SANITIZE_STRING);
            $major_desc=filter_var($_POST['desc'],FILTER_SANITIZE_STRING);
           //check the filed not empty
           if(!empty($major_name)){
               //send data to database
              $sql="INSERT into major (major_name,description) values(:major_name,:description)";
              //prepare the query
              $stmt=$con->prepare($sql);
              //execute the query
              $stmt->execute([':major_name'=>$major_name,'description'=>$major_desc]);

               if($stmt){
                   echo '<string class="alert alert-success">major added successfully</string>';
                   header("refresh:4");
               }
               else{
                   echo 'errors';
               }
                
           }
           else{
            echo '<string class="alert alert-danger center">major name cannt be mpty</string>';
            header("refresh:3");
           }

 }
}
 elseif($do=='edit')
 {
   //check the get request
   $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
   //create the query to get data with id=$id
 $sql="SELECT * from major where major_id={$id}";
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
 <h1 class="text-center">Add New Major</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="?do=edit" method="post">
          <input type="hidden" value="<?php echo $row['major_id'] ?>" name="id">
          <input type="text" 
              name="major_name" 
              value="<?php echo $row['major_name'] ?>"
               class="form-control">
              <br>
              <!-- button to add -->
        <input type="submit" 
                name='edit'
                value="Edit Major" 
                class="btn btn-primary">  
          </form>
       </div>
       <br>

 <?php  }

  //make the action to edit
  if(isset($_POST['edit']))
  {
             //set the var
     $id=$_POST['id'];        
     $major_name=filter_var($_POST['major_name'],FILTER_SANITIZE_STRING);
             //check the filed not empty
      if(!empty($major_name)){
                 //send data to database
         $sql="UPDATE  major set major_name=? where    major_id=?";
                //prepare the query
               $stmt=$con->prepare($sql);
                //execute the query
                $data=[$major_name,$id];
          $stmt->execute($data);
  
           if($stmt){
                 echo '<string class="alert alert-success">major update successfully</string>';
                 header("refresh:4;");
               header("location:?do=manage");
                 }
                 else{
                     echo 'errors';
                 }
                  
             }
             else{
                echo '<string class="alert alert-danger center">major name cannt be mpty</string>';
                header("refresh:3");
               }
  }
 
 }

 elseif($do=='delete')
 {
   //check the get request
   $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
   //delete the data
   $sql="DELETE from major where major_id={$id} ";
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