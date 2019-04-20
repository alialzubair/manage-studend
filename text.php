<?php
 include 'init.php';
 if(isset($_POST['checks'])){
     $check=$_POST['check'];
     $emp=implode(',',$check);
     echo $emp;
     $sql="INSERT into texts (checks) values('{$emp}')";
     $stmt=$con->prepare($sql);
     $stmt->execute();
     if($stmt){
         echo 'check add';
     }
 }
?>

<h3>Dear, How can I help you?</h3>
<form action="text.php" method="post">

  <input type="checkbox" name="check[]"  > Register courses for students<br>
  <input type="checkbox" name="check[]" value="Modify and delete registration tables" > Modify and delete registration tables<br>
  <input type="checkbox" name="check[]"  > Organize studying plans for students<br>
  <input type="checkbox" name="check[]"  > Help the student in the courses <br>
  <input type="checkbox" name="check[]"  > Inquire about academic affairs <br>
  <input type="checkbox" name="check[]"  > consultations of Study  <br>
  <input type="checkbox" name="check[]"  > Academic guidance<br>
        

      <a href="Bussiness-form-female.php"> <input type="submit" name="checks" value="Booking Now"></a>
</form>