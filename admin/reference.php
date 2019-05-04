
<?php
ob_start();
session_start();

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
  $sql="SELECT course.*,section.section_name FROM course
  JOIN section ON
    course.section_id=section.section_id";
   //prepare the sql
   $stmt=$con->prepare($sql);
   //execute the query
   $stmt->execute();
   //fetch all data
   $row=$stmt->fetchall();

 ?>
  <!-- show all major and manage its -->
  <div class="container">
     <h1 class="text-info text-center">Manage Course Page</h1>
     <a href="?do=create" class="btn btn-primary">Add New Reference</a>
     <hr>
  

     <!-- make table to show all major -->
   <div class="table-responsive">
    <table class="table table-hover table-striped">
     <tr>
       <th>course ID</th>
       <th>Course Code</th>
       <th>Reference</th>
        <th>Requirments Name</th>
       <th>Total Hours</th>
       <th>SectionName</th>
       <th>Action</th>  
           <style>
                    th{
                        
                        font-weight: bold;
                    }
                
                </style>
      </tr>
<!-- loop throw the $row var and output the data -->
 <?php foreach($row as $se):?>
  <tr>
    <td><?php echo $se['course_id'] ?></td>
    <td><?php echo $se['course_code'] ?></td>
    <td><?php echo $se['reference_table_link'] ?></td>
    <td><?php echo $se['requirements_name'] ?></td>
    <td><?php echo $se['total_hours'] ?></td>
    <td><?php echo $se['section_name'] ?></td>
    <td>
      <a href="reference.php?do=edit&id=<?php echo $se['course_id'] ?>" class="btn btn-success">Edit</a>
      <a href="?do=delete&id=<?php echo $se['course_id'] ?>" class="btn btn-danger confirm">Delete</a>
    </td>
  </tr>

<?php endforeach;?>


              
        </table>
      </div>
  </div>


 <?php
}
elseif($do=='create'){
    ?>
      <h1 class="text-center">Add New Course</h1>
      <!-- make the form to add major name -->
       <div class="container">
          <form action="reference.php?do=create" method="post">
            <input type="text" name="course_code"  class="form-control">
            <input type="text" name="reference_table_link"  class="form-control">
            <input type="text" name="requirements_name"  class="form-control">
            <input type="text" name="total_hours"  class="form-control">
              <br>
              <select name="chose_section"  class="form-control">
                 <option value="0">Select section</option>
                 <?php
                    $all=getall('section'); print_r($all);
                    foreach($all as $a){?>
                     <option value="<?php echo $a['section_id'] ?>"><?php echo $a['section_name'] ?></option>
                   <?php }
                 ?>
              </select>
              <br>
              <!-- button to add -->
       <center><input type="submit" 
                name='add'
                value="Add New requirment" 
                class="btn btn-primary">  
           </center> 
          </form>
       </div>
       <br>
      
          
    <?php
if(isset($_POST['add'])){
   //set the var
    $course_code=$_POST['course_code'];
    $reference_table_link=$_POST['reference_table_link'];
    $requirements_name=$_POST['requirements_name'];
   $total_hours=$_POST['total_hours'];
   $chose_section=$_POST['chose_section'];
   //validae the field
   if(!empty($course_code || $reference_table_link || $requirements_name || $total_hours)){
   {
      //set data into database
     
      //prepare the sql
      $stmt=$con->prepare("INSERT into course (course_code,reference_table_link,requirements_name,total_hours,section_id
      ) values('{$course_code}','{$reference_table_link}','{$requirements_name}','{$total_hours}','{$chose_section}'
)");
      //make var to data
      $data=[];
      //excute the query
      $stmt->execute();
      if($stmt){
         echo '<string class="alert alert-success" style="font-weight:bold;color:green;">
        <center> New Requirment Added Successfully<center></string>';
        // header("refresh:2");
      }
      else{
         echo '<string class="alert alert-danger" style="font-weight:bold;color:red;">
        <center> Some Errors</center></string>';
         header("refresh:4");
      }
       
    }}} 
     
  
}
elseif($do=='edit'){
  $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

  //create the query to get data with id=$id
      //create the query to get data with id=$id
 $sql="SELECT course.*,section.section_name from course
 JOIN  section on  section.section_id=course.section_id
 where course.course_id={$id}";
 //prepare the query
 $stmt=$con->prepare($sql);
 //execute the sql
 $stmt->execute();

 //fetch siangle data
 $row=$stmt->fetch();
 //get the count of data
 $count=$stmt->rowcount();
 echo $count;

 //check the count >0
 if($count >0)
 {?>
<!--show form to edit major  -->
<h1 class="text-center">Edit New Requirment</h1>
    <!-- make the form to add major name -->
     <div class="container">
        <form action="reference.php?do=edit" method="post">
        <input type="hidden" name="id" value="<?php echo  $row['course_id'] ?>">
        <input type="text" name="course_code" value="<?php echo  $row['course_code'] ?>"class="form-control">
        <input type="text" name="reference_table_link" value="<?php echo  $row['reference_table_link'] ?>"class="form-control">
        <input type="text" name="requirements_name" value="<?php echo  $row['requirements_name'] ?>"class="form-control">
      <input type="text" name="total_hours" value="<?php echo  $row['total_hours'] ?>"class="form-control">
            <br>
            <select name="chose_section"  class="form-control">
               <option value="<?php echo  $row['section_id']?>"><?php echo $row['section_name'] ?></option>
               <?php
                  $all=getall('section');
                  foreach($all as $a){?>
                   <option value="<?php echo $a['section_id'] ?>"><?php echo $a['section_name'] ?></option>
                 <?php }
               ?>
            </select>
            <br>
            <!-- button to add -->
     <center> <input type="submit" 
              name='edit'
              value="Edit New Section" 
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
   $id=$_POST['id'];        
  $course_code=$_POST['course_code'];
  $reference_table_link=$_POST['reference_table_link'];
  $requirements_name=$_POST['requirements_name'];
 $total_hours=$_POST['total_hours'];
 $chose_section=$_POST['chose_section'];
           //check the filed not empty
    if(!empty($course_code || $reference_table_link || $requirements_name || $total_hours)){
               //send data to database
       $sql="UPDATE  course set course_code=?,reference_table_link=? ,requirements_name=? ,total_hours=?,section_id=?
       where course_id=?";
              //prepare the query
             $stmt=$con->prepare($sql);
              //execute the query
              $data=[$course_code,$reference_table_link,$requirements_name,$total_hours,$chose_section,$id];
        $stmt->execute($data);

         if($stmt){
               echo '<string class="alert alert-success" style="font-weight:bold;color:green;">
      <center>Requirment Name Update Successfully</center></string>';
               header("refresh:4;");
             header("location:?do=manage");
               }
               else{
                   echo 'errors';
               }
                
           }
           else{
              echo '<string class="alert alert-danger center"style="font-weight:bold;color:red;">
              Requirment Name Not Update</string>';
              //header("refresh:3");
             }
}

}
elseif($do=='delete'){
  $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
 //delete the data
 $sql="DELETE from course where course_id={$id} ";
 //prepare the sql
 $stmt=$con->prepare($sql);
 //execute the query
 $stmt->execute();
 //check the stmt execute
 if($stmt){
     header("location:?do=manage");
 }




}

?>
