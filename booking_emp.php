<?php
ob_start();
session_start();
include 'init.php';
 $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

 //make the query to get emp
 $sql="SELECT * from employee_table where employee_table_id='{$id}'";
 //prepare the sql
 $stmt=$con->prepare($sql);
 //execute the query
 $stmt->execute();
 //fetrch data
 $row=$stmt->fetch();

 if(isset($_SESSION['student'])){
//check the request post is set
if(isset($_POST['booking'])){
  $check=$_POST['check'];
  $emp=implode(',',$check);
  $emp_id=$row['employee_table_id'];
  $studen_id=$_SESSION['id_studend'];

  //insert data into database
  // make the sql
  $sql="INSERT into booking_emp (id_emp,servse,student_id) values('{$emp_id}','{$emp}','{$studen_id}')";
  // parepare the sql
  $stmt=$con->prepare($sql);
  //execute the query
  $stmt->execute();
  if($stmt){
      echo 'booking successfully';
  }
}

?>
<div class="container">
<h3>Dear, How can I help you?</h3>
      <form action="booking_emp.php?id=<?php echo $id ?>" method="post">
      <input type="checkbox" name="check[]" value='Register courses for students' > Register courses for students<br>
<input type="checkbox" name="check[]" value="Modify and delete registration tables" > Modify and delete registration tables<br>
<input type="checkbox" name="check[]" value=" Organize studying plans for students" > Organize studying plans for students<br>
<input type="checkbox" name="check[]" value="Help the student in the courses" > Help the student in the courses <br>
<input type="checkbox" name="check[]" value="Inquire about academic affairs"  > Inquire about academic affairs <br>
<input type="checkbox" name="check[]" value=" consultations of Study" > consultations of Study  <br>
<input type="checkbox" name="check[]" value=" Academic guidance" > Academic guidance<br>
<br><br>
<input type="submit" value="booking" name="booking" class="btn  btn-success">
</div>

<?php
 }
 else{
   header("location:index.php");
   exit();
 }
 
 