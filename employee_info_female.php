<?php
session_start();
include 'init.php';
$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

$sql="SELECT major.* ,section.*,employee_table.* FROM major
join section on section.id_major=major.major_id
join employee_table on section.section_id=employee_table.section_id
where major.major_id='{$id}'   and gender='female' ";
$stmt=$con->prepare($sql);
$stmt->execute();
$row=$stmt->fetchall();
$count=$stmt->rowcount();



?>
    
        
    <div class="container">
           <div class="rwo">
    
        
            <div class="col-lg-6" ><!---6 rows----->
             <section class="c2">
             
            <?php foreach($row as $r): ?>
            
            <ul class="list-group">
            <img src="image/img_avatar2.png" 
           width=20% class="img-circle" align='center' >
           <hr>
           
            <li class="list-group-item">Name:Miss:<?php echo $r['employee_table_name'] ?></li>
            <li class="list-group-item">Job:<?php echo $r['major_name'] ?> </li>
            <li class="list-group-item">Office:<?php echo $r['office_no'] ?></li>
            <li class="list-group-item">Phoen:<?php echo $r['phone'] ?></li>
            <li class="list-group-item">section:<?php echo $r['section_name'] ?></li>
            <li class="list-group-item">Office hours:  <?php echo $r['time_start']?> to <?php echo $r['time_end']?> </li>
           <li class="list-group-item">Room Number:    A362 </li>
            </ul>
            
        <a href="#"><?php echo $r['email'] ?></a>
        
   
        <h3>Dear, How can I help you?</h3>
  <input type="checkbox" name="check"  > Register courses for students<br>
  <input type="checkbox" name="check"  > Modify and delete registration tables<br>
  <input type="checkbox" name="check"  > Organize studying plans for students<br>
  <input type="checkbox" name="check"  > Help the student in the courses <br>
  <input type="checkbox" name="check"  > Inquire about academic affairs <br>
  <input type="checkbox" name="check"  > consultations of Study  <br>
  <input type="checkbox" name="check"  > Academic guidance<br>
<br><br>
<a href="booking_emp.php?id=<?php echo $r['employee_table_id'] ?>" class="btn btn-info">booking</a>
    <hr>
<?php endforeach;?>
            
        </section> 
        </div>
     