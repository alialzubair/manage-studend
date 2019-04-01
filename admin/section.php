<?php
//include the header page 
include 'include/header.php';
include 'init.php';
include 'actions.php';




/**
 * we make all the page of section
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
    //get  all section form function
    $allSection=AllSection(); 
  
    ?>
     <!-- show all major and manage its -->
     <div class="container">
        <h1 class="text-info text-center">Manage Major</h1>

        <!-- make table to show all major -->
      <div class="table-responsive">
       <table class="table table-hover table-striped">
        <tr>
          <td>id_section</td>
          <td>section name</td>
          <td>Major Name</td>
          <td>Action</td>       
         </tr>
   <!-- loop throw the $row var and output the data -->
    <?php foreach($allSection as $se):?>
     <tr>
       <td><?php echo $se['section_id'] ?></td>
       <td><?php echo $se['section_name'] ?></td>
       <td><?php echo $se['major_name'] ?></td>
       <td>
         <a href="?do=edit&id=<?php echo $se['section_id'] ?>" class="btn btn-success">Edit</a>
         <a href="?do=delete&id=<?php echo $se['section_id'] ?>" class="btn btn-danger">Delete</a>
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
      <h1 class="text-center">Add New Section</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="section.php?do=create" method="post">
          <input type="text" 
              name="section_name"  class="form-control">
              <br>
              <select name="chose_major"  class="form-control">
                 <option value="0">Select Major</option>
                 <?php
                    $all=getall('major');
                    foreach($all as $a){?>
                     <option value="<?php echo $a['major_id'] ?>"><?php echo $a['major_name'] ?></option>
                   <?php }
                 ?>
              </select>
              <br>
              <!-- button to add -->
        <input type="submit" 
                name='add'
                value="Add New Section" 
                class="btn btn-primary">  
          </form>
       </div>
       <br>
      
          
    <?php
if(isset($_POST['add'])){
   //set the var
   $section_name=$_POST['section_name'];
   $chose_major=$_POST['chose_major'];
   //validae the field
   if(!empty($section_name))
   {
      //set data into database
     
      //prepare the sql
      $stmt=$con->prepare("INSERT into section (section_name,id_major
      ) values('{$section_name}','{$chose_major}'
)");
      //make var to data
      $data=[];
      //excute the query
      $stmt->execute();
      if($stmt){
         echo '<string class="alert alert-success">the section added successfully</string>';
         header("refresh:2");
      }
      else{
         echo '<string class="alert alert-danger">some errors</string>';
         header("refresh:4");
      }
   } 
   else {
    echo '<string class="alert alert-danger">the section cannt be empty</string>';
    header("refresh:4");
   }               
         
 }
}
 elseif($do=='edit')
 {
   //check the get request
   $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
   //create the query to get data with id=$id
   $edit=SingleSection($id);
 
    //row count
    $count=rowcount('section');
 
   //check the count >0
   if($count >0)
   {?>
 <!--show form to edit major  -->
 <h1 class="text-center">Edit New Section</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="section.php?do=edit" method="post">
          <input type="hidden" value="<?php echo  $edit['section_id'] ?>">
          <input type="text" 
              name="section_name" 
              value="<?php echo  $edit['section_name'] ?>"
            class="form-control">
              <br>
              <select name="chose_major"  class="form-control">
                 <option value="<?php echo  $edit['major_id']?>"><?php echo $edit['major_name'] ?></option>
                 <?php
                    $all=getall('major');
                    foreach($all as $a){?>
                     <option value="<?php echo $a['major_id'] ?>"><?php echo $a['major_name'] ?></option>
                   <?php }
                 ?>
              </select>
              <br>
              <!-- button to add -->
        <input type="submit" 
                name='edit'
                value="Edit New Section" 
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
     $section=filter_var($_POST['section_name'],FILTER_SANITIZE_STRING);
     $chose=$_POST['chose_major'];
             //check the filed not empty
      if(!empty($section)){
                 //send data to database
         $sql="UPDATE  section set section_name=?,id_major=? where section_id=?";
                //prepare the query
               $stmt=$con->prepare($sql);
                //execute the query
                $data=[$section,$chose,$id];
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
  
     $delete=delete('section','section_id',$id);
   if($delete){
       header("location:?do=manage");
   }
 }
 else {
    echo 'this page not found';
 }

  
?>